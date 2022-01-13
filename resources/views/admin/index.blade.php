@extends('layouts.index')

@section('container')
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
        @can('superadmin')
        <div class="text-right">
            <a class="btn btn-primary" href="admin/create">Create</a>
        </div>
        @endcan 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Email</th>
                        @can('superadmin')
                        <th>aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                      <td style="width: 200px" >{{$loop->iteration}}</td>
                      <td style="width: 200px" >{{ $user->username}}</td>
                      <td style="width: 200px" >{{ $user->level}}</td>
                      <td style="width: 200px" >{{ $user->email}}</td>
                      @can('superadmin')
                      <td><form method="POST" class="d-inline" action ="admin/{{$user->id}}">
                          @csrf
                          @method('DELETE')
                          <button class="btn-red d-inline">Hapus</button></td>
                        </form></td>
                        @endcan
                    </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
</div>

@endsection