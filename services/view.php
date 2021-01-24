<?php
session_start();
if(isset($_SESSION['admin'])){
	$admin=$_SESSION['admin'];
include 'clubnav.php';
include '../config.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="DELETE FROM news WHERE id='$id'";
	mysqli_query($conn,$sql) or die(mysqli_error($sql));
	header('location:view.php');
}
$query="select * from news where name='$admin'";
$result=mysqli_query($conn,$query) or die(mysqli_error($query));
if($num=mysqli_num_rows($result)){
echo "
<div class='container'>
<h3 class='col-sm-offset-3'>NEWS OF $admin</h3>";
	
while($row=mysqli_fetch_assoc($result)){
   echo "<div class='col-sm-8 jumbotron'>
		<label>$row[news]</label><br>
		<a href='view.php?id=$row[id]' class='btn btn-danger'>delete</a>
	</div>";
}
echo "</div>";
}else{
	echo "<h3>sorry, there is no posted news<h3>";
}
}else{
	header('location:../login.php');
}


?>