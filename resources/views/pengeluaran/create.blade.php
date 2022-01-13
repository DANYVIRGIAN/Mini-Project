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
    
    <form method="post" action="/pengeluaran" enctype= "multipart/form-data">
      @csrf
      <input name="nominal" type="text" placeholder="nominal..."> <br>
      <label for="pet-select">kategori:</label>
      <select name="kategori">
        <option value="">--Please choose an option--</option>
        <option value="kebersihan">kebersihan</option>
        <option value="acara">acara</option>
      </select> <br>
      <button type="submit" btn-blue>Submit</button>
    </form>
    <br>
    <a href="{{ route('pengeluaran.index') }}" class="btn-red" style="width: 100%">Kembali ke Halaman Utama</a>
  </div>


@endsection
