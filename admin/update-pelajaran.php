<?php
include "../conn.php";
$kode_pelajaran = $_POST['kode_pelajaran'];
$nama_pelajaran = $_POST['nama_pelajaran'];
$kkm            = $_POST['kkm'];
$keterangan     = $_POST['keterangan'];

$sqlCek="SELECT * FROM pelajaran WHERE nama_pelajaran='$nama_pelajaran' AND kkm='$kkm'";
	$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
	if(mysqli_num_rows($qryCek)>0){

		echo "<script>alert('Data sudah ada silahkan diulangi!'); window.location = 'pelajaran.php'</script>";	
	} else {

$query = mysqli_query($koneksi,"UPDATE pelajaran SET nama_pelajaran='$nama_pelajaran', kkm='$kkm', keterangan='$keterangan' WHERE kode_pelajaran='$kode_pelajaran'")or die(mysqli_error());
if ($query){
header('location:pelajaran.php');	
} else {
	echo "gagal";
    }
    }
?>