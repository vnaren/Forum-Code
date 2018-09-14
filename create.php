<?php
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) header('Location: index.php');
/*$actual_link = $_SERVER['HTTP_REFERER'];
$qs = parse_url($actual_link,PHP_URL_QUERY);
parse_str($qs,$params);
$dept = $params['id'];*/
$dept = $_GET['id'];
if(isset($_POST['submit'])){
	global $dept;
	$loc = 'dept.php?id='.$dept;
	$pby = $_SESSION['username'];
	$ptitle = addslashes($_POST['title']);
	$pcontent = addslashes($_POST['content']);
	$con = mysqli_connect("mysql.hostinger.in","u875086678_root","password","u875086678_forum") or die('error');
	$query = "insert into posts(pby,ptitle,pcontent,deptid) values('$pby','$ptitle','$pcontent',$dept)";
	//echo $query;
	$res = mysqli_query($con,$query);
	if($res){
		header('Location:'.$loc);
	}
	else echo 'failed to add post';
}
?>

<!DOCTYPE html>
<head>
<title>Forum Home page</title>
<link href="http://fonts.googleapis.com/css?family=Patua+One|Alegreya+SC|Open+SansSail" rel="stylesheet" type="text/css">
<!-- Added a comment -->
<style type="text/css">
	#content {
	  width: 900px;
	  min-height: 600px;
	  margin: 20px auto auto auto;
	  border: 1px solid black;
	}

	#menu {
	  margin: 0px;
	  padding: 0px;
	  width: inherit;
	  border-bottom: 1px solid black;
	  overflow: hidden;
	  background-color: #a52a2a;
	}
	#menu li {
	  float:right;
	  border-right: 1px solid white;
	  list-style-type: none;
	  padding: 10px 15px 10px;
	  font-size: 18px;
	  color: white;
	  font-family: 'Patua One', cursive;
	}
	#menu li a {
	  text-decoration: none;
	  color: #f5deb3;
	}
	#menu li a:hover {
	  color: #cddc39;
	}
	#menu li:first-child {
	  border-right: none;
	}
	#create_post {
		border: 1px solid black;
		border: 2px solid brown;
		border-radius: 5px;
		margin: 50px auto auto auto;
		font-family: 'Patua One', cursive;
		width: 500px;
		padding: 10px;
	}
	#create_table td {
		vertical-align: top;
		padding-top: 20px;
		padding-left: 20px;
	}
	input[type="text"],textarea {
		border: 2px solid #009688;
	}
	input[type="submit"]{
		border: none;
		padding: 5px;
		font-family: 'Alegreya SC';
		font-size: 18px;
		background-color: #009688;
		color: white;
		border-radius: 5px;
	}
</style>
</head>
<body>
<div id="content">
	<ul id="menu">		
		<li><a href="logout.php">Log Out</a></li>
		<li>Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo 'Naren_dra'; ?></li>
	</ul>
	
		<div id="create_post">
		 <form method="post" action="<?php echo 'create.php?id='.$dept; ?>">
			<table id="create_table">
				<tr><td>Title:</td><td><input type="text" length="40" id="title" name="title" /></td></tr>
				<tr><td>Content:</td><td><textarea rows="10" cols="50" name="content"></textarea></td></tr>
				<tr><td></td><td><input type="submit" name="submit" value="ADD NEW TOPIC" /></td></tr>
			</table>
		  </form>
		</div>
</div>
</body>

</html>