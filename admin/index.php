<?php
	include("../checkuser.php");
?>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>PT. Roseg Indo Properties</title>
	<link rel="stylesheet" href="../asset/css/style.css" type="text/css" media="all" />
	<script src="../asset/js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="../asset/js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="../asset/js/jquery-func.js" type="text/javascript"></script>
</head>

<body>
<div id="page" class="shell">
	<!-- Logo + Search + Navigation -->
	<div id="top">
		<div class="cl">&nbsp;</div>
		<h1 id="logo"><a href="#">Insist</a></h1>
		<form action="" method="post" id="search">
			<div class="field-holder">
				<input type="text" class="field" value="Search" title="Search" />
			</div>
			<input type="submit" class="button" value="Search"  style="margin-top:-30px;"/>
			<div class="cl">&nbsp;</div>
		</form>
		<div class="cl">&nbsp;</div>
		<div id="navigation">
			<ul>
			    <li>
			    	<a href="index.php" class="active"><span>home</span></a>
			    	
			    </li>
			    <li>
			    	<a href="#"><span>Data Divisi</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=divisi">Tambah Divisi</a></li>
			    		<li><a href="index.php?pil=view_divisi">View Divisi</a></li>
			    	</ul>
			    </li>
			    <li>
			    	<a href="#"><span>Data Pegawai</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=pegawai">Add Pegawai</a></li>
			    		<li><a href="index.php?pil=view_pegawai">View Pegawai</a></li>
			    		<li><a href="index.php?pil=laporan">Add Laporan</a></li>
			    		<li><a href="index.php?pil=view_laporan">View Laporan</a></li>
			    	</ul>
			    </li>
			    <li>
			    	<a href="#"><span>Data Absen</span></a>
			    	<ul>
                        <li><a href="index.php?pil=absen">Add Absen</a></li>
			    		<li><a href="index.php?pil=view_absen">View Absen</a></li>
			    		<li><a href="index.php?pil=lembur">Add Lembur</a></li>
			    		<li><a href="index.php?pil=view_lembur">View Lembur</a></li>
			    	</ul>
			    </li>
			    <li>
			    	<a href="#"><span>Data Pekerjaan</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=pekerjaan">Add Pekerjaan</a></li>
			    		<li><a href="index.php?pil=view_kerja">View Pekerjaan</a></li>
			    	</ul>
			    </li>
			    <li>
			    	<a href="#"><span>Data Jabatan</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=jabatan">Add Jabatan</a></li>
			    		<li><a href="index.php?pil=view_jab">View Jabatan</a></li>
			    	</ul>
			    </li>
			    
                <li>
			    	<a href="#"><span>Hitung Gaji</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=gaji">Hitung Gaji</a></li>
			    		<li><a href="index.php?pil=view_gaji">View Gaji</a></li>
                        <li><a href="index.php?pil=slip_gaji">Cetak Slip gaji</a></li>
			    	</ul>
			    </li>
                <li>
			    	<a href="#"><span>Laporan</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=cetak_peg">Biodata Pegawai</a></li>
			    		<li><a href="index.php?pil=rekap_peg">Rekap Pegawai</a></li>
                        <li><a href="index.php?pil=cetak_rekap_gaji">Rekap Gaji</a></li>
                        <li><a href="index.php?pil=rekapgajikaryawan">Rekap Gaji Per Karyawan</a></li>
                        <li><a href="index.php?pil=rekapgajidivisi">Rekap Gaji Per Divisi</a></li>
			    	</ul>
			    </li>
                <li>
                <a href="#"><span>Data User</span></a>
			    	<ul>
			    		<li><a href="index.php?pil=user">Add User</a></li>
                        <li><a href="index.php?pil=view_user">View User</a></li>
			    	    <li><a href="../logout_proses.php">Logout</a></li>
                        </ul>
                        </li>
            
		</div>	
	</div>
	<!-- END Logo + Search + Navigation -->
     <!-- Header -->
	<div id="header">
    <?php if(isset($_GET['pil'])){
				    	$pil=$_GET['pil'];
					}else{
						$pil="";	
				    		}
			if ($pil==""){
							?>
		<!-- Slider -->
		<div id="slider">
			<div id="slider-holder">
				<ul>
                	<li>
				    	<div class="slide-si">
				    		<h2 class="si"></h2>
				    </li>
				    <li>
				    	<div class="slide-si">
				    		<h2 class="evt1"></h2>
				    </li>
                    <li>
				    	<div class="slide-si">
				    		<h2 class="evt2"></h2>
				    </li>
                    <li>
				    	<div class="slide-si">
				    		<h2 class="evt3"></h2>
				    </li>
                    <li>
				    	<div class="slide-si">
				    		<h2 class="evt4"></h2>
				    </li>
                    <li>
				    	<div class="slide-si">
				    		<h2 class="evt5"></h2>
				    </li>
				</ul>
			</div>
			<div class="slider-nav">
				<a href="#" class="prev">Previous</a>
				<a href="#" class="next">Next</a>
			</div>
		</div>
		<!-- END Slider -->	
           <?php }?>
	</div>
	<!-- END Header -->
    <!-- Main -->
	<div id="main">
        <!-- Two Column Content -->
		<div class="cols two-cols">
			<div class="cl">&nbsp;</div>
		 <div class="col" style="margin-left:100px; width:800px; font-size:13px;">
				<div style="display:none;">
                  <?php 
				   if(isset($_SESSION['user'])){
					 echo "Email :".$_SESSION['user']."";
					 }
				  ?>
				  </div>
				<?php
			  	 if(isset($_GET['pil'])){
				    	$pil=$_GET['pil'];
					}else{
						$pil="";	
				    		}
				 
				 if($pil=="divisi") {
					 include 'formDivisi.php';
					 }
				 if($pil=="view_divisi") {
					 include 'viewDivisi.php';
					 } 
			     if($pil=="edit_divisi"){
			     	include 'editDivisi.php';
			     }	
			     if($pil=="pegawai") {
					 include("formPegawai.php");
					 } 	 
				 if($pil=="view_pegawai") {
					 include("viewPegawai.php");
					 } 
				 if($pil=="edit_pegawai") {
					 include("editPegawai.php");
					  }	
			     if($pil=="absen") {
					 include("formabsen.php");
					 } 	 
				 if($pil=="view_absen") {
					 include("viewabsen.php");
					  } 
				 if($pil=="edit_absen") {
					 include("editAbsen.php");
					 } 
				 if($pil=="edit_pegawai") {
					 include("editPegawai.php");
					 }
				 if($pil=="lembur") {
					 include("formLembur.php");
					 } 	 
				 if($pil=="view_lembur") {
					 include("viewLembur.php");
					 } 
				 if($pil=="edit_lembur") {
					 include("editLembur.php");
					 }	 
			     if($pil=="laporan") {
					 include("formLaporan.php");
					 } 	 
				 if($pil=="view_laporan") {
					 include("viewLaporan.php");
					 } 
				 if($pil=="edit_laporan") {
					 include("editLaporan.php");
					 }
				 if($pil=="pekerjaan") {
					 include("formPekerjaan.php");
					 } 	 
				 if($pil=="view_kerja") {
					 include("viewKerja.php");
					 } 
				 if($pil=="edit_pekerjaan") {
					 include("editPekerjaan.php");
					 }	
				 if($pil=="jabatan") {
					 include("formJab.php");
					 } 	 
				 if($pil=="view_jab") {
					 include("viewJab.php");
					 } 
				 if($pil=="edit_jab") {
					 include("editJab.php");
					 }
				 if($pil=="gaji") {
					 include("formGaji.php");
					 } 	 
				 if($pil=="view_gaji") {
					 include("viewGaji.php");
					 } 	 
				 if($pil=="slip_gaji") {
					 include("SlipGajiPerKaryawan.php");
					 } 
				 if($pil=="hasil_hitung_gaji") {
					 include("hasilHitungGaji.php");
					 }
				 if($pil=="cetak_peg") {
					 include("formDataPeg.php");
					 }	
				 
				 if($pil=="rekap_peg") {
					 include("formRekapPeg.php");
					 }
				 
				 if($pil=="cetak_rekap_gaji") {
					 include("rekapGajiPerBulan.php");
					 }
				
				 if($pil=="rekapgajikaryawan") {
					 include("rekapGajiPerKaryawan.php");
					 }	
				 if($pil=="rekapgajidivisi") {
					 include("rekapGajiPerDivisi.php");
					}	
			     if($pil=="user") {
					 include("formUser.php");
					 } 	 
				 if($pil=="view_user") {
					 include("viewUser.php");
					 } 
				 if($pil=="edit_user") {
					 include("editUser.php");
					  }	
				  if($pil=="") {	 		   	 	  		 	 	
				   	 		 	 	
				?>	
                <h2>SELAMAT DATANG</h2>
                <p>&nbsp;</p>
				<p align="justify">Sistem informasi ini digunakan untuk mempermudah divisi keuangan/accounting dalam memproses / menghitung gaji seluruh pegawai, serta mempermudah dalam membuat laporan gaji per pegawai, per bulan, dan per divisi.</p>
                <p align="justify">Selain itu sistem informasi ini juga mempermudah direktur untuk mengecek laporan pekerjaan mingguan para pegawai, mencetak biodata pegawai, rekap semua data pegawai, laporan gaji perpegawai, laporan gaji perdivisi, laporan gaji bulanan.</p>
                <p align="justify">Selain itu sistem ini juga di peruntukkan bagi divisi lain, supaya mempermudah para pegawai untuk mengirimkan laporan pekerjaan mingguan, menginputkan data data lembur bagi pegawai yang lembur.</p>
				<?php }
				?>
                
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- END Two Column Content -->
        
	</div>
	<!-- END Main -->
	<!-- Footer -->
	<div id="footer">
		<p class="left">&copy; 2015 - PT.Roseg Indo Properties&nbsp; </p>
		<p class="right">Design by : <a href="http://facebook.com/thefaqih" target="_blank">Muhammad Fakih</p>
		<div class="cl">&nbsp;</div>
	</div>
	<!-- END Footer -->
	<br />
</div>
</body>
</html>