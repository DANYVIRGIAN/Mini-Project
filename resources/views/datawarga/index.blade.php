@extends('layouts.index')

@section('container')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Warga</h6>
        <div class="text-right">
            <a class="btn btn-primary" href="datawarga/create">Create</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Foto_KTP</th>
                        <th>alamat</th>
                        <th>tanggal_lahir</th>
                        <th>email</th>
                        <th>jeniskelamin</th>
                        <th>status</th>
                        <th>status_warga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datawarga as $datawarga)
                    <tr>
                      <td style="width: 200px" >{{$loop->iteration}}</td>
                      <td style="width: 200px" >{{ $datawarga->nama}}</td>
                      <td style="width: 200px" ><img src="{{asset('storage/'. $datawarga->Foto_KTP)}}" height="100px" width="200px"></td>
                      <td style="width: 200px" >{{ $datawarga->alamat}}</td>
                      <td style="width: 200px" >{{ $datawarga->tanggal_lahir}}</td>
                      <td style="width: 200px" >{{ $datawarga->email}}</td>
                      <td style="width: 200px" >{{ $datawarga->jeniskelamin}}</td>
                      <td style="width: 200px" >{{ $datawarga->status}}</td>
                      <td style="width: 200px" >{{ $datawarga->status_warga}}</td>
                      <td style="width: 100px"><button class="btn-green d-inline"><a href="datawarga/{{$datawarga->id}}/edit">Edit</a></button>
                      <form method="POST" class="d-inline" action ="datawarga/{{$datawarga->id}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn-red d-inline">Hapus</button></td>
                        </form>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>

@endsection