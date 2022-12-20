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

      <title>Aplikasi Pengolahan Nilai</title>
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
                    <li><a class="logout" href="../logout-guru.php" onclick="return confirm('Apakah anda akan keluar?');">Logout</a></li>
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
 <p class="centered"><a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><img src="../admin/<?php echo $_SESSION['gambar']; ?>" class="img-rounded" width="100"></a></p>
                  <h5 class="centered">
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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <div class="page-header">
              <h1>
                Form Input Nilai
              </h1>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Data Pelajaran</h4>
                      <form class="form-horizontal style-form" onsubmit="return formCheck(this);" action="insert-nilai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Semester</label>
                              <div class="col-sm-4">
                              <select name="semester" id="semester"  class="form-control" required />
                                    <option value="kosong (semester tidak di pilih)"> ---- Pilih Salah Satu ---- </option>
                                    <option value="1">1 - Ganjil</option>
                                    <option value="2">2 - Genap</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pelajaran</label>
                              <div class="col-sm-4">
                                  <select name="kode_pelajaran" id="kode_pelajaran"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <?php
                                    $sql = mysqli_query($koneksi,"SELECT * FROM pelajaran ORDER BY kode_pelajaran ASC");
                                    if(mysqli_num_rows($sql) != 0){
                                    while($data = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$data['kode_pelajaran'].'>'.$data['nama_pelajaran'].'</option>'; }
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Guru Pengajar</label>
                              <div class="col-sm-4">
                                  <select name="kode_guru" id="kode_guru"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <?php
                                    $sql = mysqli_query($koneksi,"SELECT * FROM guru ORDER BY kode_guru ASC");
                                    if(mysqli_num_rows($sql) != 0){
                                    while($data = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$data['kode_guru'].'>'.$data['nama_guru'].'</option>'; }
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Data Siswa</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                              <div class="col-sm-4">
                                  <select name="kode_kelas" id="kode_kelas"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <?php
                                    $sql = mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY tahun_ajar ASC");
                                    if(mysqli_num_rows($sql) != 0){
                                    while($data = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$data['kode_kelas'].'>'.$data['kelas'].' | '.$data['nama_kelas'].' | '.$data['tahun_ajar'].'</option>';
                                    $data['kode_kelas'] = $dataKelas;}
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Siswa</label>
                              <div class="col-sm-4">
                                  <select name="kode_siswa" id="kode_siswa"  class="form-control" required />
                                    <option> ---- Pilih Salah Satu ---- </option>
                                    <?php
                                    $sql = mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY kode_siswa ASC");
                                    if(mysqli_num_rows($sql) != 0){
                                    while($data = mysqli_fetch_assoc($sql)){
                                    echo '<option value='.$data['kode_siswa'].'>'.$data['nama_siswa'].'</option>'; }
                                    }
                                    ?>
                                  </select>
                              </div>

                          </div>
                          <h4 class="mb"><i class="fa fa-angle-right"></i> Input Nilai</h4>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> T1</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_tugas1" id="nilai_tugas1" placeholder="Tugas1" class="form-control nilai_tugas" maxlength="3" required="required"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> T2</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_tugas2" id="nilai_tugas2" placeholder="Tugas2" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> T3</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_tugas3" id="nilai_tugas3" placeholder="Tugas3" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> T4</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_tugas4" id="nilai_tugas4" placeholder="Tugas4" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> T5</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_tugas5" id="nilai_tugas5" placeholder="Tugas5" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> T6</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_tugas6" id="nilai_tugas6" placeholder="Tugas6" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>


                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> Nilai UTS</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_uts" id="nilai_uts" placeholder="Nilai UTS" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>
                          </div>
                          <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label"> Nilai UAS</label>
                              <div class="col-sm-4">
                                  <input type="text" name="nilai_uas" id="nilai_uas" placeholder="Nilai UAS" class="form-control nilai_tugas" maxlength="3" required="required" />
                              </div>
                            </div>
                            <div class="form-group">

                                <label class="col-sm-2 col-sm-2 control-label"> Rata_Rata</label>
                                <div class="col-sm-4">
                                    <input type="text" name="rata_rata" id="rata_rata" placeholder="Rata_rata" class="form-control rata_rata"  readonly="" value="0" />
                                </div>
                            </div>
                             <div class="form-group">
                           
                         <label  class="col-sm-2 col-sm-2 control-label"> Keterangan</label>
                                 <div class="col-sm-4">                           
                          <div  id="keterangan" type="text"   name="keterangan"  placeholder="Keterangan"  placeholder="Keterangan" class=" form-control col-sm-4" readonly=""/>
                             
                   </div>
                  </div>

                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="input-nilai.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
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
    <script src="../admin/assets/js/jquery.validate.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
    $(".nilai_tugas").on('change', function () {
    var rata_tugas   = 0;
    var jumlah_tugas = $(".nilai_tugas").length;
    $(".nilai_tugas").each(function () {
      rata_tugas += parseFloat(this.value);
    });
    var rata_tugas = rata_tugas / jumlah_tugas;
    if (rata_tugas>70)
    {
    document.getElementById("keterangan").innerHTML ="TUNTAS";
    }
    else  {
    document.getElementById("keterangan").innerHTML = "TIDAK TUNTAS";
    }
$("#rata_rata").val(rata_tugas.toFixed(2));
});
</script>




</script>
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>


  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  <script type="text/javascript" src="../admin/assets/tiny_mce/tiny_mce.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
  mode : "exact",
  elements : "elm2",
  theme : "advanced",
  skin : "o2k7",
  skin_variant : "silver",
  plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

  theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
  theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,|,insertdate,inserttime,preview,|,forecolor,backcolor",
  theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
  theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
  theme_advanced_toolbar_location : "top",
  theme_advanced_toolbar_align : "left",
  theme_advanced_statusbar_location : "bottom",
  theme_advanced_resizing : true,

  template_external_list_url : "lists/template_list.js",
  external_link_list_url : "lists/link_list.js",
  external_image_list_url : "lists/image_list.js",
  media_external_list_url : "lists/media_list.js",

  template_replace_values : {
    username : "Some User",
    staffid : "991234"
  }
  });
  </script>

  </body>
</html>
