<?php
$namafolder="gambar_siswa/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
    $jenis_gambar=$_FILES['nama_file']['type'];
        $kode_siswa = $_POST['kode_siswa'];
        $nis= $_POST['nis'];
        $nama_siswa=$_POST['nama_siswa'];
        $kelamin=$_POST['kelamin'];
        $agama=$_POST['agama'];
        $tempat_lahir=$_POST['tempat_lahir'];
        $tanggal_lahir=$_POST['tanggal_lahir'];
        $alamat=$_POST['alamat'];
        $no_telepon=$_POST['no_telepon'];
        $tahun_angkatan=$_POST['tahun_angkatan'];
        $status=$_POST['status'];
        $username=$_POST['username'];
        $password1=$_POST['password'];
        $password=($password1);
    
$cekdata="select nis from siswa where nis='".$_POST['nis']."'";
$ada=mysql_query($cekdata) or die(mysql_error());

if(mysql_num_rows($ada)>0) {
    echo '<script>
    alert("NOMOR INDUK SISWA SUDAH TERDAFTAR !!!"); window.location="input-siswa.php"; </script>';
exit();}
    {           
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);     
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql="INSERT INTO siswa(kode_siswa,nis,nama_siswa,kelamin,agama,tempat_lahir,tanggal_lahir,alamat,no_telepon,tahun_angkatan,status,username,password,gambar) VALUES
            ('$kode_siswa','$nis','$nama_siswa','$kelamin','$agama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telepon','$tahun_angkatan','$status','$username','$password','$gambar')";
            $res=mysqli_query($koneksi,$sql) or die (mysqli_error());
        /** echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<p>User Id  : $user_id</p>";
            echo "<p>Username : $username</p>";
            echo "<p>Password : $password</p>";
            echo "<p>Fullname : $fullname</p>";
            echo "<p>Gambar   : $gambar</p>";**/
            echo "<script>alert('Data berhasil dimasukan!'); window.location = 'siswa.php'</script>";      
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