<?php
session_start();
if(empty($_SESSION['admin'])){
include 'config.php';
$ms="";
if(isset($_POST['log'])){
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$cl=$_POST['cl'];
	$mpass=md5($pass);
	$sql="select * from admin where service='$cl' and name='$name' and password='$mpass'";
	$result1=mysqli_query($conn,$sql) or die(mysqli_error($sql));
	if($row1=mysqli_num_rows($result1)){
		$row=mysqli_fetch_assoc($result1);
		$_SESSION['admin']=$row['service'];
		if($row['service']=='total'){
			header('location:admin/manage.php');
		}else{
			header('location:services/umanage.php');
		}
	}else{
		$ms="wrong input";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="lstyle.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="jb/css/bootstrap.min.css">
  <script src="jq/jquery.min.js"></script>
  <script src="jb/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,intial-scale=1">
	<title>astu student union</title>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" id="naver">
	<div class="container">
		<div class="navbar-header" id="navheader">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#coll">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">ASTU clubs</a>
		</div>

		<div class="collapse navbar-collapse" id="coll">
            <ul class="nav navbar-nav navbar-left" id="navul">
            	
             	<li ><a href="index.php" id="home">home</a></li>
             	<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">clubs <b class="caret"></b>
             		<ul class="dropdown-menu" id="drp">
             			<?php 
                        
                        $query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<li><a href='club.php?id=$row[name]'>$row[name]</a></li>";
      }   ?>    
             		</ul>
             	</a>
             	</li>

		             	<li><a href="reg.php" >regester</a></li>
		            	<li><a href="news.php" >news</a></li>
		            	<li><a href="#" >about</a></li>
		            	  	
             </ul>

             <ul class="nav navbar-nav navbar-right" id="log">
             	<li ><a href="login.php">login</a></li> 
             </ul>
        </div>
	</div>
</nav>


<div style="height:50px;"></div>
		<div id="sidebar-wrapper" >
			<ul class="sidebar-nav">
             	<li ><a href="index.php"><span class="glyphicon glyphicon-home"></span> home</a></li>
             	<li ><a href="#item" data-toggle="collapse">clubs</a></li>
                  <ul class="nav collapse" id="item">
             			<?php 
                       
                        $query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<li><a href='club.php?id=$row[name]'>$row[name]</a></li>";
      }   ?>    
             		</ul>
                <li ><a href="reg.php">regester</a></li>
            	<li><a href="news.php">news</a></li>
            	<li><a href="#">about</a></li>
            </ul>
		</div>


<script >
	$("#menu-toggle").click ( function(e) {
		e.preventDefault(); 
		$("#wrapper").toggleClass("menuDisplayed");
	});
</script>


<!--login form-->
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default" style="background: rgba(0,0,0,0.5);">
				<h4>login form</h4>
				<div class="panel-body">
					<form action="login.php" method="post">

						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="enter user name" required>
						</div>
						<div class="form-group">
							<input type="password" name="pass" class="form-control" placeholder="enter password" required>
						</div>
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
								</div>
						<div class="form-group">
						<label for="sel1">Select login option:</label>
							  <select class="form-control" id="sel1" required name="cl">
							  	<option value="">select your club</option>
							    <?php 
             			include 'config.php';
             			$query1="select * from admin";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<option >$row[service]</option>";
      }   ?>    
							  </select>
						</div>

						<div class="form-group">
							<input type="submit" name="log" class="btn btn-success btn-lg btn-block" value="login">
						</div>
						<span class="text-danger"><?php echo $ms;?></span>
					</form>
					
				</div>
				
			</div>
		</div>
		
	</div>
</div>

</body>
</html>
<?php
}else{
	if($_SESSION['admin']=='total'){
		header('location:admin/manage.php');
	}else{
		header('location:services/umanage.php');
	}
}
?>