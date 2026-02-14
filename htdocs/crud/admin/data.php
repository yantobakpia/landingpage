<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Responsive</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>
<body>
<?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>
  <div class="wrapper">
    <nav>
      <div class="container-flex">
        <div class="brand">
            <a href="index.php">Selamat datang, <?php echo $_SESSION['username']; ?></a>
         </div>
         <div class="burger">
            <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
         </div>
         <div class="bg-sidebar"></div>
         <ul class="sidebar">
            <li><a href="data">Data</a></li>
            <li><a href="editdata">Edit Data</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
         </ul>
      </div>
    </nav>
  </div>
  
  
   <center> <h2>Data Pengguna</h2> </center>
    <table cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="#ccccc">
            <th>No</th>
            <th>username</th>
            <th>Nama</th>
            <th>alamat</th>
            <th>usia</th>
            <th>jenis kelamin</th>
        </tr>
       
        <?php
        include "config.php";
        $query = mysqli_query($con,"SELECT * FROM tabel_biodata ORDER BY username DESC");
        if (mysqli_num_rows($query)==0){
            echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
        }else{
        $no =1;
            while($data = mysqli_fetch_assoc($query)){
                echo'<tr>';
                echo'<td>'.$no.'</td>';
                echo'<td>'.$data['username'].'</td>';
                echo'<td>'.$data['nama'].'</td>';
                echo'<td>'.$data['alamat'].'</td>';
                echo'<td>'.$data['usia'].'</td>';
                echo'<td>'.$data['jenis_kelamin'].'</td>';
                echo'<td><a href="edit.php?id='.$data['id'],'">Edit</a> / <a href="hapus.php?id=' ,$data['id'],'" onclick="return confirm(\'Apakah yakin data akan dihapus?\')">Hapus</a></td>';
                echo'</tr>';
                $no++;
            }
        }
        ?>
       
    </table>
<script src="app.js"></script>
</body>
</html>