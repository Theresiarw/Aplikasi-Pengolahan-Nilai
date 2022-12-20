<html>
  <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="canonical shortcut icon" href="../foto/lapk.jpg" />
<head><title>Aplikasi Pengolahan Nilai</title>
<body><center><br>
  <table width="80%" border="0" align="center">
  <tr>
    <td width="140" rowspan="6"><div align="center"><img src="logo.png" width="130" height="120"></div></td>
    <td width="990">&nbsp;</td>
  </tr>
  <tr>
   <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"><strong><font size="+2">DAFTAR GURU </font></strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><strong><font size="+2">SMP NEGERI 5 SENDAWAR </font></strong></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center" >JL.Satya Jaya RT 1 Pepas Eheng, Kec.Barong Tongkok Kode Pos 75576</div></td>
     </tr>
  <tr>


    <td height="15">&nbsp;</td>
  </tr>
</table>
 <table  width="80%" cellspacing="0" cellpadding="0" id="table1">
  <tr><td align=center style='border-bottom:3px solid black;'>
   <tr><td align=center><br></br>
  <?php
  error_reporting(E_ALL ^ E_DEPRECATED);
  include "../conn.php";

  $data=mysql_query("select * from guru order by kode_guru asc");
  echo "
  <div class='table-responsive'>
  	<table class='table table-bordered table-striped table-hover' style='width:100%'>
  	<tr class='success'>
      <th class='text-center'>Kode</th>
  		<th class='text-center'>NIP</th>
  		<th class='text-center'>Nama</th>
  		<th class='text-center'>Jenis Kelamin</th>
  		<th class='text-center'>Alamat</th>
      <th class='text-center'>No. Telepon</th>
      <th class='text-center'>Status</th>
  	</tr>
  ";

  
while($tampil=mysql_fetch_array($data)){
  echo "
  	<tr>
      <td><center>$tampil[kode_guru]</center></td>
  		<td><justly>$tampil[nip]</justly></td>
  		<td><justly>$tampil[nama_guru]</justly></td>
  		<td><center>$tampil[kelamin]</center></td>
  		<td><justly>$tampil[alamat]</justly></td>
      <td><center>$tampil[no_telepon]</center></td>
      <td><center>$tampil[status_aktif]</center></td>

  	</tr>
  ";
  }

  $tglnow=date('d F Y');
  echo "</table>
  </td></tr>
  <tr><td align=right>
  <table style='width:30%'>
  <br><br>
  <tr><td align=center><b>Pepas Eheng, $tglnow<b></td></tr>
  <tr><td align=center><b>Kepala Sekolah,<b></td></tr>
  <tr><td align=center height=60></td></tr>
  <tr><td align=center ><u><b>Gorinsius Jeliban<u><b></td></tr>
  <tr><td align=center ><b>NIP. 19640601 198803 1 015<b></td></tr>
  </table>
  </td></tr>
  </div>
  </table>";
  ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
