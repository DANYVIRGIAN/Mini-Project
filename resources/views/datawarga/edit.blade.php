@extends('layouts.index')

@section('container')
<div class="wrapper">
    <h1>Edit Data Baru</h1>
    
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
    
    <form method="post" action="/datawarga/{{$datawarga->id}}" enctype= "multipart/form-data">
    @method('put')
      @csrf
      <input name="nama" type="text" placeholder="nama..."> <br>
      <label for="Foto KTP">Foto KTP</label><input name="Foto_KTP" type="file"><br>
      <input name="alamat" type="text" placeholder="alamat..."><br>
      <label for="Foto KTP">Tanggal Lahir</label><input name="tanggal_lahir" type="date"><br>
      <input name="email" type="email" placeholder="email..."><br>
      {{-- <input name="jeniskelamin" type="text" placeholder="jenis kelamin..."><br> --}}
      <label for="pet-select">Jenis kelamin:</label>
      <select name="jeniskelamin">
        <option value="">--Please choose an option--</option>
        <option value="laki">Laki-Laki</option>
        <option value="perempuan">Perempuan</option>
      </select> <br>
      
      <label for="pet-select">Status:</label>
      <select name="status">
        <option value="">--Please choose an option--</option>
        <option value="single">single</option>
        <option value="menikah">menikah</option>
      </select> <br>
      
      <label for="pet-select">Status Warga:</label>
      <select name="status_warga">
        <option value="">--Please choose an option--</option>
        <option value="pindah">pindah</option>
        <option value="warga">warga</option>
      </select> <br>
      {{-- <input name="status" type="text" placeholder="status..."><br>
      <input name="status_warga" type="text" placeholder="status warga..."><br> --}}
      <button type="submit" btn-blue>Submit</button>
    </form>
    <br>
    <a href="{{ route('datawarga.index') }}" class="btn-red" style="width: 100%">Kembali ke Halaman Utama</a>
  </div>


@endsection
