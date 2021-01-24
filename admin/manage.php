<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include 'adminnav.php';
include '../config.php';
if(isset($_GET['id'])){
	$name=$_GET['id'];
	$sql="drop table $name";
	mysqli_query($conn,$sql) or die(mysqli_error($sql));
	$sql1="delete from club where name='$name'";
	mysqli_query($conn,$sql1) or die(mysqli_error($sql1));
	$sql2="delete from admin where service='$name'";
	mysqli_query($conn,$sql2) or die(mysqli_error($sql2));
	$sql3="delete from news where name='$name'";
	mysqli_query($conn,$sql3) or die(mysqli_error($sql3));
	$msg=$name." has successfully deleted";
}

$query="select * from club";
$result=mysqli_query($conn,$query) or die(mysqli_error($query));
if($num=mysqli_num_rows($result)){
	echo "<div class='col-sm-6 col-sm-offset-2'>
<table class='table table-striped table-hover'>
	<tr>
<th>club name</th>
<th>description</th>
<th>club admin</th>
<th>update</th>
<th>delete</th>
</tr>";

while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>$row[name]</td>
<td>$row[description]</td>";
$name=$row['name'];
$sql="select * from admin where service='$name'";
$res=mysqli_query($conn,$sql) or die(mysqli_error($sql));
$row1=mysqli_fetch_assoc($res);

echo "<td>$row1[name]</td>
<td><a href='update.php?id=$row[name]' class='btn btn-primary'>update</a></td>
<td><a href='manage.php?id=$row[name]' class='btn btn-danger'>delete</a></td></tr>";
}
echo "</table>
</div>";
}else{
	echo "<h3>sorry, there is no club<h3>";
}
}else{
	header('location:../login.php');
}
?>

