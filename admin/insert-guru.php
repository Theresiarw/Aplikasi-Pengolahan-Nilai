
<?php
 $namafolder="gambar_guru/";//tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "../conn.php";
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $kode_guru = $_POST['kode_guru'];
		$nip= $_POST['nip'];
		$nama_guru=$_POST['nama_guru'];
        $kelamin=$_POST['kelamin'];
        $alamat=$_POST['alamat'];
        $no_telepon=$_POST['no_telepon'];
        $status_aktif=$_POST['status_aktif'];
        $username=$_POST['username'];
        $password1=$_POST['password'];
        $password=($password1);

$cekdata="select nip from guru where nip='".$_POST['nip']."'";
$ada=mysql_query($cekdata) or die(mysql_error());

if(mysql_num_rows($ada)>0) {
	echo '<script>
	alert("NIP GURU SUDAH TERDAFTAR !!!"); window.location="input-guru.php"; </script>';
exit();}	
{		

		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO guru(kode_guru,nip,nama_guru,kelamin,alamat,no_telepon,status_aktif,username,password,gambar) VALUES
            ('$kode_guru','$nip','$nama_guru','$kelamin','$alamat','$no_telepon','$status_aktif','$username','$password','$gambar')";
			$res=mysqli_query($koneksi,$sql) or die (mysqli_error());
		/**	echo "Gambar berhasil dikirim ke direktori".$gambar;
	       	echo "<p>User Id  : $user_id</p>";
            echo "<p>Username : $username</p>";
            echo "<p>Password : $password</p>";
            echo "<p>Fullname : $fullname</p>";
            echo "<p>Gambar   : $gambar</p>";**/
            echo "<script>alert('Data berhasil dimasukan!'); window.location = 'guru.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   
   }
} else {
	echo "Anda belum memilih gambar";
}

/*include "../conn.php";
$user_id  = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

$query = mysql_query("INSERT INTO admin (user_id, username, password, fullname) VALUES ('$user_id', '$username', '$password', '$fullname')");
if ($query){
	echo "<script>alert('Data Admin Berhasil dimasukan!'); window.location = 'admin.php'</script>";	
} else {
	echo "<script>alert('Data Admin Gagal dimasukan!'); window.location = 'admin.php'</script>";	
}*/


?>