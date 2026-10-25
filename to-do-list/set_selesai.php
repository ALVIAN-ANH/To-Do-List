<?php

include('koneksi.php');

$id = $_GET['id'];

$sql = "update list set status_selesai=1 where id='$id'";
mysqli_query($koneksi, $sql) or die("Gagal");

header('location:index.php');