<?php

     session_start();
     if(!isset($_SESSION['user'])){
		 echo '<script language="javascript">alert("Acces is Denied !!!");location.replace("../index.php"); </script>';
	 
	 }	
?>
