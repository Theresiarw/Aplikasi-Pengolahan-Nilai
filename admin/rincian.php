<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:../index.php'); 
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
    <link rel="canonical shortcut icon" href="../foto/lap.jpg" />
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
                    
                          
                    </div>
                </div>
              </div>
             
              <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> DAFTAR NILAI SISWA</h3>
                        </div>

                        <div class="panel-body">
                        <div class="text-left">
                        
                        
                        <div class="table-responsive">
                          
                  <table class="table table-bordered table-hover table-striped tablesorter">

                      <tr>
                        
                        <th class='text-center'>No</th>
                        <th class='text-center'>Kode Pelajaran</th>
                        <th class='text-center'>Mata Pelajaran</th>
                        
                        <th class='text-center'>T1</th>
                        <th class='text-center'>T2</th>
                        <th class='text-center'>T3</th>
                        <th class='text-center'>T4</th>
                        <th class='text-center'>T5</th>
                        <th class='text-center'>T6</th>
                        <th class='text-center'>UTS</th>
                        <th class='text-center'>UAS</th>
                       
                      </tr>
                     <?php
$kodesaya = $_GET['kd'];
$kode = $_GET['kode'];
$myQry=mysqli_query($koneksi,"SELECT DISTINCT nilai.*, siswa.kode_siswa, siswa.nis, siswa.nama_siswa,
                                        nilai.semester, pelajaran.nama_pelajaran, nilai.kode_pelajaran,
                                        nilai.nilai_tugas1, nilai.nilai_tugas2, nilai.nilai_tugas3,nilai.nilai_tugas4, nilai.nilai_tugas5, nilai.nilai_tugas6,
                                        nilai.nilai_uts, nilai.nilai_uas, nilai.keterangan
                                    
                                        FROM siswa, nilai, pelajaran, kelas, kelas_siswa
                                        WHERE siswa.kode_siswa=nilai.kode_siswa AND
                                        nilai.kode_pelajaran=pelajaran.kode_pelajaran AND
                                        kelas.kode_kelas=kelas_siswa.kode_kelas AND
                                        kelas_siswa.kode_siswa=siswa.kode_siswa AND
                                        siswa.kode_siswa='$kodesaya' AND nilai.semester='$kode'
                                        $filterSQL ORDER BY kode_pelajaran ASC") or die(mysqli_error())
                    ?>
                    <?php
                 
              $nomor  = 0;
             while ($myData = mysqli_fetch_array($myQry)) {
                $nomor++;
                $Kode = $myData['id'];
              
 ?>
                      <tr>
                     
                <td class='text-center'> <?php echo $nomor; ?> </td>
                  <td class='text-center'> <?php echo $myData['kode_pelajaran']; ?> </td>
                  <td> <?php echo $myData['nama_pelajaran']; ?> </td>
                 
                  <td class='text-center'> <?php echo $myData['nilai_tugas1']; ?> </td>
                  <td class='text-center'> <?php echo $myData['nilai_tugas2']; ?> </td>
                  <td class='text-center'> <?php echo $myData['nilai_tugas3']; ?> </td>
                      <td class='text-center'> <?php echo $myData['nilai_tugas4']; ?> </td>
                      <td class='text-center'> <?php echo $myData['nilai_tugas5']; ?> </td>
                      <td class='text-center'> <?php echo $myData['nilai_tugas6']; ?> </td>
                  <td class='text-center'> <?php echo $myData['nilai_uts']; ?> </td>
                  <td class='text-center'> <?php echo $myData['nilai_uas']; ?> </td>

                 <?php   
              }
               ?>
                   </tbody>
                   </table>
                  
                 </div>
                <div class="text-right">
                  <a href="nilai.php" class="btn btn-primary">Kembali <i class="fa fa-arrow-circle-right"></i></a>
                

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
