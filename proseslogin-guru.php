<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password1 = $_POST['password'];
$password = ($password1);

if (empty($username) && empty($password)) {
	header('location:login-guru.php?error1');

} else if (empty($username)) {
	header('location:login-guru.php?error=2');

} else if (empty($password)) {
	header('location:login-guru.php?error=3');

}

$q = mysqli_query($koneksi,"SELECT * FROM guru where username='$username' AND password='$password'") or die (mysqli_error());
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id'] = $row['kode_guru'];
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $row['nama_guru'];
    $_SESSION['kode'] = $row['kode_guru'];
    $_SESSION['gambar'] = $row['gambar'];	

	header('location:guru/nilai.php');
} else {
	header('location:login-guru.php?error=4');
}
?>