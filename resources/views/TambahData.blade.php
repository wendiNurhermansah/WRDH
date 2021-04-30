@extends('adminlte::page')

@section('title', 'Tambah Data User')

@section('content_header')
    <h1>Tambah Data User</h1>
@stop

@section('content')
<form action="{{route('admin.submit')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
      </div>
      <div class="form-group">
        <label for="username">username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
      </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
    </div>
    <div class="form-group">
        <label for="roles_id">Role</label>
        <select class="form-control" name="roles_id">
        @foreach ($role as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        
        @endforeach
         
        </select>
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
