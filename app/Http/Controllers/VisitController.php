<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Status;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VisitController extends Controller
{
    public function login()
    {
        //
        return view("visit.login-sales", ["title" => "Login Visit"]);
    }

    public function authenticate(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email:dns',
                'password' => 'required'
                ]);
            //dd($credentials);

            if (Auth::guard('m_user')->attempt($credentials)) {
                $request->session()->regenerate();
                $user_id = Auth::guard('m_user')->user()->user_id; // Mendapatkan informasi pengguna yang
                $user = Auth::guard('m_user')->user()->full_name; // Mendapatkan informasi pengguna yang login
                 //dd($user_id);
                Session::put('username', $user);
                Session::put('user_id', $user_id);
                    return redirect()->intended('sales/visit');
            }
            return back()->with('pesan', 'Login Failed');
        }

    public function view()
    {
        //$posts = Visit::all();
        $user_id = Session::get('user_id');
        if($user_id ==  null){
            return redirect("/sales/login")->with('pesan', 'Login Terlebih Dahulu');
        }
        //$posts = Visit::where('user_id', $user_id)->get();
        $posts = DB::table('visits')
            ->join('m_user', 'visits.user_id', '=', 'm_user.user_id')
            ->join('statuses', 'visits.status', '=', 'statuses.id')
            ->join('companies', 'visits.company_id', '=', 'companies.id')
            ->select(
                'statuses.name as names',
                'm_user.full_name',
                'visits.visit_date',
                'visits.description',
                'visits.status',
                'visits.id',
                'companies.name'
            )
            ->where('visits.user_id', $user_id)
            ->where('visits.status', 1)
            ->orderBy('visits.created_at', 'asc')
            ->get();
        //dd($posts);
        foreach ($posts as $post) {
            $post->formatted_date = Carbon::parse($post->visit_date)->translatedFormat('d F Y');
        }
         //dd($posts);
        return view("visit.visit-view", ["title" => "Data Visit"], compact('posts'));
        //return ('ok');
    }

    public function follow()
    {
        //$posts = Visit::all();
        $user_id = Session::get('user_id');
        if($user_id ==  null){
            return redirect("/sales/login")->with('pesan', 'Login Terlebih Dahulu');
        }
        //$posts = Visit::where('user_id', $user_id)->get();
        $posts = DB::table('visits')
            ->join('m_user', 'visits.user_id', '=', 'm_user.user_id')
            ->join('statuses', 'visits.status', '=', 'statuses.id')
            ->join('companies', 'visits.company_id', '=', 'companies.id')
            ->select(
                'statuses.name as names',
                'm_user.full_name',
                'visits.visit_date',
                'visits.description',
                'visits.status',
                'visits.id',
                'companies.name'
            )
            ->where('visits.user_id', $user_id)
            ->where('visits.status', 2)
            ->orderBy('visits.created_at', 'asc')
            ->get();
        //dd($posts);
        foreach ($posts as $post) {
            $post->formatted_date = Carbon::parse($post->visit_date)->translatedFormat('d F Y');
        }
         //dd($posts);
        return view("visit.visit-view", ["title" => "Data Visit"], compact('posts'));
        //return ('ok');
    }

    public function penawaran()
    {
        //$posts = Visit::all();
        $user_id = Session::get('user_id');
        if($user_id ==  null){
            return redirect("/sales/login")->with('pesan', 'Login Terlebih Dahulu');
        }
        //$posts = Visit::where('user_id', $user_id)->get();
        $posts = DB::table('visits')
            ->join('m_user', 'visits.user_id', '=', 'm_user.user_id')
            ->join('statuses', 'visits.status', '=', 'statuses.id')
            ->join('companies', 'visits.company_id', '=', 'companies.id')
            ->select(
                'statuses.name as names',
                'm_user.full_name',
                'visits.visit_date',
                'visits.description',
                'visits.status',
                'visits.id',
                'companies.name'
            )
            ->where('visits.user_id', $user_id)
            ->where('visits.status', 3)
            ->orderBy('visits.created_at', 'asc')
            ->get();
        //dd($posts);
        foreach ($posts as $post) {
            $post->formatted_date = Carbon::parse($post->visit_date)->translatedFormat('d F Y');
        }
         //dd($posts);
        return view("visit.visit-view", ["title" => "Data Visit"], compact('posts'));
        //return ('ok');
    }

    public function add()
    {
        $user_id = Session::get('user_id');
        $companies = Company::all();
        if($user_id == null){
            return redirect("sales/login")->with('status', 'login dulu');

        }
        return view("visit.add-view", ["title" => "Visit Input"], compact('companies'));
        //return ('ok');
    }

    public function store(Request $request)
    {
        //dd($request->visit_date);
        // Validasi input
        $datain = $request->validate([
            'visit_date' => 'required|date',
            'company_name' => 'required',
            'description' => 'required',
        ]);
        $user_id = Session::get('user_id');
        if($user_id == null){
            return redirect("sales/login")->with('status', 'login dulu');

        }
        $tanggalInputan = $request->visit_date;
        $date_in = Carbon::createFromFormat('m/d/Y', $tanggalInputan)->format('Y-m-d');
        $datain['user_id'] = $user_id;
        $datain['company_id'] = $request->company_name;
        $datain['visit_date'] = $date_in;
        Visit::create($datain);
        return redirect()->intended('sales/visit')->with('status', 'Kunjungan berhasil ditambahkan');
        //return redirect()->route('sales/visit')->with('status', 'Kunjungan berhasil ditambahkan');
    }

    public function edit($id)
    {

        $visit = Visit::findOrFail($id);
        $companies = Company::all();
        $status = Status::all();
        $visit->visit_date = Carbon::parse($visit->visit_date)->format('Y-m-d');
        //dd($visit);
        return view('visit.edit', ["title" => "Edit Visit"], compact('visit', 'companies', 'status'));
    }

    // Menyimpan data yang telah diubah
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|exists:companies,id',
            'status' => 'required',
            'visit_date' => 'required|date',
            'description' => 'required',
        ]);
        $user_id = Session::get('user_id');
        if($user_id == null){
            return redirect("sales/login")->with('status', 'login dulu');

        }
        //$status = $request->input('status');
        $visit = Visit::findOrFail($id);
        $visit_s =  $request->input('status');
        $visit_l = $visit->status;

                // $tanggalInputan = $request->input('visit_date');
                // $date_in = Carbon::createFromFormat('m/d/Y', $tanggalInputan)->format('Y-m-d');
                //$visit->visit_date = $date_in;

            //dd($request->input('visit_date'));
            //dd($request->all());
        if($visit_l == $visit_s){
            $visit->visit_date = $request->input('visit_date');
            $visit->company_id = $request->input('company_name');
            $visit->description = $request->input('description');
            $visit->status = $request->input('status');
            $visit->save();
            return redirect()->intended('sales/visit')->with('status', 'Data berhasil diperbarui.');
        } else {
            $datain['user_id'] = $user_id;
            $datain['visit_date'] = $request->input('visit_date');
            $datain['company_id'] = $request->input('company_name');
            $datain['description'] = $request->input('description');
            $datain['status'] = $request->input('status');
            //$visit->save();
            //$visit->create();
            Visit::create($datain);
            return redirect()->intended('sales/visit')->with('status', 'Data berhasil ditambahkan.');
        }
              // dd($visit_s);
         // Update data Visit
        //  $visit->visit_date = $request->input('visit_date');
        //  $visit->company_id = $request->input('company_name');
        //  $visit->description = $request->input('description');
        //  $visit->status = 'follow'; // Ubah status menjadi follow
        //  $visit->save(); // Simpan perubahan

        //  return redirect()->intended('sales/visit')->with('status', 'Data berhasil diperbarui.');
    }

    public function destroy(Visit $visit)
    {

        Visit::destroy($visit->id);
        return redirect()->intended('sales/visit')->with('status', 'Data berhasil dihapus.');
    }


}
