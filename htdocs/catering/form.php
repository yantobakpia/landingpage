<!DOCTYPE html>
<html lang="en">
<?php 

    include_once("connection.php");

    $statement = $conn->prepare('SELECT * FROM users WHERE Tanggal=:Tanggal');
    $statement->execute([
        'Tanggal' => $_GET['Tanggal']
    ]);
    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
?>
<head>
	<meta charset="UTF-8">
	<title>indrutcatering.com</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
	
<div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Form Data Pemesanan
		</div>

		<form action="store.php" method="post">
			<div class="form_wrap">
            <div class="input_wrap">
					<label for="tgl">Masukkan Tanggal</label>
					<input type="date" Name="Tanggal" style="width: 350px; height: 40px">
				</div>
				<div class="input_wrap">
					<label for="nama">Masukkan Nama</label>
					<input type="text" Name="Nama">
				</div>
                <div class="input_wrap">
					<label for="alamat">Masukkan Alamat</label>
					<input type="text" Name="Alamat">
				</div>
				<div class="input_wrap">
					<label for="menu">Masukkan Menu</label>
					<input type="text" Name="Menu">
				</div>
                <div class="input_wrap">
					<label for="psn">Jumlah Pesanan</label>
					<input type="number" Name="Jumlah" style="width: 350px; height: 40px">
				</div>
                <div class="input_wrap">
					<label for="tlpn">Masukkan Telepon</label>
					<input type="number" Name="Phone" style="width: 350px; height: 40px">
				</div>
                <div class="input_wrap">
					<label for="status">Masukkan Status</label>
					<input type="text" Name="Status">
				</div>
				<div class="input_wrap">
					<input type="submit" value="Create" class="submit_btn">
				</div>
			</div>
		</form>
	</div>
</div>

</body>
</html>