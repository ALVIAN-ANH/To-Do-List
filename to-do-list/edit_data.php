<?php
include('koneksi.php');

$judul = $_POST['judul'];
$id = $_POST['id'];

$sql = "update list set judul='$judul' where id='$id'";
mysqli_query($koneksi, $sql) or die("gagal SQL");

header('location:index.php');