<?php
include "../conn.php";
$kode_kelas   = $_POST['kode_kelas'];
$tahun_ajar   = $_POST['tahun_ajar'];
$kelas        = $_POST['kelas'];
$nama_kelas   = $_POST['nama_kelas'];
$kode_guru    = $_POST['kode_guru'];
$status_aktif = $_POST['status_aktif'];

$sqlCek="SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' AND kode_guru='$kode_guru'";
	$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
	if(mysqli_num_rows($qryCek)>0){

		echo "<script>alert('Data sudah ada silahkan diulangi!'); window.location = 'kelas.php'</script>";	
	} else {
    
$query = mysqli_query($koneksi,"INSERT INTO kelas (kode_kelas, tahun_ajar, kelas, nama_kelas, kode_guru, status_aktif) VALUES 
                      ('$kode_kelas', '$tahun_ajar', '$kelas', '$nama_kelas', '$kode_guru', '$status_aktif')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'kelas.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'kelas.php'</script>";	
}
}
?>