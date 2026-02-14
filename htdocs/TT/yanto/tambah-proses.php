<?php
if(isset($_POST['tambah'])){
    include('koneksi.php');

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $input = mysqli_query($conn, "INSERT INTO siswa VALUES(NULL, '$nis', '$nama', '$kelas', '$jurusan')");
    
    if($input){
        echo 'Data berhasil di tanbahkan! '; 
        echo '<a href="tambah.php">Kembali</a>';

    }else{
        echo 'Gagal menanbahkan data '; 
        echo '<a href="tambah.php">Kembali</a>';
    }

}else{ 
    echo '<script>window.history.back()</script>';
        
}
?>
