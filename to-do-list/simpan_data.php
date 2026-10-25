<?php
include('koneksi.php');

$judul = $_POST['judul'];

$sql = "insert into list (judul) values ('$judul')";
mysqli_query($koneksi, $sql) or die("gagal SQL");

header('location:index.php');