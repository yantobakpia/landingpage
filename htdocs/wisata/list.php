<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'koneksi.php';

    $sql = "select * from pemesanan order by id_pesanan DESC";
    $query = mysqli_query($koneksi, $sql);
    $hasil = mysqli_fetch_array($query);
    ?>
    <h1> Data berhasil disimpan!</h1>
    <hr>
    Nota <br><br>
    
    
    <table border="1">
        <tr>
            <td>
                Nama Pemesan
            </td>
            <td>:</td>
            <td><?= $hasil['nama_pemesan'] ?></td>
        </tr>
        <tr>
            <td>Nomor Identitas</td>
            <td>:</td>
            <td><?= $hasil['nik'] ?></td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td><?= $hasil['telepon'] ?></td>
        </tr>
        <tr>
            <td>Tempat Wisata</td>
            <td>:</td>
            <td><?= $hasil['lokasi'] ?></td>

        </tr>
        <tr>
            <td>Pengunjung Dewasa</td>
            <td>:</td>
            <td><?= $hasil['dewasa'] ?></td>
        </tr>
        <tr>
            <td>Pengunjung Anak</td>
            <td>:</td>
            <td><?= $hasil['anak'] ?></td>
        </tr>
        <tr>
            <td>Harga Tiket</td>
            <td>:</td>
            <td>Rp. <?= $hasil['hargatiket'] ?></td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td>:</td>
            <td>Rp. <?= $hasil['totalharga'] ?></td>
        </tr>

    </table>


    <a href="index.php">Keluar</a>
</body>

</html>