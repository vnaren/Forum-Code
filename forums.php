<?php
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) header('Location: index.php');
?>
<!DOCTYPE html>
<head>
  <title>Departments</title>
  <link href="http://fonts.googleapis.com/css?family=Patua+One|Alegreya+SC|Open+SansSail" rel="stylesheet" type="text/css">
  <style type="text/css">
  #content {
	  width: 900px;
	  min-height: 600px;
	  margin: 20px auto auto auto;
	  border: 1px solid black;
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
	  color: #f5deb3;
  }
  #menu li a:hover {
	  color: #cddc39;
  }
  #menu li:first-child {
	  border-right: none;
  }
  #list {
	  width: 500px;
	  margin: 80px auto auto auto;
  }
  #depts {
	  width: 500px;
	  font-family: 'Open Sans', sans-serif;
	  border-spacing: 0;
  }
  #depts a:hover {
	  color: #673ab7;
  }
  #depts th {
	  text-align: center;
	  padding: 10px;
	  border-top: 2px solid brown;
	  background-color: #009688;
	  color: white;
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
	  border-top: 1px solid black;	  
	  text-align: center;
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
	  text-align: left;
	  padding: 10px;
	  border-left: 2px solid brown;
  }
  #depts tr td:last-child {
	  border-right: 2px solid brown;
  }
  </style>
</head>

<body>

<div id="content">
	<ul id="menu">		
		<li><a href="logout.php">Log Out</a></li>
		<li>Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo 'Naren_dra'; ?></li>
	</ul>
	
	<div id="list">
		<table id="depts">
			<tr>
				<th>Department</th>
				<th>Posts</th>
			</tr>
			<tr>
				<td><a href="dept.php?id=1">Computer Science and Engineering</a></td>
				<td>2</td>
			</tr>
			<tr>
				<td><a href="dept.php?id=2">Mechanical Engineering</a></td>
				<td>3</td>
			</tr>
			<tr>
				<td><a href="dept.php?id=3">Electrical and Electronics Engineering</a></td>
				<td>1</td>
			</tr>
			<tr>
				<td><a href="dept.php?id=4">Electronics and Communication Engineering</a></td>
				<td>0</td>
			</tr>
		</table>
	</div>
</div>
</body>

</html>