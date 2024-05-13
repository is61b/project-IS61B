<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $jur = Jurusan::all();
        return view('jurusan.index',compact('nomor','jur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jur = new Jurusan;
        $jur->kode = $request->kode;
        $jur->jurusan = $request->nama;
        $jur->save();

        return redirect('/jurusan/');
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
        $jur = Jurusan::find($id);
        return view('jurusan.edit',compact('jur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jur = Jurusan::find($id);
        $jur->kode = $request->kode;
        $jur->jurusan = $request->nama;
        $jur->save();

        return redirect('/jurusan/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jur = Jurusan::find($id);
        $jur->delete();

        return redirect('/jurusan/');
    }
}
