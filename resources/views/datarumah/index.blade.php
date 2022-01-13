@extends('layouts.index')

@section('container')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Rumah</h6>
        <div class="text-right">
            <a class="btn btn-primary" href="datarumah/create">Create</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Rumah</th>
                        <th>Alamat</th>
                        <th>Nama Pemilik</th>
                        <th>Nama Penghuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datarumah as $datarumah)
                    <tr>
                      <td style="width: 200px" >{{$loop->iteration}}</td>
                      <td style="width: 200px" >{{ $datarumah->nomor}}</td>
                      <td style="width: 200px" >{{ $datarumah->alamat}}</td>
                      <td style="width: 200px" >{{ $datarumah->pemilik->nama}}</td>
                      {{-- <td style="width: 200px" >{{ $datarumah->penghuni->nama}}</td> --}}
                      <td style="width: 100px"><button class="btn-green d-inline"><a href="datarumah/{{$datarumah->id}}/edit">Edit</a></button>
                      <form method="POST" class="d-inline" action ="datarumah/{{$datarumah->id}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn-red d-inline">Hapus</button>
                        </form>
                        {{-- <button class="btn-red d-inline"><a href="/penghuni"> Tambah Penghuni</a></button></td> --}}
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>

@endsection