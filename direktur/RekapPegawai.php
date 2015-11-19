<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rekap Data Pegawai</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php
	include '../koneksi.php';
	$div = $_POST['divisi'];
	$pegawai = mysql_query("SELECT tbpegawai.nip, tbpegawai.nama_pegawai,tbjabatan.nama_jab,tbpegawai.tempat_lahir,tbpegawai.tgl_lahir, tbpegawai.jk,tbpegawai.agama,tbpegawai.status_pernikahan,
tbpegawai.alamat,tbpegawai.hp,tbpegawai.email,tbpegawai.tgl_mulai_kerja,tbpegawai.pendidikan_terakhir			
FROM tbpegawai,tbdivisi,tbjabatan,tbpekerjaan
WHERE tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan AND tbpekerjaan.kode_divisi = tbdivisi.kode_divisi
AND tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpekerjaan.kode_divisi = '$div'");
	
	$div = mysql_query("select nama_divisi from tbdivisi where kode_divisi='$div'");
	$nama_div = mysql_fetch_row($div);

?>
<body>

<table width="100" height="442" border="0" align="center">
    <tr>
    <td><table width="1009" border="0" class="form-all" style="font-size:14px;">
      <tr>
        <td colspan="2" rowspan="5"><div align="center"><img src="../asset/images/logo_insist.gif" alt="" width="101" height="100"></div></td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" style="color:#0a3c59;"><div align="center">PT. ROSEG INDO PROPERTIES</div></td>
      </tr>
      <tr>
        <td colspan="2" style="color:#0a3c59;"><div align="center">Jl. Ir. H. Juanda No.12 Ciputat, Tangerang Selatan Banten 15322 </div></td>
      </tr>
      <tr>
        <td colspan="2" style="color:#0a3c59;"><div align="center">Office : (+6221) - 29067232 / 242 Email : <a style="color:#25A6E1" href="mailto:info@roseg.co.id">info@rosegindo.co.id</a></div></td>
      </tr>
      <tr>
        <td colspan="2" style="color:#0a3c59;"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4"><div align="center"><img src="../asset/images/garis.png" alt="" width="100%" height="4" /></div></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" style="color:#25A6E1;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" style="color:#25A6E1;"><div align="center"><strong>REKAP </strong>PEGAWAI</div></td>
      </tr>
      <tr>
        <td colspan="4" style="color:#25A6E1;"><div align="center"><strong>PER DIVISI</strong></div></td>
      </tr>
      <tr>
        <td colspan="4" style="color:#25A6E1;"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td width="59" style="color:#0a3c59;"><strong>Divisi</strong></td>
        <td width="18"><div align="center">:</div></td>
        <td style="color:#25A6E1;"><?php echo $nama_div[0] ?></td>
        </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
  </table>
      <table width="1010" border="1" class="form-all">
        <tr>
          <th style="color:#0a3c59;">No</th>
          <th style="color:#0a3c59;">NIP</th>
          <th style="color:#0a3c59;">Nama Pegawai</th>
          <th style="color:#0a3c59;">Jabatan</th>
          <th style="color:#0a3c59;">Tempat Lahir</th>
          <th style="color:#0a3c59;">Tanggal Lahir</th>
          <th style="color:#0a3c59;">Jenis Kelamin</th>
          <th style="color:#0a3c59;">Agama</th>
          <th style="color:#0a3c59;">Status</th>
          <th style="color:#0a3c59;">No.Hp</th>
          <th style="color:#0a3c59;">Email</th>
          <th style="color:#0a3c59;">Mulai Kerja</th>
          <th style="color:#0a3c59;">Pendidikan Terakhir</th>
        </tr>
        <?php 
	$no = 0;  
  	while ($v=mysql_fetch_array($pegawai)){
  	$no++;	
  ?>
        <tr>
          <td><?php echo $no?></td>
          <td><?php echo $v['nip']?></td>
          <td><?php echo $v['nama_pegawai']?></td>
          <td><?php echo $v['nama_jab']?></td>
          <td><?php echo $v['tempat_lahir']?></td>
          <td><?php echo $v['tgl_lahir']?></td>
          <td><?php echo $v['jk']?></td>
          <td><?php echo $v['agama']?></td>
          <td><?php echo $v['status_pernikahan']?></td>
          <td><?php echo $v['hp']?></td>
          <td><?php echo $v['email']?></td>
          <td><?php echo $v['tgl_mulai_kerja']?></td>
          <td><?php echo $v['pendidikan_terakhir']?></td>
        </tr>
        <?php }?>
      </table>
  
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>