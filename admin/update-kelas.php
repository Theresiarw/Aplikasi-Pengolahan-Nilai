<?php
include "../conn.php";
$kode_kelas   = $_POST['kode_kelas'];
$tahun_ajar   = $_POST['tahun_ajar'];
$kelas        = $_POST['kelas'];
$nama_kelas   = $_POST['nama_kelas'];
$kode_guru    = $_POST['kode_guru'];
$status_aktif = $_POST['status_aktif'];

$sqlCek="SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' AND tahun_ajar='$tahun_ajar'";
	$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
	if(mysqli_num_rows($qryCek)>0){

		echo "<script>alert('Data sudah ada silahkan diulangi!'); window.location = 'kelas.php'</script>";	
	} else {
    

$query = mysqli_query($koneksi,"UPDATE kelas SET tahun_ajar='$tahun_ajar', kelas='$kelas', nama_kelas='$nama_kelas', kode_guru='$kode_guru', status_aktif='$status_aktif' WHERE kode_kelas='$kode_kelas'")or die(mysqli_error());
if ($query){
header('location:kelas.php');	
} else {
	echo "gagal";
    }
    }
?>