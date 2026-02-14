
<?php

include 'config.php';
session_start();

include 'authcheckkasir.php';

$view = $dbconnect->query('SELECT * FROM transaksi');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Transaksi</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">

	<?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>

		<div class="alert alert-success" role="alert">
			<?=$_SESSION['success']?>
		</div>

	<?php
        }
        $_SESSION['success'] = '';
    ?>

    <h1>Riwayat Transaksi</h1>
    <a href="kasir.php">Kembali</a>
	<table class="table table-bordered">
		<tr>
			<th>Nomor</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Kasir</th>

		</tr>
		<?php

        while ($row = $view->fetch_array()) { ?>

		<tr>
			<td> <?= $row['nomor'] ?> </td>
			<td><?= $row['tanggal_waktu'] ?></td>
			<td><?=$row['total']?></td>
			<td><?=$row['nama']?></td>
		</tr>

		<?php }
        ?>

	</table>
</div>
</body>
</html>