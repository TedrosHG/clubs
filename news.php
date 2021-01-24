<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" type="text/css" href="back.css">
    <link rel="stylesheet" href="jb/css/bootstrap.min.css">
  <script src="jq/jquery.min.js"></script>
  <script src="jb/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width,intial-scale=1">-->
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
            <a href="#" class="btn btn-success" id="menu-toggle"><span class="glyphicon glyphicon-tasks"></span> </a>
            <a class="navbar-brand" href="#">ASTU clubs</a>
        </div>

        <div class="collapse navbar-collapse" id="coll">
            <ul class="nav navbar-nav navbar-left" id="navul">
                
                <li ><a href="index.php" id="home"> <span class="glyphicon glyphicon-home"></span> home</a></li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">clubs <b class="caret"></b>
                    <ul class="dropdown-menu" id="drp">
                        <?php 
                        include 'config.php';
                        $query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

while($row=mysqli_fetch_assoc($result1)){
    echo "<li><a href='club.php?id=$row[name]'>$row[name]</a></li>";
      }   ?>    
                    </ul>
                </a>
                </li>

                        <li><a href="reg.php" > <span class="glyphicons glyphicons-user-add"></span> regester</a></li>
                        <li><a href="news.php" > <span class="glyphicon glyphicon-newspaper"></span> news</a></li>
                        <li><a href="#" >about</a></li>             
             </ul>
             <ul class="nav navbar-nav navbar-right" id="log">
                <li ><a href="login.php">login</a></li> 
             </ul>
        </div>
    </div>
</nav>
<div style="height:50px;"></div>
<!--side bar-->
    <div class="container-fluid" id="wrapper">

<div id="sidebar-wrapper" >
            <ul class="sidebar-nav">
                <li ><a href="index.php"><span class="glyphicon glyphicon-home"></span> home</a></li>
                <li ><a href="#item" data-toggle="collapse">clubs</a></li>
                    <ul class="nav collapse" id="item">
                        
                        <?php 
                        include 'config.php';
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

      <div id="page-content-wrapper">
        <?php 
    
        include "news1.php";


         ?>
      </div>
	</div>
		<script >
	$("#menu-toggle").click ( function(e) {
		e.preventDefault(); 
		$("#wrapper").toggleClass("menuDisplayed");
	});
</script>

</body>
</html>