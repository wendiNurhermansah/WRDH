@extends('adminlte::page')

@section('title', 'Edit Data Merek Barang')

@section('content_header')
    <h1>Edit Data Merek Barang</h1>
@stop

@section('content')
<form action="{{route('admin.updateMerekBarang',['id' => $merk->id])}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kategori">Merek Barang</label>
        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="kategori" value="{{$merk->merk}}" required>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" value="{{$merk->keterangan}}" required>
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
