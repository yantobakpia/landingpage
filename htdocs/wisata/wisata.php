<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Trapeling</title>
</head>

<body>
    <?php
    include 'nav.php';
    ?>



    <?php
    include 'koneksi.php';
    $wisata = mysqli_query($koneksi, "select * from tempatwisata");
    $no = 1;

    foreach ($wisata as $key => $value) {
        # code...


    ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="card" style="width: 23rem;">
                        <img src="src/img/pantai.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['nama_wisata'] ?></h5>
                            <p class="card-text text-truncate"><?= $value['keterangan'] ?></p>
                            <hr>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 ">
                    <div class="card" style="width: 23rem;">
                        <img src="src/img/pantai.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['nama_wisata'] ?></h5>
                            <p class="card-text text-truncate"><?= $value['keterangan'] ?></p>
                            <hr>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 ">
                    <div class="card" style="width: 23rem;">
                        <img src="src/img/pantai.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['nama_wisata'] ?></h5>
                            <p class="card-text text-truncate"><?= $value['keterangan'] ?></p>
                            <hr>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php

        $no++;
    }
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="css/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>