<?php
mysql_connect("localhost","root","");
mysql_select_db("smk");

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "smk";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
    
?>