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

              	  <p class="centered"><a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><img src="../admin/<?php echo $_SESSION['gambar']; ?>" class="img-rounded" width="100" style="border: px solid white;"/></a></p>
              	  <h5 class="centered">
              <?php
              echo $_SESSION['nama'];
               ?></h5>
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
             <h3><i class="ace-icon fa fa-home"></i> Home &raquo; Profile Guru</h3>
              <!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
													<h1>
		                Form Biodata Guru
		              </h1>
                        </div>
                        <div class="panel-body">
                        <div class="table-responsive">

                    <?php
            $query = mysqli_query($koneksi, "SELECT * FROM guru WHERE kode_guru='$_GET[id]'");
            $data  = mysqli_fetch_array($query);
            ?>
                      <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td>Kode Guru</td>
                      <td><?php echo $data['kode_guru']; ?></td>
                      <td rowspan="9"><div class="pull-right image">
                            <img src="../admin/<?php echo $data['gambar']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 2px solid #666;" />
                        </div></td>
                      </tr>
                      <tr>
                      <td width="250">Nip</td>
                      <td width="565" colspan="1"><?php echo $data['nip']; ?></td>
                      </tr>
                       <tr>
                      <td width="250">Nama Guru</td>
                      <td width="565" colspan="1"><?php echo $data['nama_guru']; ?></td>
                      </tr>
                      <tr>
                      <td>Kelamin</td>
                      <td colspan="1"><?php echo $data['kelamin']; ?></td>
                      </tr>
                      <tr>
                      <td>Alamat</td>
                      <td colspan="1"><?php echo $data['alamat']; ?></td>
                      </tr>
                      <tr>
                      <td>No Telepon</td>
                      <td colspan="1"><?php echo $data['no_telepon']; ?></td>
                      </tr>
                      <tr>
                      <td>Status Mengajar</td>
                      <td colspan="1"><?php echo $data['status_aktif']; ?></td>
                      </tr>
                      <tr>
                      <td>Username</td>
                      <td colspan="1"><?php echo $data['username']; ?></td>
                      </tr>
                      <tr>
                      <td>Password</td>
                      <td ><input class="form-password" value="<?php echo $data['password']; ?>" type="password" readonly="readonly"> <input type="checkbox" class="form-checkbox"> Show password</td>
                      </tr>
                      </table>
                   </div>
                <div class="text-right">
                  <a href="nilai.php" class="btn btn-sm btn-warning">Kembali <i class="fa fa-arrow-circle-right"></i></a>

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
    <script src="../admin/assets/js/jquery.js"></script>
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../admin/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../admin/assets/js/jquery.scrollTo.min.js"></script>
    <script src="../admin/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../admin/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../admin/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="../admin/assets/js/bootstrap-switch.js"></script>

	<!--custom tagsinput-->
	<script src="../admin/assets/js/jquery.tagsinput.js"></script>

	<!--custom checkbox & radio-->

	<script type="text/javascript" src="../admin/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../admin/assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="../admin/assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

	<script type="text/javascript" src="../admin/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


	<script src="../admin/assets/js/form-component.js"></script>

    <script type="text/javascript">
	$(document).ready(function(){
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
</script>


  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
