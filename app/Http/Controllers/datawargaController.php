<?php

namespace App\Http\Controllers;

use App\Models\datawarga;
use Illuminate\Http\Request;

class datawargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datawarga = datawarga::all(); 
             
        return view('datawarga.index', ['datawarga' => $datawarga]); 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datawarga.create');
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
          'nama' => 'required', 
          'Foto_KTP' => 'image|file', 
          'alamat' => 'required', 
          'tanggal_lahir' => 'required', 
          'email' => 'required', 
          'jeniskelamin' => 'required', 
          'status' => 'required', 
          'status_warga' => 'required', 
        ]);

        if($request->file('Foto_KTP')) {
            $validatedData['Foto_KTP'] = $request->file('Foto_KTP')->store('gambar');
        }
      
        // $input = $request->all();
      
        // $datawarga = 
        datawarga::create($validatedData);
       
        return back()->with('success',' Post baru berhasil dibuat.');
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\datawarga  $datawarga
     * @return \Illuminate\Http\Response
     */
    public function show(datawarga $datawarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\datawarga  $datawarga
     * @return \Illuminate\Http\Response
     */
    public function edit(datawarga $datawarga)
    {
        
        return view('datawarga.edit', [
               'datawarga' => $datawarga
        ]);
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\datawarga  $datawarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, datawarga $datawarga)
    {
        $validatedData = $request->validate([
            'nama' => 'required', 
            'Foto KTP' => 'image|file', 
            'alamat' => 'required', 
            'tanggal_lahir' => 'required', 
            'email' => 'required', 
            'jeniskelamin' => 'required', 
            'status' => 'required', 
            'status_warga' => 'required', 
          ]);
          
          if($request->file('Foto_KTP')) {
            $validatedData['Foto_KTP'] = $request->file('Foto_KTP')->store('gambar');
        }
          datawarga::where('id', $datawarga->id)->update($validatedData);
              
        // $datawarga = datawarga::find($id)->update($request->all()); 
               
        return back()->with('success',' Data telah diperbaharui!');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\datawarga  $datawarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(datawarga $datawarga)
    {
        // $datawarga = datawarga::find($id);
     
        $datawarga->delete();
     
        return back()->with('success',' Penghapusan berhasil.');
     }
}
