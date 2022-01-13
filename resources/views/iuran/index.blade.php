@extends('layouts.index')

@section('container')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Iuran</h6>
        <div class="text-right">
            <a class="btn btn-primary" href="iuran/create">Create</a>
        </div>
        Jumlah Saldo = {{$saldo}}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>id_rumah</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($iuran as $iuran)
                    <tr>
                      <td style="width: 200px" >{{$loop->iteration}}</td>
                      <td style="width: 200px" >{{ $iuran->nominal}}</td>
                      <td style="width: 200px" >{{ $iuran->id_rumah}}</td>
                      <td><form method="POST" class="d-inline" action ="iuran/{{$iuran->id}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn-red d-inline">Hapus</button></td>
                        </form></td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>

@endsection