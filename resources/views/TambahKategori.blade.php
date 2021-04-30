@extends('adminlte::page')

@section('title', 'Tambah Data Kategori')

@section('content_header')
    <h1>Tambah Data Kategori</h1>
@stop

@section('content')
<form action="{{route('admin.createKategori')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori" required>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required>
      </div>
    
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>CopyRight &copy; {{date('Y')}}
    <a href="http://ft.unsur.ac.id/" target="_blank">Fakultas Teknik,
    Universitas Suryakancana</a>.</strong> All Right reserved
@stop

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
        <script>console.log ('Hi!')</script>
@stop
