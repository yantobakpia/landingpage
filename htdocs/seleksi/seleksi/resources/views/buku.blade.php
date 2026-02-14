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
    <h3>Buku</h3>
    <table class="table">
        <thead>
            <tr class="table-dark">
                <th class="col">id</th>
                <th class="col">kode</th>
                <th class="col">judul</th>
                <th class="col">penulis</th>
                <th class="col">Penerbit</th>
                <th class="col">tahun</th>
                <th class="col">stok</th>
                <th class="col">aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $dat)
            <tr>
            <td>{{$dat->id}}</td>
            <td>{{$dat->kode}}</td>
            <td>{{$dat->judul}}</td>
            <td>{{$dat->penulis}}</td>
            <td>{{$dat->penerbit}}</td>
            <td>{{$dat->tahun}}</td>
            <td>{{$dat->stok}}</td>
            <td><a href="/buku/delete?id={{$dat->id}}"><button type="button" class="btn btn-primary">Delete</button></a> 
            | <a href="/buku/update?id={{$dat->id}}"><button type="button" class="btn btn-danger">update</button></a></td>
            </tr>
        @endforeach
        </tbody>
        <button><a href="/buku/post?id={{$dat->id}}">tambah</a></button>
   </table>
   <br>


   
   
  
</body>
</html>