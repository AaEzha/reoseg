<?php 
	include '../fungsiabsen.php';
  $q = mysql_query("select * from tbabsen where tanggal='$_GET[tgl]' and jenis='Datang' order by kode_absen asc");
?>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
<div class="form-header-group" style="width:700px; margin-left:20px;">
      <h2 class="form-header" style="float:left;">Data absen Pegawai</h2>
      <img src="../asset/images/absen.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Tanggal <?php echo date('d F Y', strtotime($_GET['tgl']));?></div>
      
  </div>
<table width="720" border="0" class="vtable" style="margin-left:20px;">
  <tr>
    <th width="30" align="center">No</th>
    <th width="90" align="center">NIP</th>
    <th width="190" align="center">Nama</th>
    <th width="215" align="center">Jam Datang</th>
    <th width="215" align="center">Jam Pulang</th>
    <th width="140" align="center">Jumlah Telat</th>
  </tr>
  <?php $i=1; while($d = mysql_fetch_array($q)){ ?>
  <?php $qq = mysql_query("select jam from tbabsen where tanggal='$_GET[tgl]' and jenis='Pulang' and nip='$d[nip]'"); ?>
  <?php $dd = mysql_fetch_array($qq); ?>
  <tr>
    <th align="center"><?=$i++;?></th>
    <th align="center"><?=$d['nip'];?></th>
    <th align="center"><?=namapeg($d['nip']);?></th>
    <th align="center"><?=$d['jam'];?></th>
    <th align="center"><?=$dd['jam'];?></th>
    <th align="center"><?=$d['telat'];?> Jam</th>
  </tr>
  <?php } ?>
</table>