<?php
$artikel = [
    [
        "judul" => "belajar php & mysql untuk pemula",
        "penulis" => "digital talent"
    ],
    [
        "judul" => "tutorial php dari nol hingga mahir",
        "penulis" => "digital talent"
    ],
    [
        "judul" => "membuat apk web dengan php",
        "penulis" => "digital talent"
    ]
];

foreach($artikel as $post){
    echo "<h2>".$post["judul"]."</h2>";
    echo "<p>oleh: ".$post["penulis"]."</p>";
    echo "<hr>";
}
?>