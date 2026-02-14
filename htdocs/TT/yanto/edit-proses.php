<?php

if(isset($_POST['simpan'])){
    include ("koneksi.php");

    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $update = mysqli_query($con, "UPDATE table_biodata SET username='$username', snama='$nama', umur='$umur', jenis_kelamin='$jeni_kelamin' WHERE id='$id'");

    if($update){
        echo 'Data berhasil di simpan';
        echo '<a href="edit.php?id='.$id.'">Kembali</a>';
    }else{
        echo 'Gagal menyimpan data';
        echo '<a href="edit.php?id='.$id.'">Kembali</a>';
    }
}else {
    echo '<script>window.history.back()</script>';
}

?>