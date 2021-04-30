@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data User</h1>
@stop

@section('content')
    @if($user->roles_id == 1)
        Anda Login Sebagai Admin
    @else
        Anda Login Sebagai User
    @endif
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
          <h4 class="card-title">Data User</h4>
          <div class="card-tools">
            <a href="{{route('admin.TambahData')}}" class="btn btn-sm btn-success">
             Tambah Data User
            </a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @php
                $a= 1;
            @endphp
                @foreach ($user1 as $i)

                <tr>
                    <td>{{$a++}}</td>
                    <td>{{$i->name}}</td>
                    <td>{{$i->username}}</td>
                    <td>{{$i->email}}</td>
                    <td>{{$i->photo}}</td>
                    <td><a href="{{route('admin.edit', ['id' => $i->id])}}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{route('admin.delete', ['id' => $i->id])}}" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
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
