<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password1 = $_POST['password'];
$password = ($password1);

if (empty($username) && empty($password)) {
	header('location:login.html?error1');
} else if (empty($username)) {
	header('location:login.html?error=2');
} else if (empty($password)) {
	header('location:login.html?error=3');
}

$q = mysqli_query($koneksi,"select * from siswa where nis='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id'] = $row['kode_siswa'];
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $row['nama_siswa'];
    $_SESSION['kode'] = $row['kode_siswa'];
    $_SESSION['gambar'] = $row['gambar'];	

	header('location:siswa/index.php');
} else {
	header('location:login.html?error=4');
}
?>