<?php
    include 'nav.php';
    ?>
<?php include_once("connection.php"); ?>  


<head>

<link rel="stylesheet" href="css/bootstrap.min.css">
<form action="form.php">
    <button style="border-style: none; padding-top: 10px; margin-left: 10px; margin-top: 20px; border-radius: 6px; background-color : #cc0052;font-family : Cambria Math; color: white; " ><h5><b> + Tambahkan Data Pesanan</b> </h5></button> 
    <h2 style="text-align: center; font-family: Cambria Math; color: white;"><b>Data Customer Pemesanan Indrut Catering</b><hr></h2>
</form>
</head>

<body style="background-image: url('src/d.png');">
<table border="1" cellspacing="0" cellpadding="12"  style="border: 1px white;">
	<thead>
    <tr style="border-style: hidden; text-align: center; color: white; font-family: Cambria Math;">
        <th style="background-color: #17a2b8; font-weight: bold; border-top-left-radius : 15px;">Id Pesanan</th>
        <th style="background-color: #17a2b8; padding-left: 24px; padding-right: 31px;">Tanggal</th>
        <th style="background-color: #17a2b8">Nama</th>
        <th style="background-color: #17a2b8">Alamat</th>
        <th style="background-color: #17a2b8; padding-left: 24px; padding-right: 25px;">Menu</th>
        <th style="background-color: #17a2b8">Jumlah Pesanan</th>
        <th style="background-color: #17a2b8">Telepon</th>
        <th style="background-color: #17a2b8">Status</th>
        <th style="background-color: #17a2b8; border-top-right-radius : 15px">Action</th>
    </tr>
    </thead>
    

    <?php $query = $conn->query('SELECT * FROM users'); ?>

    <?php if($query->rowCount() > 0): ?>
        <?php 
            $no = 1; 
            foreach($query->fetchAll(PDO::FETCH_ASSOC) AS $row): 
        ?>  
            <tr style="border-style: ridge;">
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF; text-align: center;"> <?php echo $row['Id_Pesanan']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF;"> <?php echo $row['Tanggal']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF;"> <?php echo $row['Nama']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF;"> <?php echo $row['Alamat']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF;"> <?php echo $row['Menu']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF; text-align: center;"> <?php echo $row['Jumlah']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF; text-align: center;"> <?php echo $row['Phone']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);font-family: Cambria Math;color:#FFFFFF; text-align: center;"> <?php echo $row['Status']; ?> </td>
                <td style="background-color: rgba(100,100,100,.9);"> 
                    <button style="border-style: none; padding-top: 5px; padding-bottom: 5px; margin-bottom: 5px; border-radius: 5px; background-color : #cc0052;font-family : Cambria Math; color: white; " onclick="window.location.href=`Edit1.php?Tanggal=<?php echo $row['Tanggal']; ?>`">Edit</button>
                    <button style="border-style: none; padding-top: 5px; padding-bottom: 5px; margin-bottom: 5px; border-radius: 5px; background-color : #cc0052;font-family : Cambria Math; color: white;" onclick="window.location.href=`Delete.php?Tanggal=<?php echo $row['Tanggal']; ?>`">Delete</button>
                </td>
            </tr>
        <?php 
            $no++; 
            endforeach; 
        ?>
    <?php else: ?>        
        <tr>
            <th colspan="9" style="background-color: rgba(100,100,100,.9); text-align: center; color:#FFFFFF; ">Belum ada data customer</th>
        </tr>		
    <?php endif; ?>

</table>
<tfoot>
	<tr>
        <p>
        <br>
		<h5 style="text-align: center; color: white; padding: 10px; border-style: none; padding-top: 10px; padding-bottom: 10px; margin-left: 500px; margin-right: 500px; margin-top: 10px; border-radius: 6px; background-color: rgba(100,100,100,.8); font-family : Calibri; color: white; "><b>Note: Status Boleh Diubah</b></h5>
        
    </p>
	</tr>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
</tfoot>