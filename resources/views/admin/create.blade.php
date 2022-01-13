@extends('layouts.index')

@section('container')
<div class="wrapper">
    <h1>Buat Data Baru</h1>
    
    @if (session('success'))
    <div class="alert-success">
      <p>{{ session('success') }}</p>
    </div>
    @endif
    
    @if ($errors->any())
    <div class="alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    
    <form method="post" action="/admin" enctype= "multipart/form-data">
      @csrf
      <input name="username" type="text" placeholder="nama..."> <br>
      <input name="email" type="email" placeholder="email..."><br>
      <input name="password" type="password" placeholder="password..." required><br>
      <button type="submit" btn-blue>Submit</button>
    </form>
    <br>
    <a href="{{ route('admin.index') }}" class="btn-red" style="width: 100%">Kembali ke Halaman Utama</a>
  </div>


@endsection
