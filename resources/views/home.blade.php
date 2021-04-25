@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if($user->roles_id == 1)
        Anda Login Sebagai Admin
    @else
        Anda Login Sebagai User
    @endif

<hr/>
    <div class="container-fluid">
  <div class="row">
    <div class="col-6 col-lg-3">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>150</h3>

          <p>Order Baru</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>

          <p>Produk</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>150</h3>

          <p>Member</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>150</h3>

          <p>Transaksi</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- table produk baru -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk Baru</h4>
          <div class="card-tools">
            <a href="#" class="btn btn-sm btn-primary">
              More
            </a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Qty</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>PRO-1</td>
                <td>Baju Atasan</td>
                <td>Baju Anak</td>
                <td>12 kodi</td>
                <td>5.000</td>
              </tr>
              <tr>
                <td>2</td>
                <td>PRO-2</td>
                <td>Gamis</td>
                <td>Baju Wanita</td>
                <td>20 kodi</td>
                <td>25.000</td>
              </tr>
              <tr>
                <td>3</td>
                <td>PRO-3</td>
                <td>Daster</td>
                <td>Baju Wanita</td>
                <td>20 kodi</td>
                <td>125.000</td>
              </tr>
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
