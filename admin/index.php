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
<p class="centered"><a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><img src="<?php echo $_SESSION['gambar']; ?>" class="img-rounded" width="100" style="border: 0px solid ;"/></a></p>
                  <h5 class="centered">
              <?php
              echo $_SESSION['fullname'];
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

              <div class="row">
                  <div class="col-lg-9 main-chart">

                  	<div class="row mtbox">

                    <?php $tampil=mysqli_query($koneksi,"select * from guru order by kode_guru desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
                                <h3><a href="guru.php" class="label">Guru</a></h3>
					  			<span class="ace-icon glyphicon glyphicon-user"></span>
					  			<h3><?php echo "$total"; ?></h3>
                  			</div>
					  			<p><?php echo "$total"; ?> Orang Guru </p>
                  		</div>

                        <?php $tampil=mysqli_query($koneksi,"select * from siswa order by kode_siswa desc");
                        $total_siswa=mysqli_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="siswa.php" class="label"">Siswa</a></h3>
					  			<span class="ace-icon fa fa-users"></span>
					  			<h3><?php echo "$total_siswa"; ?></h3>
                  			</div>
					  			<p><?php echo "$total_siswa"; ?> Orang Siswa</p>
                  		</div>
                        <?php $tampil=mysqli_query($koneksi,"select * from pelajaran order by kode_pelajaran desc");
                        $total_pelajaran=mysqli_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="pelajaran.php" class="label"">Pelajaran</a></h3>
					  			<span class="ace-icon fa fa-book"></span>
					  			<h3><?php echo "$total_pelajaran"; ?></h3>
                  			</div>
					  			<p><?php echo "$total_pelajaran"; ?> Mata Pelajaran</p>
                  		</div>
                        <?php $tampil=mysqli_query($koneksi,"select * from kelas order by kode_kelas desc");
                        $total_kelas=mysqli_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="kelas.php" class="label"">Kelas</a></h3>
					  			<span class="ace-icon fa fa-home"></span>
					  			<h3><?php echo "$total_kelas"; ?></h3>
                  			</div>
					  			<p><?php echo "$total_kelas"; ?> Kelas</p>
                  		</div>
                        <?php $tampil=mysqli_query($koneksi,"select * from user order by user_id desc");
                        $total_admin=mysqli_num_rows($tampil);
                    ?>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
                                <h3><a href="admin.php" class="label"">Admin</a></h3>
					  			<span class="ace-icon fa fa-key green"></span>
					  			<h3><?php echo "$total_admin"; ?></h3>
                  			</div>
					  			<p><?php echo "$total_admin"; ?> Orang Admin</p>
                  		</div>

                  	</div><!-- /row mt -->

  
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <?php include "footer.php"; ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/zabuto_calendar.js"></script>

	<!-- <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'SiNiS (Sistem Informasi Nilai Siswa)',
            // (string | mandatory) the text inside the notification
            text: 'Aplikasi ini ditujukan untuk pengolahan nilai siswa sekolah SMP, SMA dan SMK. Hubungi  <a href="http://hakkoblogs.com" target="_blank" style="color:#ffd777">Hakko Blogs</a> untuk update terbaru.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>-->

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>


  </body>
</html>
