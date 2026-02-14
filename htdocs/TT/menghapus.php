<?php
$hewan = [
    "Manuk",
    "Kucing",
    "Ikan"
];

unset($hewan[1]);

echo $hewan[0]."<br>";
echo $hewan[2]."<br>";
echo "<hr>";
echo "<pre>";
print_r($hewan);
echo "</pre>";
?>