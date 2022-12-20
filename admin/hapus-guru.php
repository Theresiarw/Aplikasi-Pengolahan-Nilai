<?php
include "../conn.php";
$kode_guru = $_GET['kd'];

$query = mysqli_query($koneksi,"DELETE FROM guru WHERE kode_guru='$kode_guru'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'guru.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'guru.php'</script>";	
}
?>