<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['username'])) header('Location: forums.php');
?>

<!DOCTYPE html>
<head>
<title>Forum Home page</title>
<style type="text/css">
body {
	font-family: 'Verdana';
}
body span {
	color: red;
	font-weight: bold;
}
#info {
	border: 1px solid black;
	margin: 20px auto auto auto;
	width: 300px;
	padding: 10px;
	text-align: center;
	font-size: 10px;
}
#login_form {
	border: 1px solid black;
	border-radius: 5px;
	margin: 20px auto auto auto;
	width: 300px;
	padding: 10px;
}
table tr td {
	padding-top: 7px;
}
table input[type="text"],input[type="password"] {
	height: 20px;
}
input[type="submit"]{
	background-color: #e7e7e7; 
    border: none;
    color: black;
    padding: 15px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left: auto;
	margin-right: auto;
}
</style>
</head>
<body>

<div id="info">Login with username:<span>ravi</span>   and password:<span>ravi</span></div><!-- trying for git conflict -->

<div id="login_form">
<form method="post" action="login.php">
	<table>
	<tr><td>Username:</td><td><input type="text" name="uname" /></td></tr>
	<tr><td>Password:</td><td><input type="password" name="pass" /></td></tr>
	<tr><td colspan="2" style="padding-top: 10px; text-align: center;"><input type="submit" name="submit" value="submit" /></td></tr>
	</table>
</form>
</div>
</body>

</html>