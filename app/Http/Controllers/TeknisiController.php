<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;

use Illuminate\Http\Request;
use App\Mail\TeknisiRegistered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;


class TeknisiController extends Controller
{
    public function register()
    {
        return view("teknisi.teknisi-register");
    }

    public function register_store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:teknisis,email',
            'phone' => 'required|string|max:20',
            'alamat' => 'required|string',
            'nm_bank' => 'required|min:1|max:20',
            'no_req' => 'required|string|max:20',
            'password' => 'required|min:3',
        ]);

        $validatedDatax = $request->email;
        $validatedDatan = $request->name;
        $validatedData['nama_bank'] = $request->nm_bank;

        $validatedData['password'] = Hash::make($request->password);
        Teknisi::create($validatedData);


        Mail::to($validatedDatax)->send(new TeknisiRegistered($validatedDatan, null, null));

        return redirect("/teknisi/login")->with('status', 'data berhasil disimpan, silahkan Cek Email Untuk login anda');
    }

    public function login()
    {
        //return ('ok');
        return view("teknisi.login-teknisi");
    }

    public function authenticate(Request $request)
        {
            // dd($request->password);
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
            ]);

            //dd(Hash::make($request->password));
            //$credentials['password'] = Hash::make($request->password);
            //if (Auth::attempt($credentials)) {
                if (Auth::guard('teknisi')->attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::guard('teknisi')->user()->name; // Mendapatkan informasi pengguna yang login
                    //dd($user);
                return redirect()->intended('teknisi/home');
            }
            return back()->with('pesan', 'Login Failed');
            //dd('berhasil login');
        }
    public function reset()
    {
        //return ('ok');
        return view("teknisi.reset-password-teknisi");
    }
    public function new()
    {
        //return ('ok');
        return view("teknisi.new-password-teknisi");
    }

    public function home()
    {
        @$user = Auth::guard('teknisi')->user()->name;

        if($user){
            return view('teknisi.home-teknisi', ['user' => $user] );
           }
           return redirect("/teknisi/login")->with('pesan', 'Login Terlebih Dahulu');



    }

    public function logout(Request $request): RedirectResponse
    {
        //Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/teknisi/login');
    }
}
