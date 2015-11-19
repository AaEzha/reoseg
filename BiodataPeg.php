<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biodata Pegawai</title>
<link rel="stylesheet" href="asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include 'koneksi.php';
	$nip = $_POST['nip'];
	$sql = mysql_query("SELECT tbpegawai.nip, tbpegawai.nama_pegawai,tbdivisi.nama_divisi,tbjabatan.nama_jab,tbpegawai.tempat_lahir,tbpegawai.tgl_lahir, tbpegawai.jk,tbpegawai.agama,tbpegawai.status_pernikahan,
				tbpegawai.alamat,tbpegawai.hp,tbpegawai.no_telp,tbpegawai.email,tbpegawai.facebook,tbpegawai.website,tbpegawai.photo,tbpegawai.tgl_mulai_kerja,tbpegawai.pendidikan_terakhir,
				tbpekerjaan.pekerjaan,tbpegawai.gaji_pokok,tbjabatan.tunj_jab			
				FROM tbpegawai,tbdivisi,tbjabatan,tbpekerjaan
				WHERE tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan AND tbpekerjaan.kode_divisi = tbdivisi.kode_divisi
				AND tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.nip = '$nip'");
	$hasil = mysql_fetch_array($sql);
?>
<body>
<table width="100" height="516" border="0" align="center" style="animation:ease-in;">
  <tr>
    <td><table width="789" border="0" class="form-all" style="font-size:14px;">
      <tr>
        <td colspan="2" rowspan="5"><div align="center"><img src="asset/images/logo_insist.gif" alt="" width="101" height="100"></div></td>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" style="color:#0a3c59;"><div align="center">PT. Roseg Indo Properties</div></td>
      </tr>
      <tr>
        <td colspan="5" style="color:#0a3c59;"><div align="center">Jl. Ir. H. Juanda No.12 Ciputat - Tangerang Selatan - Banten 15322 </div></td>
      </tr>
      <tr>
        <td colspan="5" style="color:#0a3c59;"><div align="center">Office : (+6221) - 29067232 / 242 Email : <a style="color:#25A6E1" href="mailto:info@roseg.co.id">info@roseg.co.id</a></div></td>
      </tr>
      <tr>
        <td colspan="5" style="color:#0a3c59;"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7"><div align="center"><img src="asset/images/garis.png" alt="" width="100%" height="4" /></div></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" style="color:#25A6E1;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" style="color:#25A6E1;"><div align="center"><strong>Biodata Pegawai</strong></div></td>
      </tr>
      <tr>
        <td colspan="7" style="color:#25A6E1;"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td width="77" style="color:#0a3c59;"><strong>Divisi</strong></td>
        <td width="23"><div align="center">:</div></td>
        <td width="217" style="color:#25A6E1;"><?php echo $hasil['nama_divisi']?></td>
        <td width="188" colspan="-3" style="color:#0a3c59;"><div align="right"><strong>Pekerjaan</strong></div></td>
        <td width="16" colspan="-3"><div align="center">:</div></td>
        <td width="242" colspan="-2" align="left" style="color:#25A6E1;"><?php echo $hasil['pekerjaan']?></td>
      </tr>
      <tr>
        <td style="color:#0a3c59;"><strong>Jabatan</strong></td>
        <td><div align="center">:</div></td>
        <td colspan="5" style="color:#25A6E1;"><?php echo $hasil['nama_jab']?></td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7">&nbsp;</td>
      </tr>
    </table>
      <table width="793" border="0" class="form-all" style="font-size:14">
        <tr>
          <td colspan="4" style="color:#25A6E1;"><strong> Data Pribadi</strong></td>
          <td width="170">&nbsp;</td>
          <td width="33" rowspan="14">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
          <td width="170">&nbsp;</td>
        </tr>
        <tr>
          <td width="26">&nbsp;</td>
          <td width="245">NIP</td>
          <td width="29"><div align="center">:</div></td>
          <td width="264"><?php echo $hasil['nip']?></td>
          <td width="170" rowspan="10"><div align="center" style="border:groove; border-radius:0px; border-color:#25A6E1;"><img src="asset/images/<?php echo $hasil['photo']?>" alt="" width="100" height="175"/></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Nama Pegawai</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['nama_pegawai']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tempat Lahir</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['tempat_lahir']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tanggal Lahir</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['tgl_lahir']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Jenis Kelamin</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['jk']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Agama</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['agama']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Status</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['status_pernikahan']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Alamat</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['alamat']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Pendidikan Terakhir</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['pendidikan_terakhir']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tanggal Mulai Kerja</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['tgl_mulai_kerja']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Gaji Pokok</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['gaji_pokok']?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Tunjangan Jabatan</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['tunj_jab']?></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="791" border="0" class="form-all" style="font-size:14px">
        <tr>
          <td colspan="5" style="color:#25A6E1;"><strong>Data Kontak</strong></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" rowspan="5">&nbsp;</td>
          <td width="257">Email</td>
          <td width="21"><div align="center">:</div></td>
          <td width="475"><?php echo $hasil['email']?></td>
        </tr>
        <tr>
          <td>No. HP</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['hp']?></td>
        </tr>
        <tr>
          <td>No.Telp</td>
          <td><div align="center">: </div></td>
          <td><?php echo $hasil['no_telp']?></td>
        </tr>
        <tr>
          <td>Facebook</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['facebook']?></td>
        </tr>
        <tr>
          <td>Website</td>
          <td><div align="center">:</div></td>
          <td><?php echo $hasil['website']?></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
 <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>