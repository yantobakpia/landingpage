<?php 

if(isset($_GET['id'])){
    include ("koneksi.php");

    $id = $_GET['id'];
    $cek = mysqli_query($conn, "SELECT * FROM siswa WHERE siswa_id='$id'");

    if(mysqli_num_rows($cek)==0){
        echo '<script>window.history.back()</script>';
    }else{
        $del = mysqli_query($conn, "DELETE FROM siswa WHERE siswa_id='$id'");
        if($del){
            echo 'Data siswa berhasil dihapus';
            echo '<a href="index.php">Kembali</script>';
        }else{
            echo 'Gagal menghapus data';
            echo '<a href="index.php">Kembali</script>';
        }
    }
}else{
    echo '<script>window.history.back()</script>';
}

?>