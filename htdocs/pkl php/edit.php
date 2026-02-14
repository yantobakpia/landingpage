<?php
// Sertakan file koneksi ke database
include 'koneksi.php';

// Ambil ID seminar dari parameter URL
if (isset($_GET['nama'])) {
    $id_seminar = $_GET['nama'];

    // Ambil data peserta seminar dari database
    $query_peserta = "SELECT * FROM peserta WHERE nama = $id_seminar";
    $result_peserta = mysqli_query($koneksi, $query_peserta);

    if (mysqli_num_rows($result_seminar) == 1) {
        $row_seminar = mysqli_fetch_assoc($result_seminar);
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Edit Seminar</title>
        </head>
        <body>
            
            <form action="update.php" method="POST">
                <input type="hidden" name="id_seminar" value="<?php echo $row_seminar['nama']; ?>">
                <label for="nama_seminar">Nama Seminar:</label>
                <input type="text" name="nama_seminar" value="<?php echo $row_seminar['nama']; ?>"><br>

                <h2>Peserta Seminar</h2>
                <?php
                while ($row_peserta = mysqli_fetch_assoc($result_peserta)) {
                ?>
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama[]" value="<?php echo $row_peserta['nama']; ?>"><br>
                    <label for="nohp">No. HP:</label>
                    <input type="text" name="nomor_hp[]" value="<?php echo $row_peserta['nomor_hp']; ?>"><br>
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat[]" value="<?php echo $row_peserta['alamat']; ?>"><br>
                    <label for="track">Track:</label>
                    <input type="text" name="track[]" value="<?php echo $row_peserta['track']; ?>"><br><br>
                <?php
                }
                ?>

                <input type="submit" value="Simpan Perubahan">
            </form>
        </body>
        </html>
<?php
    } else {
        echo "Seminar tidak ditemukan.";
    }
} else {
    echo "ID seminar tidak valid.";
}
?>
