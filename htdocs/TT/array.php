<?php
$barang = ["Buku Tulis", "Penghapus", "Spidol"];

foreach($barang as $isi){
    echo $isi."<br>";
}

echo "<hr>";

$i = 0;
while($i < count($barang)){
    echo $barang[$i]."<br>";
    $i++;
}
?>