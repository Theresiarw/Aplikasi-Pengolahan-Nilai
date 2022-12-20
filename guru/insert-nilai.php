<?php
include "../conn.php";
$semester      = $_POST['semester'];
$kode_pelajaran = $_POST['kode_pelajaran'];
$kode_guru      = $_POST['kode_guru'];
$kode_kelas     = $_POST['kode_kelas'];
$kode_siswa     = $_POST['kode_siswa'];
$nilai_tugas1   = $_POST['nilai_tugas1'];
$nilai_tugas2   = $_POST['nilai_tugas2'];
$nilai_tugas3   = $_POST['nilai_tugas3'];
$nilai_tugas4   = $_POST['nilai_tugas4'];
$nilai_tugas5   = $_POST['nilai_tugas5'];
$nilai_tugas6   = $_POST['nilai_tugas6'];
$nilai_uts      = $_POST['nilai_uts'];
$nilai_uas      = $_POST['nilai_uas'];
$rata_rata    = $_POST['rata_rata'];

if($rata_rata>70){
  $keterangan="TUNTAS";
}else {
  $keterangan="TIDAK TUNTAS";
}

/**$sqlCek="SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' AND tahun_ajar='$tahun_ajar'";
	$qryCek=mysql_query($sqlCek) or die ("Eror Query".mysql_error());
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama Kelas<b> $txtNamaKls </b> dengan <b>tahun ajaran</b> yang sama sudah dibuat";
	} else {}**/

$query = mysqli_query($koneksi,"INSERT INTO nilai (semester, kode_pelajaran, kode_guru, kode_kelas, kode_siswa, nilai_tugas1, nilai_tugas2, nilai_tugas3, nilai_tugas4, nilai_tugas5, nilai_tugas6, nilai_uts, nilai_uas, keterangan, rata_rata) VALUES
                      ('$semester', '$kode_pelajaran', '$kode_guru', '$kode_kelas', '$kode_siswa', '$nilai_tugas1', '$nilai_tugas2', '$nilai_tugas3', '$nilai_tugas4', '$nilai_tugas5', '$nilai_tugas6', '$nilai_uts', '$nilai_uas', '$keterangan', '$rata_rata' )");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'nilai.php'</script>";
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'nilai.php'</script>";
}

?>
