<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "head.php"; ?>
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include "header.php"; ?>
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
$logout_redirect_url = "../index.php"; // Set logout URL

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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="ace-icon fa fa-home"></i> Home &raquo; Data Kelas Siswa</h3>
          	<!--<div class="row mt">
              <div class="col-lg-4">
              <form action='kelas-siswa.php' method="POST">

	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan Kode Kelas atau Kelas' required />
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='kelas-siswa.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
              </div>-->
              <!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-book"></i> Data Kelas Siswa </h3>
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">
                    <?php
                    $query1="SELECT kelas_siswa.id, kelas_siswa.kode_kelas, kelas.tahun_ajar, kelas.kelas, kelas.nama_kelas, guru.nama_guru,
                            siswa.nis, siswa.nama_siswa, siswa.tahun_angkatan, siswa.status
                            FROM kelas_siswa, kelas, guru, siswa
                            WHERE kelas_siswa.kode_kelas=kelas.kode_kelas AND
                            kelas.kode_guru=guru.kode_guru AND siswa.kode_siswa=kelas_siswa.kode_siswa";

                   /** if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  kelas
	               where kode_kelas like '%$qcari%'
	               or kelas like '%$qcari%'  ";
                    }**/
                    $tampil=mysqli_query($koneksi,$query1) or die(mysqli_error());
                    ?>
                  <div class="table-responsive">
                    <table id="lookup" class="table table-bordered table-hover">
  <thead bgcolor="eeeeee" align="center">

                      <tr>
                        <th class='text-center'>Id <i></i></th>
                        <th class='text-center'>Kode Kelas <i></i></th>
                        <th class='text-center'>Tahun Ajar <i></i></th>
                        <th class='text-center'>Kelas <i></i></th>
                        <th class='text-center'>Nama Kelas <i></i></th>
                        <th class='text-center'>Nama Walikelas <i></i></th>
                        <th class='text-center'>NIS <i></i></th>
                        <th class='text-center'>Nama Siswa <i></i></th>
                        <th class='text-center'>Tahun Angkatan</th>
                        <th class='text-center'>Status Siswa <i></i></th>
                      </tr>
                     <?php while($data=mysqli_fetch_array($tampil))
                    { ?>
                    <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['kode_kelas']; ?></td>
                  
                    <td><?php echo $data['tahun_ajar'];?></td>
                    <td><?php echo $data['kelas'];?></td>
                    <td><?php echo $data['nama_kelas'];?></td>
                    <td><?php echo $data['nama_guru']; ?></td>
                    <td><?php echo $data['nis'];?></td>
                     <td><?php echo $data['nama_siswa'];?></td>
                      <td><?php echo $data['tahun_angkatan'];?></td>
                    <td><?php echo $data['status'];?></td>
                    <!--<td><center><a class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-original-title="Edit Kelas" href="edit-kelas.php?hal=edit-admin&kd=<?php /**echo $data['kode_kelas'];**/?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <hr /><a class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-original-title="Hapus Kelas" href="hapus-kelas.php?hal=hapus&kd=<?php /**echo $data['kode_kelas'];**/?>" onclick="return confirm('Apakah anda akan menghapus <?php /**echo $data['kode_kelas'];**/ ?> ?');"><span class="glyphicon glyphicon-trash"></a></center></td></tr>-->
                 <?php
              }
              ?>
                   </tbody>
                   </table>
                   </div>
                <div class="text-right">
                  <a href="input-kelas-siswa.php" class="btn btn-primary">Tambah Kelas Siswa <i class="fa fa-arrow-circle-right"></i></a>

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
