<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use App\Models\iuran;
use Illuminate\Http\Request;

class pengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = pengeluaran::all();
        $total_iuran = iuran::sum('nominal');
        $total_pengeluaran = pengeluaran::sum('nominal');
        $saldo = $total_iuran-$total_pengeluaran;


        return view('pengeluaran.index', [
            'pengeluaran' => $pengeluaran,
            'saldo' => $saldo
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create', [
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
            'nominal' => 'required',
            'kategori' => 'required',
        ]);
        pengeluaran::create($validatedData);

        return back()->with('success', ' Post baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {

    //     return view('pengeluaran.edit', [
    //         'pengeluaran' => pengeluaran::all()
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'nomor' => 'required',
    //         'alamat' => 'required',
    //         'id_pemilik' => 'required',
    //         // 'id_penghuni' => 'required',
    //     ]);

    //     pengeluaran::where('id', $pengeluaran->id)->update($validatedData);

    //     // $pengeluaran = pengeluaran::find($id)->update($request->all()); 

    //     return back()->with('success', ' Data telah diperbaharui!');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengeluaran $pengeluaran)
    {
        // $pengeluaran = pengeluaran::find($id);

        $pengeluaran->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
