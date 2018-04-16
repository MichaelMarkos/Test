<?php

session_start();


//$NoNavbar='';

if(isset($_SESSION['UserName']))
{
	$pageTitle=' DashBoard ';
	include 'init.php';
	echo "Welcom ".$_SESSION['UserName'];
	

	include $tpl.'footer.php';
}else{


	header('Location:index.php');
	exit();
}
