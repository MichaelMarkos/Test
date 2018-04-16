<?php

 function lang($phrase){

//Home Page
static $lang=array(
	'Home_Admin' =>'Home' ,
	'categ'   =>'Categories',
'Name_Admin'=>'Michael',
'log'=>'LOGS',
'item'=>'Items',
'prod'=>'Products',
'mem'=>'Members'
	);

return $lang[$phrase];

 }
