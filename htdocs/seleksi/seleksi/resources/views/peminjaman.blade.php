<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/anggota">anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/buku">buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-2">
       <a href="/peminjam/tambah"><button class="btn btn-primary" id="btn-tambah">Tambah</button></a> 
        
        <table class="table">
            <thead id="thead">
             <tr class="table-dark">
                <th class="col">Peminjam</th>
                   <th class="col">Judul Buku</th>
    <th class="col">Tanggal Pinjam</th>
    <th class="col">Tanggal kembali</th>
    <th class="col">Petugas</th>
    <th class="col">Aksi</th>
  </tr>
</thead>
<tbody id="tbody">
  @foreach($data as $dat)
  <tr peminjam-id="{{$dat->id}}"></tr>
  <td>{{$dat->peminjam}}</td>
  <td>{{$dat->judul}}</td>
  <td>{{$dat->tanggal_pinjam}}</td>
  <td>{{$dat->tanggal_kembali}}</td>
  <td>{{$dat->petugas}}</td>
  <td><a href="/peminjam/kembali?id={{$dat->id}}"><button class="btn btn-hapus btn-warning">Dikembalikan</button></a>
  </td>
</tr>
@endforeach
</table>
</tbody>
</body>
</html>