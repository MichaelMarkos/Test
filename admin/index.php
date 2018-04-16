 <?php


session_start();
$NoNavbar='';
$pageTitle=' Login ';
//print_r($_SESSION);
if(isset($_SESSION['UserName']))
{
		header('Location:dashboard.php'); //redirect To dashboard


}

include 'init.php';


//check if user coming from Http Request
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$UserName=$_POST['user'];
	$Password=$_POST['pass'];
	$hashedPass=sha1($Password);

	//check if the User Exist in database

	$stmt=$con->prepare("SELECT UserId,UserName,Password FROM users WHERE UserName = ? AND Password=? AND GroupID=1 LIMIT 1  ");
	$stmt->execute(array($UserName,$hashedPass));
  $row=$stmt->fetch();
	$count=$stmt->rowCount();

	//echo $count;

	//If count >0   You are recorde in database "Admin"

	if($count>0){

  	$_SESSION['UserName']=$UserName;  // register session name
    $_SESSION['ID']=$row['UserId'];   // register session Id
		header('Location:dashboard.php'); //redirect To dashboard
		exit();

	}


}

?>




<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<h4 class="text-center">Admin Login </h4>
	<input class="form-control input-lg" type="text" name="user" placeholder="User Name" autocomplete="off" />
	<input class="form-control input-lg" type="password" name="pass" placeholder="Password" autocomplete="New-password" />
	<input class="btn btn-primary btn-block" type="submit" value="Login">
</form>

<?php include $tpl . 'footer.php'; ?>
