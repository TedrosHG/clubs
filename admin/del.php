<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include '../config.php';
include 'adminnav.php';
$msg="";
if(isset($_POST['del'])){
	$name=$_POST['club'];
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
?>
<div class="container ">
<form class="form-horizontal col-sm-6 jumbotron" method="post" action="del.php">
<legend class="col-sm-offset-3">delete form</legend>
<div class="form-group">
<label>club name</label>	
<select class="form-control" name="club" required>
	<option value="">select club to delete</option>
	<?php
		$query="select * from club";
		$result=mysqli_query($conn,$query) or die(mysqli_error($query));
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<option >$row[name]</option>";
			}
		?>
</select>
</div>
<div class="form-group">
<input name="del" type="submit" value="delete" class="btn btn-danger">
</div>
<span class="text-success"><?php echo $msg;?></span>
</form>
</div>
<?php
}else{
	header('location:../login.php');
}
?>		