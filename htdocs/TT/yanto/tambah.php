<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <h2>Membuat contoh perintah crud pada pemrograman web</h2>

    <p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>

    <h2>Tambah Data Siswa</h2>

        <form action="tambah-proses.php" method="post">

            <table cellpadding="3" cellspaciing="0">
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><input type="text" name="nis" required></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td><input type="text" name="nama" size="50" required></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><select name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select></td>
                </tr>

                <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Akutansi">Akuntansi</option>
                        <option value="Perbankan">Perbankan</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Rekayasa perangkatk lunak">Rekayasa perangkat lunak</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>&nbsp</td>
                <td></td>
                <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
</table>
            </form>
    </body>
</html>