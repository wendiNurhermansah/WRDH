@extends('adminlte::page')

@section('title', 'Tambah Data Merek Barang')

@section('content_header')
    <h1>Tambah Data Merek Barang</h1>
@stop

@section('content')
<form action="{{route('admin.storeMerekBarang')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="merk">Merek Barang</label>
        <input type="text" class="form-control" id="merk" name="merk" placeholder="merk" required>
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
