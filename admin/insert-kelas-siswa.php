<?php
include "../conn.php";
$kode_kelas   = $_POST['kelas'];
$kode_siswa   = $_POST['kode_siswa'];


$sqlCek="SELECT * FROM kelas_siswa WHERE kode_kelas='$kode_kelas' AND kode_siswa='$kode_siswa'";
	$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
	if(mysqli_num_rows($qryCek)>=1){
		echo "<script>alert('Data sudah ada silahkan diulangi!'); window.location = 'kelas-siswa.php'</script>";	
	} else {
    
$query = mysqli_query($koneksi,"INSERT INTO kelas_siswa (kode_kelas, kode_siswa) VALUES ('$kode_kelas', '$kode_siswa')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'kelas-siswa.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'kelas-siswa.php'</script>";	
}
}
?>