@extends('adminlte::page')

@section('title', 'Kategori')

@section('content_header')
    <h1>Daftar Kategori</h1>
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
      <h4 class="card-title">Data Kategori</h4>
      <div class="card-tools">
          @if (Auth::user()->roles_id==1)
          <a href="{{route('admin.TambahKategori')}}" class="btn btn-sm btn-success">
            Tambah Data Kategori
           </a>   
          @endif
        
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>kategori</th>
            <th>Keterangan</th>
            @if (Auth::user()->roles_id==1)
            <th>Aksi</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @php
              $a = 1;
          @endphp
            @foreach ($kategori as $item)
                
           
            <tr>
                <td>{{$a++}}</td>
                <td>{{$item->kategori}}</td>
                <td>{{$item->keterangan}}</td>
                @if (Auth::user()->roles_id==1)
                <td><a href="{{route('admin.Rubah', ['id' => $item->id])}}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{route('admin.Hapus', ['id' => $item->id])}}" class="btn btn-sm btn-danger">Hapus</a>
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
