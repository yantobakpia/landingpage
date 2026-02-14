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
<form method="post" action="/peminjam/post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  <label for="lname">kode buku:</label><br>
  <select name="kode_buku">
@foreach($kode_buku as $kode)
<option value="{{$kode->kode}}">{{$kode->kode}}</option>
@endforeach
  </select><br><br>
  <label for="lname">kode anggota:</label><br>
  <select name="kode_anggota">
@foreach($kode_anggota as $kode)
<option value="{{$kode->kode}}">{{$kode->kode}}</option>
@endforeach
  </select><br><br>
  <label>ID_Petugas</label><br>
  <select name="id_petugas">
@foreach($id_petugas as $kode)
<option value="{{$kode->id}}">{{$kode->id}}</option>
@endforeach
  </select><br><br>
  <label for="tanggal">Tanggal pinjam</label><br>
  <input type="date" name="tanggal_pinjam">  <br>
  <label for="tanggal">Tanggal kembali</label><br>
  <input type="date" name="tanggal_kembali">  
<input class="btn btn-success" type="submit" value="Submit">
</form> 


</body>
</html>