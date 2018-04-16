<?php


$dsn='mysql:host=127.0.0.1;dbname=shop';

$user='root';
$pass='';
$option=array(

	PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',

	);


	try{

		$con=new PDO($dsn,$user,$pass,$option);
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "You are connect welcome To database";
	}

	catch(PDOException $e)
	{

		echo 'Faild To connect'.$e->getMessage();

	}
