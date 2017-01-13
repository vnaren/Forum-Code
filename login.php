<?php
session_start();
$uname = $_POST['uname'];
$pass = $_POST['pass'];
if($uname == "" || $pass == "") header('Location:index.php');
$loc = 'forums.php';
$con = mysqli_connect("mysql.hostinger.in","u875086678_root","password","u875086678_forum") or die('error');
$query = "select id,pass from users where uname = '".($uname)."'";
echo $query;
$res = mysqli_query($con,$query) or die('error');
if(mysqli_num_rows($res)==1)$row = mysqli_fetch_array($res);
if($row['pass']==md5($pass))
{
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['username'] = $uname;
	header('Location:'.$loc);
}
else header('Location:index.php');
?>