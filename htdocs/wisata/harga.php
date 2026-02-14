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

    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="card col-10">
            <div class="card-body row" style="border: 50px;">
                <div class="col-6">
                    <h2 class="">Harga Tiket</h2>
                </div>
                <div class="col-6 text-right">

                </div>
                <div class="col" style="padding-top: 20px;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Lokasi Wisata</th>
                                <th>Harga Tiket</th>
                            </tr>
                            <tr>
                                <?php
                                include 'koneksi.php';

                                $pesan = mysqli_query($koneksi, 'select * from tempatwisata');
                                $no = 1;
                                foreach ($pesan as $key => $value) {
                                    # code...

                                ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $value['nama_wisata'] ?></td>
                                <td><?= $value['harga'] ?></td>

                            </tr>
                        <?php
                                    $no++;
                                }
                        ?>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="css/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>