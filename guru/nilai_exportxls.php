<?php
include("../conn.php");
 session_start();
if(empty($_SESSION)){
	header("Location: ../index.php");
}  
?>

 
			<?php
		 			 
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=nilai_exportxls.xls");
 
// Tampilkan isi table
			# fungsi ubah tanggal 
						/** function rubah_tanggal($tgl)
						 {
						 $exp = explode('-',$tgl);
						 if(count($exp) == 3)
						 {
						 $tgl = $exp[2].'-'.$exp[1].'-'.$exp[0];
						 }
						 return $tgl;
						 }
			 $plantname = $_GET['toxls'];
			 $date1	= rubah_tanggal($_GET['date1']);
			 $date2	= rubah_tanggal($_GET['date2']);**/
							 
			$sqlshow = mysqli_query($koneksi,"SELECT * FROM nilai ORDER BY id
																  
												"); 
											//	$sql = mysqli_query($koneksi, "SELECT * FROM t_inventoryitems WHERE f_partcode='$id'");
		
			?>
	  
 
	<h3>Data Nilai Siswa</H>
	 
	<br>  
	<!-- <table>
	
			<tr>
			 <td width="0px">Plant :</td>  <td><?php //echo $plantname ?></td> 
			 <td width="0px">From : <?php //echo date("d-m-Y",strtotime($_GET['date1'])) ?></td>  
			 <td width="0px">Until : <?php //echo date("d-m-Y",strtotime($_GET['date2'])) ?></td> 
			 
		 </tr>
	</table>-->	
    <table>
	
			<tr>
			
			 <td width="0px">Tanggal : <?php echo date("d-m-Y") ?></td>  
			 
			 
		 </tr>
	</table>	
		 
		<table bordered="1">  
			<thead bgcolor="eeeeee" align="center">
			<tr bgcolor="eeeeee" >
	  
			 <th class="text-center">Id</th>
			   <th>Semester</th>
			   <th>Kode Pelajaran</th>
			   <th class="text-right">Kode Guru </th>
               <th>Kode Kelas</th>
               <th>Kode Siswa</th>
               <th>Tugas1</th>
               <th>Tugas2</th>
               <th>Tugas3</th>
               <th>Tugas4</th>
               <th>Tugas5</th>
               <th>Tugas6</th>
               <th>UTS</th>
               <th>UAS</th>
               <th width="50">Keterangan</th>
             
			  </tr>
			</thead>
			<tbody>
	 	
					
		</tbody>

		</div>
    </div>
</div>
   <?php
						
						//if (isset($_POST['show'])) {
							$rowshow = mysqli_fetch_assoc($sqlshow);
							  
								//$nomor=0;
							while($rowshow = mysqli_fetch_assoc($sqlshow)){					 
                                 //$nomor++;
								echo '<tr>';
								echo '<td>'.$rowshow['id'].'</td>';
								echo '<td>'.$rowshow['semester'].'</td>';
								//echo '<td>'.$rowshow['f_partname'].'/'.$rowshow['f_model'].'/'.$rowshow['f_maker'].'</td>';
                                echo '<td>'.$rowshow['kode_pelajaran'].'</td>';
                                echo '<td>'.$rowshow['kode_guru'].'</td>';
                                echo '<td>'.$rowshow['kode_kelas'].'</td>';
                                echo '<td>'.$rowshow['kode_siswa'].'</td>';
								echo '<td>'.$rowshow['nilai_tugas1'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas2'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas3'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas4'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas5'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas6'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas7'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas8'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas9'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas10'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas11'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas12'].'</td>';
                                echo '<td>'.$rowshow['nilai_tugas13'].'</td>';
                                echo '<td>'.$rowshow['nilai_uts'].'</td>';
                                echo '<td>'.$rowshow['nilai_uas'].'</td>';
                                echo '<td>'.$rowshow['keterangan'].'</td>';
								echo '</tr>';
							}
						 
								 
							
					//	}			//EOF IF				
					 ?>
  </table>   
 
   