<?php



include 'connect.php';
//routs

$tpl ='include/temp/'; //Templete Directory
$css ='layout/css/';   //Css Directory
$js  ='layout/js/';		//JS Directory
$lang='include/language/';//lan Directory
$func='Include/function/';




//Include The Important Files
include $func.'function.php';
include $lang.'english.php';
include $tpl.'header.php';

//Include Navebar On All Pages Expect The one With $navbar Variable


if(!isset($NoNavbar))
{
  Include $tpl.'navbar.php';

}
