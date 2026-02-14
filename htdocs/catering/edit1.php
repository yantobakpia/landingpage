<?php 

    include_once("connection.php");

    $statement = $conn->prepare('SELECT * FROM users WHERE Tanggal=:Tanggal');
    $statement->execute([
        'Tanggal' => $_GET['Tanggal']
    ]);
    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
?>
<link rel="stylesheet" href="style2.css">
<div class="wrapper">
	<div class="registration_form">
	<div class="title">
			Edit Data Pemesanan
		</div>
		
    <form action="update.php?Tanggal=<?php echo $_GET['Tanggal']; ?>" method="post">
			<div class="form_wrap">
            <div class="input_wrap">
					<label for="tgl">Masukkan Tanggal</label>
					<input type="date" Name="Tanggal" placeholder="Tanggal" style="width: 350px; height: 40px" value="<?php echo $user['Tanggal']; ?>">
				</div>
				<div class="input_wrap">
					<label for="nama">Masukkan Nama</label>
					<input type="text" Name="Nama" placeholder="Nama" value="<?php echo $user['Nama']; ?>">
				</div>
                <div class="input_wrap">
					<label for="alamat">Masukkan Alamat</label>
					<input type="text" Name="Alamat" placeholder="Alamat" value="<?php echo $user['Alamat']; ?>">
				</div>
				<div class="input_wrap">
					<label for="menu">Masukkan Menu</label>
					<input type="text" Name="Menu" placeholder="Menu" value="<?php echo $user['Menu']; ?>">
				</div>
                <div class="input_wrap">
					<label for="psn">Jumlah Pesanan</label>
					<input type="number" Name="Jumlah" placeholder="Jumlah Pesanan" style="width: 350px; height: 40px" value="<?php echo $user['Jumlah']; ?>">
				</div>
                <div class="input_wrap">
					<label for="tlpn">Masukkan Telepon</label>
					<input type="number" Name="Phone" placeholder="Telepon" style="width: 350px; height: 40px" value="<?php echo $user['Phone']; ?>">
				</div>
                <div class="input_wrap">
					<label for="status">Masukkan Status</label>
					<input type="text" Name="Status" placeholder="Status" value="<?php echo $user['Status']; ?>">
				</div>
				<div class="input_wrap">
					<input type="submit" value="Update" class="submit_btn">
				</div>
			</div>
    </div>
</div>
		</form>



