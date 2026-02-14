<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Trapeling</title>
</head>

<body>
    <?php
    include 'nav.php';
    ?>

    <!-- start carausel -->

    <div data-ride="carousel" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="2500">
                <img src="src/img/1.jpg" class="d-block w-100" alt="carauselopenpage">
            </div>
            <div class="carousel-item" data-interval="2500">
                <img src="src/img/2.jpg" class="d-block w-100" alt="carauselopenpage">
            </div>
            <div class="carousel-item" data-interval="2500">
                <img src="src/img/3.jpg" class="d-block w-100" alt="carauselopenpage">
            </div>
            <div class="carousel-item" data-interval="2500">
                <img src="src/img/4.jpg" class="d-block w-100" alt="carauselopenpage">
            </div>
            <div class="carousel-item" data-interval="2500">
                <img src="src/img/5.jpg" class="d-block w-100" alt="carauselopenpage">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <!-- End Carausel -->

    <hr class="mt-5">
    <h5 style="text-align: center;">Rekomendasi Wisata</h5>
    <!-- Start Video Embed -->
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-2 p-2">
                <div class=" card mt-2" style="width: 31.5rem;">
                    <iframe width="500" height="255" src="https://www.youtube.com/embed/KgjPGN2tPYA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Borobudur</h5>
                        <i class="bi bi-geo-alt-fill mr-4">Magelang</i><br>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><br>
                        <p>Borobudur dibangun dengan gaya Mandala yang mencerminkan alam semesta dalam kepercayaan Buddha. Struktur bangunan ini berbentuk kotak dengan empat pintu masuk dan titik pusat berbentuk lingkaran. Jika dilihat dari luar hingga ke dalam terbagi menjadi dua bagian yaitu alam dunia yang terbagi menjadi tiga zona di bagian luar, dan alam Nirwana di bagian pusat. <br></p>
                        <a href="pemesanan.php" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-lg-5 m-2 p-2 ">
                <div class="card mt-2" style="width: 31.5rem;">
                    <iframe width="500" height="255" style="text-align: center;" src="https://www.youtube.com/embed/VuLzU36b_gs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Parangtritis</h5>
                        <i class="bi bi-geo-alt-fill mr-4">Jogja</i><br>
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><br>
                        <p>Parangtritis, salah satu pantai di sisi selatan Jogja ini layaknya sebuah surga bermain bagi siapa pun yang datang. Senja yang romantis hingga suasana magis yang legendaris menjadi rangkaian cerita yang tak pernah habis.<br></p>
                        <a href="pemesanan.php" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Video -->

    <hr>
    <h3 style="font-family: Roboto; text-align:center;">Book now!</h3>
    <div class="cotainer">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-2" style="text-align: center;">
                <a class="btn btn-primary mt-3" href="pemesanan.php" role="button">Disini</a>
            </div>
            <!-- <div class="col-5"></div> -->
        </div>
    </div>
    <hr>
    <img src="src/img/why.png" alt="trusted">

    <div class="card-footer text-muted mt-5">
        <p style="text-align: center;"><i>Ars 2022</i></p>
        <p style="text-align: center;"><i class="bi bi-facebook">|</i><i class="bi bi-instagram">|</i><i class="bi bi-twitter"></i><i class="bi bi-whatsapp"></i></p>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="css/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


</body>

</html>