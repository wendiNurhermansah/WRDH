<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

    <h1>Laporan Produk Barang</h1>
    <table class="table table-bordered" border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>nama</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
           
          </tr>
        </thead>
        <tbody>
          @php
              $a = 1;
          @endphp
            @foreach ($Produk as $item)
                
           
            <tr>
                <td>{{$a++}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->kategori->kategori}}</td>
                <td>{{$item->Merek->merk}}</td>
                <td>{{$item->harga}}</td>
                <td>{{$item->stok}}</td>
                <td>{{$item->foto}}</td>
              </tr>
              @endforeach


        </tbody>
      </table>


</body>
</html>