<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rekap Gaji Per Bulan</title>
<link rel="stylesheet" href="asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php
	include 'koneksi.php';
	$bln = $_POST['bulan'];
	$thn = $_POST['tahun'];
	
	$sql="SELECT	tbgaji.kode_gaji,tbpegawai.nip,tbpegawai.nama_pegawai,tbgaji.gaji_pokok,tbgaji.insentive,tbgaji.tunjangan,tbgaji.pph,tbgaji.gaji_bersih,tbgaji.tgl_hitung_gaji,
						MONTHNAME(tbgaji.tgl_hitung_gaji) AS bulan, YEAR(tbgaji.tgl_hitung_gaji) AS tahun
						FROM tbpegawai,tbgaji
						WHERE tbgaji.nip = tbpegawai.nip AND tbgaji.bulan = '$bln' AND tbgaji.tahun = '$thn'";
	$hasil = mysql_query($sql);	

	
?>
<body>

<table width="100" height="481" border="0" align="center">
<tr>
     <td><table width="789" border="0" class="form-all" style="font-size:14px;">
       <tr>
         <td colspan="2" rowspan="5"><div align="center"><img src="asset/images/logo_insist.gif" alt="" width="101" height="100"></div></td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td style="color:#0a3c59;"><div align="center">PT. ROSEG INDO PROPERTIES</div></td>
       </tr>
       <tr>
         <td style="color:#0a3c59;"><div align="center">Jl. Ir.H. Juanda No.12 Tangerang Selatan 15322 </div></td>
       </tr>
       <tr>
         <td style="color:#0a3c59;"><div align="center">Office : (+6221) - 29067232 / 242 Email : <a style="color:#25A6E1" href="mailto:info@rosegindo.co.id">info@rosegindo.co.id</a></div></td>
       </tr>
       <tr>
         <td style="color:#0a3c59;"><div align="center"></div></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3"><div align="center"><img src="asset/images/garis.png" alt="" width="100%" height="4" /></div></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3" style="color:#25A6E1;">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3" style="color:#25A6E1;"><div align="center"><strong>REKAP </strong></div></td>
       </tr>
       <tr>
         <td colspan="3" style="color:#25A6E1;"><div align="center"><strong>GAJI PEGAWAI </strong> <strong>PER BULAN</strong></div></td>
       </tr>
       <tr>
         <td colspan="3" style="color:#25A6E1;"><div align="center"></div></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td width="59" style="color:#0a3c59;"><strong>Bulan</strong></td>
         <td width="18"><div align="center">:</div></td>
         <td style="color:#25A6E1;"><?php echo $bln ?></td>
        </tr>
       <tr>
         <td style="color:#0a3c59;"><strong>Tahun</strong></td>
         <td><div align="center">:</div></td>
         <td style="color:#25A6E1;"><?php echo $thn?></td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
         <td colspan="3">&nbsp;</td>
       </tr>
     </table>
     <div class="CSSTableGenerator">
       <table width="100" border="0">
         <tr align="center">
           <td>No. Slip</td>
           <td>NIP</td>
           <td>Nama Pegawai</td>
           <td>Gaji Pokok (Rp)</td>
           <td>Insentive (Rp)</td>
           <td>Tunjangan (Rp)</td>
           <td>Pph (10%) (Rp)</td>
           <td>Gaji Bersih (Rp)</td>
           <td>Tanggal Hitung</td>
         </tr>
         <?php 
  	while ($row = mysql_fetch_row($hasil)){?>
         <tr>
           <td align="center"><?php echo $row[0] ?></td>
           <td align="center"><?php echo $row[1] ?></td>
           <td><?php echo $row[2] ?></td>
           <td align="center"><?php echo $row[3] ?></td>
           <td align="center"><?php echo $row[4] ?></td>
           <td align="center"><?php echo $row[5] ?></td>
           <td align="center"><?php echo $row[6] ?></td>
           <td align="center"><?php echo $row[7] ?></td>
           <td align="center"><?php echo $row[8] ?></td>
         </tr>
         <?php } ?>
       </table>
       </div>
       </td>
       </tr>     
</table>


</body>
</html>