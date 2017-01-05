<?php 
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) header('Location: index.php');
$id = $_GET['id'];
if(!isset($id)){
	header('Location: index.php');
}
switch($id){
	case 1:
		$dept = "computer science department";
		break;
	case 2:
		$dept = "mechanical engineering department";
		break;
	case 3:
		$dept = "electronics and electrical department";
		break;
	case 4:
		$dept = "electronics and communication department";
		break;
	default:
		header('Location: index.php');
}
$res=[];$row=[];
function getpost() {
	global $res,$id;
	$con = mysqli_connect("mysql.hostinger.in","u875086678_root","password","u875086678_forum") or die('error');
	$query = "select * from posts where deptid=$id";
	$res = mysqli_query($con,$query);
}
getpost();
?>
<!DOCTYPE html>
<head>
  <title><?php echo $dept ?></title>
  <link href="http://fonts.googleapis.com/css?family=Patua+One|Alegreya+SC|Open+Sans" rel="stylesheet" type="text/css">
  <style type="text/css">
   #content {
	  width: 900px;	  
	  margin: 20px auto auto auto;
	  border: 2px solid #795548;
  }
  body a{
	  text-decoration: none;
	  color: brown;
	  font-family: 'Patua One', cursive;
  }
  #menu {
	  margin: 0px;
	  padding: 0px;
	  width: inherit;
	  border-bottom: 2px solid #795548;
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
	  color: #f5deb3;
  }
  #menu li a:hover {
	  color: #cddc39;
  }
  #menu li:first-child {
	  border-right: none;
  }
  #container {
	  overflow: auto;
  }
  #list {
	  width: 698px;
	  min-height: 400px;
	  margin: auto;
	  float: right;
	  border-left: 2px solid #795548;
	  border-top: none;
  }
  #depts {
	  width: 550px;
	  margin: 40px auto 20px auto;
	  font-family: 'Open Sans', sans-serif;
	  border-spacing: 0;
  }
  #depts td a:hover {
	  color: #673ab7;
  }
  #depts th {
	  text-align: center;
	  padding: 10px;
	  border-top: 2px solid brown;
	  background-color: #009688;
	  color: white;	  
	  width: 33%;
	  height: 20px;
  }
  #depts th:first-child {
	  border-top-left-radius: 10px;
	   border-left: 2px solid brown;
  }
  #depts th:last-child {
	  border-top-right-radius: 10px;
	   border-right: 2px solid brown;
  }
  #depts td{
	  border-top: 2px solid #607D8B;	  
	  text-align: left;
	  font-family: 'Patua One', cursive;
	  padding: 10px;
  }
  #depts tr:last-child td {
	  border-bottom: 2px solid brown;
  }
  #depts tr:last-child td:first-child {
	  border-bottom-left-radius: 10px;
  }
  #depts tr:last-child td:last-child {
	  border-bottom-right-radius: 10px;
  }
  #depts tr td:first-child {	  
	  border-left: 2px solid brown;
  }
  #depts tr td:last-child {
	  border-right: 2px solid brown;
  }
  .addtopic{
	  width: 100%;
	  border: 0px;
	  background-color: blue;
	  border-radius: 5px;
	  padding: 20px;
	  color: white;
	  background-color: #3f51b5;
  }
  .none {
	  text-align: center!important;
	  padding: 30px!important;
  }
  #nav {
	  width: 200px;
	  float: right;
  }
  #nav ul li a {
	  color: #009688;
	  letter-spacing: 1px;
  }
  #nav ul {	  
	  list-style-type: none;
	  margin: 0px;padding: 0px;
	  margin-top: 80px;
  }
  #nav ul li {
	  padding: 15px 5px 15px 5px;
	  border-bottom: 2px solid #795548;
	  text-align: center;
	  background-color: #E0E0E0;
  }
  #nav ul li:first-child {
	  border-top: 2px solid #795548;
  }
  #nav ul a:hover {
	  color: #673ab7;
  }
  </style>
</head>

<body>
<div id="content">
	<ul id="menu">		
		<li><a href="logout.php">Log Out</a></li>
		<li>Welcome ! <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo 'Naren_dra'; ?></li>
	</ul>
	
		<div id="container">
			<div id="list">
				<table id="depts">
					<tr>
						<th>Topic Title</th>
						<th><a href="create.php?id=<?php echo $id; ?>" class="addtopic">ADD TOPIC</a></th>
						<th>Posted By</th>
					</tr>
					<?php
						if(mysqli_num_rows($res)==0) { 
					?>					
					<tr>
						<td colspan="3" class="none"> No Posts in this department.</td>
						
					</tr>
					<?php 
						}
					else {
						while($row=mysqli_fetch_array($res)){
							$pid = $row['pid'];
							$pby = $row['pby'];
							$ptitle = $row['ptitle'];
					?>
						<tr>
							<td colspan="2"><a href="display.php?id=<?php echo $pid; ?>"><?php echo $ptitle; ?></a></td>
							
							<td><?php echo $pby; ?></td>
						</tr>
					<?php
						}
					}
					?>
				</table>
			</div>
			
			<div id="nav">
				<ul>
					<li><a href="dept.php?id=1">Computer Science</a></li>
					<li><a href="dept.php?id=2">Mechanical</a></li>
					<li><a href="dept.php?id=3">Electrical and Electronics</a></li>
					<li><a href="dept.php?id=4">Electronics and Communications</a></li>
				</ul>
			</div>
		</div>
</div>
</body>

</html>