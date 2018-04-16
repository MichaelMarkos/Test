<?php

//$action=isset($_GET['action']) ? $_GET['action']  : 'Add';
$action='';
if(isset($_GET['action']))
{
  $action = $_GET['action'];
}else {
  $action = "Manage";
}


if($action == 'Manage')
  {
    echo "You Are Now In Manage Page ,Welcoome here <br> <a href='?action=Add'>To Go To Add Page</a>";
  }
elseif ($action ==  'Insert')
  {echo "You Are Now In Insert Page ,Welcoome here ";}
elseif ($action ==  'Add')
  {echo "You Are Now In Add Page , Welcoome here ";}
