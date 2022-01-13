<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\iuran;
use App\Models\pengeluaran;
use App\Models\datarumah;

class iuranController extends Controller
{
    public function index()
    {
        $iuran = iuran::all();
        $total_iuran = iuran::sum('nominal');
        $total_pengeluaran = pengeluaran::sum('nominal');
        $saldo = $total_iuran-$total_pengeluaran;

        return view('iuran.index', [
            'iuran' => $iuran,
            'saldo' => $saldo
        ]);
    }

    function create()
    {
        return view('iuran.create', [
            'datarumah' => datarumah::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nominal' => 'required',
            'id_rumah' => 'required',
        ]);

        iuran::create($validatedData);

        return back()->with('success', ' Post baru berhasil dibuat.');
    }

    public function show(iuran $iuran)
    {
        //
    }

    public function edit(iuran $iuran)
    {

        return view('iuran.edit', [
            'iuran' => $iuran
        ]);
    }

    public function update(Request $request, iuran $iuran)
    {
        $validatedData = $request->validate([
            'nominal' => 'required',
            'id_rumah' => 'required',
        ]);

        iuran::where('id', $iuran->id)->update($validatedData);

        // $iuran = iuran::find($id)->update($request->all()); 

        return back()->with('success', ' Data telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(iuran $iuran)
    {
        // $iuran = iuran::find($id);

        $iuran->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
