<?php

include('koneksi.php');

$id = $_GET['id'];

$sql = "delete from list where id='$id'";
mysqli_query($koneksi, $sql) or die("Gagal");

header('location:index.php');