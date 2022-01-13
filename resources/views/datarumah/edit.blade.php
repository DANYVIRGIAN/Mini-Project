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
    
    <form method="post" action="/datarumah/{{$datarumah->id}}" enctype= "multipart/form-data">
    @method('put')
      @csrf
      <input name="nomor" type="text" placeholder="nomor rumah..."> <br>
      <input name="alamat" type="text" placeholder="alamat rumah..."> <br>
      <label for="pet-select">Nama Pemilik:</label>
      <select name="id_pemilik">
        @foreach($datawarga as $datawarga)
        <option value="{{$datawarga->id}}">{{ $datawarga->nama}}</option>
        @endforeach
      </select> <br>
      </select> <br>
      <button type="submit" btn-blue>Submit</button>
    </form>
    <br>
    <a href="{{ route('datarumah.index') }}" class="btn-red" style="width: 100%">Kembali ke Halaman Utama</a>
  </div>


@endsection
