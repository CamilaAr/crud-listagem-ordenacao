<?php
session_start();
session_unset();
unset(
		$_SESSION['usuario']
	);

session_destroy();
echo  "<script>alert('Você finalizou a sessão!);</script>";
 header('location: /index.php');