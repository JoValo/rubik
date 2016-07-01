<?php
//Este apartado sirve para romper las sesiones 
	session_start();
	session_destroy();
	header("location:index.php");
?>