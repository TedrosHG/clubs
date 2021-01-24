<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include 'clubnav.php';
include '../config.php';
$succ="";
if(isset($_POST['submit'])){
$news=$_POST['news'];
$query2="INSERT INTO news (name, news) VALUES ('$admin','$news')";
mysqli_query($conn,$query2) or die(mysql_error($query2));
$succ="news has been succefully sent";
}
?>
<div class="container">
	<div class="col-sm-8 jumbotron">
		<form class="horizontal" method="post" action="send.php">
			<h3 class="col-sm-offset-3">NEWS OF $admin</h3>
	<div class="form-group">
		<label>news</label>
		<textarea name="news" class="form-control" placeholder="write news for all user " required></textarea>
	</div>
	<div class="form-group">
		<label></label>
		<input type="submit" name="submit" value="send" class="btn btn-info">	
	</div>
	<div class="form-group">
		<span class="text-success"><?php echo $succ;?></span>
	</div>
</form>
	</div>
</div>
<?php
}else{
	header('location:../login.php');
}

?>