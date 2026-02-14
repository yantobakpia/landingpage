<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
</head>
<body>
    <h2>Membuat contoh perintah crud pada pemrograman web</h2>
    <p><a href="index.php">beranda</a> / <a href="tambah.php">tambah data</a></p>
    <h3>Data siswa</h3>
    <table cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="#ccccc">
            <th>No</th>
            <th>Nis</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Opsi</th>
        </tr>
       
        <?php
        include "koneksi.php";
        $query = mysqli_query($conn,"SELECT * FROM siswa ORDER BY siswa_nis DESC");
        if (mysqli_num_rows($query)==0){
            echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
        }else{
        $no =1;
            while($data = mysqli_fetch_assoc($query)){
                echo'<tr>';
                echo'<td>'.$no.'</td>';
                echo'<td>'.$data['siswa_nis'].'</td>';
                echo'<td>'.$data['siswa_nama'].'</td>';
                echo'<td>'.$data['siswa_kelas'].'</td>';
                echo'<td>'.$data['siswa_jurusan'].'</td>';
                echo'<td><a href="edit.php?id='.$data['siswa_id'],'">Edit</a> / <a href="hapus.php?id=' ,$data['siswa_id'],'" onclick="return confirm(\'Apakah yakin data akan dihapus?\')">Hapus</a></td>';
                echo'</tr>';
                $no++;
            }
        }
        ?>
       
    </table>
</body>
</html>
</body>
</html>