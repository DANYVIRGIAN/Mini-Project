<?php

namespace App\Http\Controllers;

use App\Models\datarumah;
use App\Models\datawarga;
use Illuminate\Http\Request;

class datarumahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datarumah = datarumah::all();

        return view('datarumah.index', ['datarumah' => $datarumah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datarumah.create', [
            'datawarga' => datawarga::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'required',
            'alamat' => 'required',
            'id_pemilik' => 'required',
            // 'id_penghuni' => 'required',
        ]);
        datarumah::create($validatedData);

        return back()->with('success', ' Post baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datarumah  $datarumah
     * @return \Illuminate\Http\Response
     */
    public function show(datarumah $datarumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datarumah  $datarumah
     * @return \Illuminate\Http\Response
     */
    public function edit(datarumah $datarumah)
    {

        return view('datarumah.edit', [
            'datarumah' => $datarumah,
            'datawarga' => datawarga::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datarumah  $datarumah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datarumah $datarumah)
    {
        $validatedData = $request->validate([
            'nomor' => 'required',
            'alamat' => 'required',
            'id_pemilik' => 'required',
            // 'id_penghuni' => 'required',
        ]);

        datarumah::where('id', $datarumah->id)->update($validatedData);

        // $datarumah = datarumah::find($id)->update($request->all()); 

        return back()->with('success', ' Data telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datarumah  $datarumah
     * @return \Illuminate\Http\Response
     */
    public function destroy(datarumah $datarumah)
    {
        // $datarumah = datarumah::find($id);

        $datarumah->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
    public function penghuni()
    {
        return view('datarumah.penghuni', [
            'datawarga' => datawarga::all()
        ]);
    
    }
    public function store_penghuni(Request $request)
    {
        $validatedData = $request->validate([
            'id_penghuni' => 'required',
        ]);
        datarumah::create($validatedData);

        return back()->with('success', ' Post baru berhasil dibuat.');
    }
}
