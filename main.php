
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
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
            	
             	<li ><a href="#" id="home"> <span class="glyphicon glyphicon-home"></span> home</a></li>
             	<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">clubs <b class="caret"></b>
             		<ul class="dropdown-menu" id="drp">
             			<li><a href="#" > ICPC club</a></li>
             			<li><a href="#" >science  club</a></li>
             			<li><a href="#" >space science club</a></li>
             			<li><a href="#" >ICT club</a></li>
             			<li><a href="#" >anti-drug club</a></li>
             			<li><a href="#" >charity club</a></li>
             		</ul>
             	</a>
             	</li>

		             	<li><a href="#" > <span class="glyphicons glyphicons-user-add"></span> regester</a></li>
		            	<li><a href="#" > <span class="glyphicon glyphicon-newspaper"></span> news</a></li>
		            	<li><a href="#" >about</a></li>       	  	
             </ul>
             <ul class="nav navbar-nav navbar-right" id="log">
             	<li ><a href="log.html">login</a></li> 
             </ul>
        </div>
	</div>
</nav>
<div style="height:50px;"></div>
<!--side bar-->
	<div class="container-fluid" id="wrapper">

<div id="sidebar-wrapper" >
			<ul class="sidebar-nav">
             	<li ><a href="#"><span class="glyphicon glyphicon-home"></span> home</a></li>
             	<li ><a href="#item" data-toggle="collapse">clubs</a></li>
                    <ul class="nav collapse" id="item">
             			<li><a href="#" ><div class="col-sm-1"></div> ICPC club</a></li>
             			<li><a href="#" ><div class="col-sm-1"></div>science  club</a></li>
             			<li><a href="#" ><div class="col-sm-1"></div>space science club</a></li>
             			<li><a href="#" ><div class="col-sm-1"></div>ICT club</a></li>
             			<li><a href="#" ><div class="col-sm-1"></div>anti-drug club</a></li>
             			<li><a href="#" ><div class="col-sm-1"></div>charity club</a></li>
             		</ul>
                <li ><a href="#">regester</a></li>
            	<li><a href="#">news</a></li>
            	<li><a href="#">about</a></li>
            </ul>
		</div>

      <div id="page-content-wrapper">
        <<?php 
        
        include "reg.php";


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