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

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card mt-5">
                <h5 class="card-header text-center">Pemesanan Tiket</h5>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="nama_pemesan" class="col-sm-4">Nama</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="nama_pemesan" name="nama_pemesan" value="<?php if (@$_POST['nama_pemesan']) {
                                                                                                            echo $_POST['nama_pemesan'];
                                                                                                        } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nik" class="col-sm-4">Nomor Identitas</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="nik" name="nik" value="<?php if (@$_POST['nik']) {
                                                                                            echo $_POST['nik'];
                                                                                        } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telepon" class="col-sm-4">Telepon</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="telepon" name="telepon" value="<?php if (@$_POST['telepon']) {
                                                                                                    echo $_POST['telepon'];
                                                                                                } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lokasi" class="col-sm-4">Tempat Wisata</label>
                                    <div class="col-sm-7">
                                        <select class="form-control form-control-sm" id="lokasi" name="lokasi" value="<?php if (@$_POST['lokasi']) {
                                                                                                                            echo $_POST['lokasi'];
                                                                                                                        } ?>">
                                            <?php
                                            include 'koneksi.php';

                                            $tempat = mysqli_query($koneksi, "select * from tempatwisata");
                                            foreach ($tempat as $key => $value) {
                                                # code...
                                            ?>
                                                <option value="<?= $value['nama_wisata'] ?>"><?= $value['nama_wisata'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for=tanggal_kunjung" class="col-sm-4">Tanggal Kunjung</label>
                                    <div class="col-sm-7">
                                        <input type="date" id="tanggal_kunjung" name="tanggal_kunjung" value="<?php if (@$_POST['tanggal_kunjung']) {
                                                                                                                    echo $_POST['tanggal_kunjung'];
                                                                                                                } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for=dewasa" class="col-sm-4">Pengunjung Dewasa</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="dewasa" name="dewasa" value="<?php if (@$_POST['dewasa']) {
                                                                                                    echo $_POST['dewasa'];
                                                                                                } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for=anak" class="col-sm-4">Pengunjung Anak</label>
                                    <div class="col-sm-7">
                                        <input type="number" id="anak" name="anak" value="<?php if (@$_POST['anak']) {
                                                                                                echo $_POST['anak'];
                                                                                            } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                   Saya menyetujui syarat & ketentuan yang berlaku
                                    </label>
                                </div>

                                <div class="form-group row">
                                    <div class="col-7"></div>
                                    <div class="col-4">
                                        <!-- <input type="hidden" name="id_anggota" value="<?= @$anggota['id_anggota'] ?>"> -->
                                        <!-- <button type="submit" class="btn btn-primary mb-0 col-5 text-right">Submit</button>
                                        or <a href="anggota-list.php">Cancel</a> -->
                                        <input type="submit" value="Hitung" name="submit">
                                        <a href="index.php">- Keluar</a>
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                            
                            </form>
                            <div class="row">
                                <div class="card" style="width: 50rem;">
                                    <div class="card-body">
                                        <label for="">Nota</label><br>

                                        <?php
                                        if (isset($_POST['submit']) != '') {
                                            # code...
                                            $id = $_POST['lokasi'];
                                            $sql = "select * from tempatwisata where nama_wisata='$id'";
                                            $dewasa = $_POST['dewasa'];
                                            $anak = $_POST['anak'];
                                            $hDewasa = '';
                                            $query = mysqli_query($koneksi, $sql);
                                            while ($data = mysqli_fetch_array($query)) {
                                                # code...
                                                
                                                $hDewasa = $dewasa * $data['harga'];
                                                $hAnak = $anak * $data['harga'] * 0.5;
                                                $total = $hDewasa + $hAnak;
                                        ?>

                                                <form action="pemesanan-aksi.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-sm-4"></div>
                                                        <div class="col-sm-7" style="text-align: center;">
                                                            <input type="text" id="nama_pemesan" name="nama_pemesan" value="<?php if (@$_POST['nama_pemesan']) {
                                                                                                                                echo $_POST['nama_pemesan'];
                                                                                                                            } ?>" class="form-control" hidden>
                                                            <input type="text" id="nik" name="nik" value="<?php if (@$_POST['nik']) {
                                                                                                                echo $_POST['nik'];
                                                                                                            } ?>" class="form-control" hidden>
                                                            <input type="text" id="telepon" name="telepon" value="<?php if (@$_POST['telepon']) {
                                                                                                                        echo $_POST['telepon'];
                                                                                                                    } ?>" class="form-control" hidden>
                                                            <input type="text" id="lokasi" name="lokasi" value="<?php if (@$_POST['lokasi']) {
                                                                                                                    echo $_POST['lokasi'];
                                                                                                                } ?>" form-control" hidden>
                                                            <input type="date" id="tanggal_kunjung" name="tanggal_kunjung" value="<?php if (@$_POST['tanggal_kunjung']) {
                                                                                                                                        echo $_POST['tanggal_kunjung'];
                                                                                                                                    } ?>" class="form-control" hidden>
                                                            <input type="number" id="dewasa" name="dewasa" value="<?php if (@$_POST['dewasa']) {
                                                                                                                        echo $_POST['dewasa'];
                                                                                                                    } ?>" class="form-control" hidden>
                                                            <input type="number" id="anak" name="anak" value="<?php if (@$_POST['anak']) {
                                                                                                                    echo $_POST['anak'];
                                                                                                                } ?>" class="form-control" hidden>

                                                            <table class="">
                                                                <tr style="text-align: left;">
                                                                    <td>Harga Tiket</td>
                                                                    <td>:</td>
                                                                    <td>Rp.</td>
                                                                    <td><input type="text" class="border-0" name="hargatiket" id="hargatiket" value="<?= $data['harga'] ?>"></td>
                                                                </tr>
                                                                <tr style="text-align: left;">
                                                                    <td>Total Harga Tiket</td>
                                                                    <td>:</td>
                                                                    <td>Rp.</td>
                                                                    <td><input type="text" class="border-0" name="totalharga" id="totalharga" value="<?= $total ?>"></td>
                                                                </tr>
                                                            </table>

                                                            <div class="col-sm-6 mt-2">
                                                                <div class="form-group">
                                                                    <input type="submit" class="btn btn-info" name="submit" value="Simpan">
                                                                    
                                                                </div>
                                                            </div>
                                                </form>

                                        <?php

                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>


    <?php

    include 'koneksi.php';


    ?>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="css/jquery.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.js"></script>


</body>

</html>