
  <html>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="canonical shortcut icon" href="../foto/lapk.jpg" />
  <head><title>Aplikasi Pengolahan Nilai</title>
  <body><center><br>
  <table  width="70%" cellspacing="0" cellpadding="0" id="table1">
      <tr><td colspan="8"><p align="center"><font ace="Times New Roman" size="4"><b>Daftar Nilai Siswa</b></font></td></tr>
      <tr><td colspan="8"><p align="center"><font ace="Times New Roman" size="3"><b>SMP Negeri 5 Sendawar</b></font></td></tr>
        <tr><td align=center style='border-bottom:3px solid black;'>
   <tr><td align=center><br></b>
     
        <?php
 error_reporting(E_ALL ^ E_DEPRECATED);
  include "../conn.php";

                     $myQry = mysqli_query($koneksi,"SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis FROM nilai
        LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
        LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
       ORDER BY semester, kode_pelajaran ASC");
           
           echo "   
          <div class='table-responsive'>
    <table class='table table-bordered table-striped table-hover' style='width:100%'>
    <tr class='success'>
      <th class='text-center'>No</th>
      <th class='text-center'>NIS</th>
      <th class='text-center'>Nama</th>
      <th class='text-center'>T1</th>
      <th class='text-center'>T2</th>
      <th class='text-center'>T3</th>
      <th class='text-center'>T4</th>
      <th class='text-center'>T5</th>
      <th class='text-center'>T6</th>
      <th class='text-center'>UTS</th>
      <th class='text-center'>UAS</th>
    </tr>
 ";
       $nomor  = 0;
              while ($myData = mysqli_fetch_array($myQry)) {
                $nomor++;
              $Kode = $myData['id'];
        echo "<tr>
      <td><center>$nomor</center></td>
      <td><justly>$myData[nis]</justly></td>
       <td><justly>$myData[nama_siswa]</justly></td>
      <td><center>$myData[nilai_tugas1]</center></td>
      <td><center>$myData[nilai_tugas2]</center></td>
      <td><center>$myData[nilai_tugas3]</center></td>
      <td><center>$myData[nilai_tugas4]</center></td>
      <td><center>$myData[nilai_tugas5]</center></td>
      <td><center>$myData[nilai_tugas6]</center></td>
      <td><center>$myData[nilai_uts]</center></td>
      <td><center>$myData[nilai_uas]</center></td>
     

    </tr>
  ";
  }


  $tglnow=date('d F Y');
  echo "</table>
  </td></tr>
  <tr><td align=right>
  <table style='width:30%'>
  <br><br>
  <tr><td align=center>Sendawar, $tglnow</td></tr>
  <tr><td align=center>Kepala Sekolah,</td></tr>
  <tr><td align=center height=60></td></tr>
  <tr><td align=center >Gorinsius Jeliban</td></tr>
  </table>
  </td></tr>
  </div>
  </table>";
 ?>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>