<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:../login-guru.php'); 
} else {
  include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Penilaian Siswa">
    <meta name="author" content="">
    <meta name="keyword" content="">

    <title>Aplikasi Pengolahan Data Nilai</title>
    <!-- Bootstrap core CSS -->
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../admin/assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../admin/assets/js/bootstrap-daterangepicker/daterangepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="../admin/assets/css/style.css" rel="stylesheet">
    <link href="../admin/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="canonical shortcut icon" href="../foto/index.jpg" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>Aplikasi Pengolahan Data Nilai Siswa</b></a>
            <!--logo end-->
            
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../logout.php" onclick="return confirm('Apakah anda Ingin keluar?');">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                    <p class="centered"><a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><img src="../admin/<?php echo $_SESSION['gambar']?>" class="img-rounded" width="100"></a></p>
                  <h5 class="centered">
                    Selamat Datang,<br />
                    <?php
              echo $_SESSION['nama'];
               ?></h5>
                    <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../login-guru.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                    
                  <?php include 'menu.php'; ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <?php
      $dataKelas    = isset($_POST['cmbKelas']) ? $_POST['cmbKelas'] : '';
      $dataPelajaran  = isset($_POST['cmbPelajaran']) ? $_POST['cmbPelajaran'] : '';
      $dataSemester = isset($_POST['cmbSemester']) ? $_POST['cmbSemester'] : '';

# Filter Data Nilai berdasarkan Combo yang dipilih
$filterSQL  = "";
if(isset($_POST['btnPilih1'])) {
  $filterSQL = " WHERE nilai.kode_kelas = '$dataKelas'";
}
elseif(isset($_POST['btnPilih2'])) {
  $filterSQL = " WHERE nilai.kode_kelas = '$dataKelas' AND nilai.kode_pelajaran = '$dataPelajaran'";
}
elseif(isset($_POST['btnPilih3'])) {
  $filterSQL = " WHERE nilai.kode_kelas = '$dataKelas' AND nilai.kode_pelajaran = '$dataPelajaran' AND nilai.semester = '$dataSemester'";
}
else {
  $filterSQL = "";
}
      ?>
      <section id="main-content">
          <section class="wrapper">
            <h3><i class="ace-icon fa fa-home"></i> Home &raquo; Data Nilai Siswa</h3>
           <div class="row mt">
              <div class="col-lg-4">
              <form action='<?php $_SERVER['PHP_SELF']; ?>' target="_self" method="POST">
                    <div class="form-group">
                              <label class="col-sm-2 col-sm-3 control-label">pilih Kelas</label>
                              <div class="col-sm-10">
                                  <select name="cmbKelas" id="cmbKelas"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <?php
                                  $dataQry = mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY tahun_ajar");
                                  while ($dataRow = mysqli_fetch_array($dataQry)) {
                                  if ($dataRow['kode_kelas'] == $dataKelas) {
                                $cek = " selected";
                                   } else { $cek=""; }
                                   echo "<option value='$dataRow[kode_kelas]' $cek>$dataRow[kelas] | $dataRow[nama_kelas] ( $dataRow[tahun_ajar] )</option>";
                                      }
                                    ?>
                                  </select><br />
                                  <input name="btnPilih1" type="submit" class="btn btn-sm btn-primary" value="Pilih &raquo" />
                                  <a href="nilai.php" class="btn btn-sm btn-warning"> Refresh </a>
                                  </div>
                    </div>
                </div>
              </div>
              <br />
              <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> DAFTAR SISWA</h3>
                        </div>

                        <div class="panel-body">
                        <div class="text-left">
                        
                       
                       
                        <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">

                      <tr>
                        
                         <th class='text-center'>No</th>
                        <th class='text-center'>NIS </th>
                        <th class='text-center'>Nama Siswa </th>
                        <th class='text-center'>Semester </th>
                        
                     
                        <th class='text-center'>Tools</th>
                      </tr>
                       <?php
                     $myQry = mysqli_query($koneksi,"SELECT DISTINCT nilai.semester, siswa.nama_siswa, siswa.nis, siswa.kode_siswa from nilai
         LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
        LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
          $filterSQL ORDER BY nis, semester ASC");
             $nomor  = 0;
             while ($myData = mysqli_fetch_array($myQry)) {
                $nomor++;
              $Kode = $myData['kode_siswa'];

                     ?>
                      <tr>
                      <td class='text-center'> <?php echo $nomor; ?> </td>
                  <td class='text-center'> <?php echo $myData['nis']; ?> </td>

                  <td > <?php echo $myData['nama_siswa']; ?> </td>

                  <td class='text-center'> <?php echo $myData['semester']; ?> </td>
                  
                      <td><center><a class="btn btn-sm btn-primary tooltipss" data-placement="bottom" data-original-title="Print Nilai" href="rincian.php?kd=<?php echo $Kode;?>&&kode=<?php echo $myData['semester'];;?>"><span class="glyphicon glyphicon-file"></span></a>

                 <?php
              }
              ?>
                  </tbody>
                   </table>
                   </div>
                <div class="text-right">
                  <a href="input-nilai.php" class="btn btn-sm btn-primary">Input Nilai Siswa <i class="fa fa-arrow-circle-right"></i></a>
                

                </div>
              </div>
              </div>
            </div><!-- col-lg-12-->
            </div><!-- /row -->


    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
     <?php include "footer.php"; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom switch-->
  <script src="assets/js/bootstrap-switch.js"></script>

  <!--custom tagsinput-->
  <script src="assets/js/jquery.tagsinput.js"></script>

  <!--custom checkbox & radio-->

  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

  <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


  <script src="assets/js/form-component.js"></script>


  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
