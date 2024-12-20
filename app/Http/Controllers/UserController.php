<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\m_user;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.register',['title' => "Halaman Home", 'user' => ""]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.register');
    }

    public function login()
    {
        //return ('ok');
        return view("frontend.login");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        //dd($request);
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
            ]);

            if (Auth::guard('m_user')->attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::guard('m_user')->user(); // Mendapatkan informasi pengguna yang login
                Session::put('username', $user);
                //dd($user);
                if ($user->user_level == '1') {
                    return redirect()->intended('frontend/home');
                } else {
                    echo "yes";
                    //return redirect()->intended('frontend/home');
                }
                //return redirect()->intended('frontend/home');
                    //return redirect()->route('frontend/home',['user' => $user]);
                // return view('frontend.home', ['user' => $user,
                //                                 'title' => 'Halaman Home']);
            }
            return back()->with('pesan', 'Login Failed');
    }

    public function home()
    {
        //$user = Auth::guard('m_user')->user()->full_name;
        //dd($user);
        $username = Session::get('username');
        //dd($username);
        if($username){
        $users = $username->full_name;
        } else {
            $users = "";
        }

        return view('frontend.home', ['title' => "Halaman Home", 'user' => $users]);
    }

     public function register()
    {
         return view('frontend.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:m_user,email',
            'phone' => 'required|string|max:20',
            'ktp' => 'required|string',
            'password' => 'required|min:3',
        ]);
         //$validatedData['nama_bank'] = $request->nm_bank;
         $validatedDatax = $request->email;
         $validatedDatan = $request->name;

         $validatedData['full_name'] = $request->name;
        $validatedData['password'] = Hash::make($request->password);
        //dd($validatedData);
        m_user::create($validatedData);
        Mail::to($validatedDatax)->send(new UserRegistered($validatedDatan, null, null));

        return redirect("/login")->with('status', 'data berhasil disimpan, silahkan Cek Email Untuk login anda');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
