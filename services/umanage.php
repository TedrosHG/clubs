<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include 'clubnav.php';
include '../config.php';
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql2="delete from $admin where id='$id'";
	mysqli_query($conn,$sql2) or die(mysqli_error($sql2));
}
$query="select * from $admin";
$result=mysqli_query($conn,$query) or die(mysqli_error($query));
if($num=mysqli_num_rows($result)){
	echo "<div class='col-sm-6 col-sm-offset-2'>
<table class='table table-striped table-hover'>
	<tr>
<th>id number</th>
<th>first name</th>
<th>last name</th>
<th>email address</th>
<th>phone number</th>
<th>gender</th>
<th>delete user</th>
</tr>";

while($row=mysqli_fetch_assoc($result)){

echo "<tr><td>$row[idnum]</td>
<td>$row[fname]</td>
<td>$row[lname]</td>
<td>$row[email]</td>
<td>$row[phone]</td>
<td>$row[gender]</td>
<td><a href='umanage.php?id=$row[id]' class='btn btn-danger'>delete</a><td>
</tr>";
}
echo "</table>
</div>";
}else{
	echo "<h3>sorry, there are no user that are registered to $admin <h3>";
}
}else{
	header('location:../login.php');
}
?>

