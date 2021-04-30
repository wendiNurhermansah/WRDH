@extends('adminlte::page')

@section('title', 'Produk')

@section('content_header')
    <h1>Daftar Produk</h1>
@stop

@section('content')

@if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
    @endif
<hr/>
<div class="container-fluid">

<!-- table produk baru -->
<div class="row">
<div class="col">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Data Produk</h4>
      <div class="card-tools">
          @if (Auth::user()->roles_id==1)
          <a href="{{route('admin.TambahProduk')}}" class="btn btn-sm btn-success">
            Tambah Data Produk
           </a>   
          @endif
        
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>nama</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            @if (Auth::user()->roles_id==1)
            <th>Aksi</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @php
              $a = 1;
          @endphp
            @foreach ($produk as $item)
                
           
            <tr>
                <td>{{$a++}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->kategori->kategori}}</td>
                <td>{{$item->Merek->merk}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->stok}}</td>
                <td>{{$item->foto}}</td>
                @if (Auth::user()->roles_id==1)
                <td>
                   
                    <a href="{{route('admin.RubahProduk', ['id' => $item->id])}}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{route('admin.HapusProduk', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Hapus</a>
                   
                </td>
                @endif
              </tr>
              @endforeach


        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
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
