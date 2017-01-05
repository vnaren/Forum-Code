<?php
session_start();
if(!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) header('Location: index.php');
 $row=[];$comments=[];
 $pid = $_GET['id'];
 $pby = $_SESSION['username'];
 $res;
 $con = mysqli_connect("mysql.hostinger.in","u875086678_root","password","u875086678_forum") or die('error');
 function getpost() {
	global $con,$pid;
	$query = "select ptitle,pcontent from posts where pid = $pid";
	$res = mysqli_query($con,$query) or die('error querying database');
	if(mysqli_num_rows($res)==1) {
		global $row;
		$row = mysqli_fetch_array($res);
	}
 }
 function getcomments() {
	global $con,$pid,$res;
	$query = "select pby,ccontent from comments where pid = $pid";
	$res = mysqli_query($con,$query) or die('error querying comments');
 }
 function postcomment() {
	global $con,$pid,$pby;
	$comment = addslashes($_POST['comment']);
	$query = "insert into comments(pid,pby,ccontent) values($pid,'$pby','$comment')";
	$res = mysqli_query($con,$query) or die('error adding comment');
 }
 if(isset($_POST['submit'])){
	 postcomment();
	 echo "<script>alert('posted');</script>";
 }
 getpost();
 getcomments();
 mysqli_close($con);
?>

<!DOCTYPE html>
  <head>
	<title>Post</title>
	<link href="http://fonts.googleapis.com/css?family=Patua+One|Alegreya+SC:900|Roboto|Lora:700|Alegreya+Sans+SC:800|Merriweather:300" rel="stylesheet" type="text/css">
<style type="text/css">
	#content {
	  width: 900px;	  
	  margin: 20px auto auto auto;
	  border: 2px solid #795548;
    }
    body a { 
	  text-decoration: none;
	  color: #009688;
	  letter-spacing: 1px;
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
		width: 900px;
		overflow: auto;
	}
	#comment_section {
        width: 698px;
        margin: auto;
        border-left: 2px solid #795548;
        float: right;     
		font-family: 'Roboto', sans-serif;
		font-size: 13px;
	}
	#post {
		width: 500px;
		border-radius: 5px;
		padding: 10px;
		margin: 10px auto 10px auto;
	}
	#post_content {
		line-height: 1.5em;	
		font-family: 'Merriweather', serif;	
		letter-spacing: 0.5px;
	}
	#title {
		/*font-weight: bold;*/
		font-family: 'Patua One', cursive;
		letter-spacing: 1px;
		font-size: 18px;
	}
	#addcomment {
		border: 2px solid brown;
		border-radius: 5px;
		width: 500px;
		margin: 0px auto 10px auto;
		padding: 10px;
		overflow: auto;
		color: #5f9ea0;
		letter-spacing: 1px;
	}
	#heading {
		width: 500px;
		margin: 30px auto auto auto;
		padding: 10px;
		font-family: 'Alegreya Sans SC', sans-serif;
		font-size: 20px;
		border: 2px solid brown;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
		color: #5f9ea0;
		letter-spacing: 1px;
	}
	#comment_box {
		width: 520px;
		margin: 0px auto 20px auto;
		border: 2px solid brown;
		border-top: none;		
		overflow: auto;		
	}
	#author {
		font-size: 12px;
		text-transform: uppercase;
		font-family: 'Lora', serif;
		color: #5f9ea0;
	}
	.comment {
		width: 500px;
		padding: 10px;		
		margin: 0px auto 0px auto;		
		font-family: 'Merriweather', serif;	
		letter-spacing: 0.5px;
		line-height: 1.5em;
	}
	.comment p {
		margin: 0px;
		padding-top: 5px;
	}
	input[type="submit"]{
		background-color: #2B547E; 
		border: none;
		color: #00CD00;
		text-align: center;		
		font-size: 14px;
		cursor: pointer;
		margin: auto;
		padding: 10px;
		font-family: 'Alegreya SC',serif;
		letter-spacing: 1px;
		float: left;
		margin: 15px auto auto 20px;
	}
	textarea {
		border: 1px solid #CDDC39;
		float: left;
	}
	#nav {
	  width: 200px;
	  float: right;
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
		   <div id="comment_section">
				<div id="post">
				  <p id="title"><?php echo $row['ptitle']; ?></p>
				  <p id="post_content"><?php echo $row['pcontent']; ?></p>
				</div>
				  <div id="addcomment">
					  <form method="post" action="<?php echo 'display.php?id='.$pid; ?>">
						  <span style="font-weight: bold;font-family:'Alegreya Sans SC', sans-serif;">ADD COMMENT:</span>
						  <p>
							<textarea rows="5" cols="35" name="comment"></textarea>
							<input type="submit" name="submit" value="ADD COMMENT" />
						  </p>
					  </form>
				  </div>
				  <div id="heading">Comments:</div>
				  <div id="comment_box">
				  <?php 
					if(mysqli_num_rows($res) != 0) {
						global $comments;
						while($comments = mysqli_fetch_array($res)) {
							echo '<div class="comment"><span id="author">'; echo $comments['pby']; echo '</span>';
							echo '<p id="comment_content">'; echo $comments['ccontent']; echo '</p></div>'; 
						}
					}
					else {
						?>
						<div class="comment">No Comments Yet</div>
				  <?php
					}
				  ?>
				  </div>
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