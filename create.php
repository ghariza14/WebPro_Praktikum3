<?php
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$data = "$nama|$kategori|$deskripsi\n";

file_put_contents("laporan.txt", $data, FILE_APPEND);

header("Location: dashboard.php");
exit;
?>