<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function view()
    {
        return view("visit.visit-view");
        //return ('ok');
    }

    public function add()
    {
        return view("visit.add-view");
        //return ('ok');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'date' => 'required|date',
        //     'company_name' => 'required',
        //     'description' => 'required',
        // ]);
        dd($request->date);
        Visit::create($request->all());

        return redirect()->back()->with('success', 'Kunjungan berhasil ditambahkan');
    }
}
