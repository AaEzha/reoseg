<?php 
	$koneksiDB = mysql_connect('localhost','root','');
	
	if(!$koneksiDB){
		die('Koneksi Ke Database Gagal'.mysql_error());
	}
		mysql_select_db('dbkepegawaian') or die('Koneksi Ke Database Tidak Ada');
?>