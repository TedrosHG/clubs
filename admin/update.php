<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include 'adminnav.php';
include '../config.php';
$errname="";
$errpass="";
$errimg="";
if(isset($_GET['id'])){
	$id=$_GET['id'];
}

if(isset($_POST['btn'])){
	$des=$_POST['des'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$fileName=$_FILES['img']['name'];
	$fileTmpName=$_FILES['img']['tmp_name'];
    $fileExtention=strtolower(substr($fileName, strpos($fileName, '.')+1));
	$allowed=array('jpg', 'jpeg', 'png');
	$location='../img/images/';
	$fullpath=$location.$fileName;
    
	if (!preg_match("/^[a-zA-Z]*$/", $name)) {
		$errname="name must be character";
	}
	elseif ($fileName=="" && empty($_POST['pass'])) {
		$query="UPDATE club SET description='$des' WHERE name='$id'";
		mysqli_query($conn,$query) or die(mysqli_error($query));
		$query1="UPDATE admin SET name='$name' WHERE service='$id'";
		mysqli_query($conn,$query1) or die(mysqli_error($query1));
		header('location:manage.php');
		}
	elseif ($fileName=="" && isset($_POST['pass'])) {
		if(strlen($pass)<8){
		$errpass="too weak password";
		}
		else{
			$pas=md5($pass);
			$query="UPDATE club SET description='$des' WHERE name='$id'";
			mysqli_query($conn,$query) or die(mysqli_error($query));
			$query1="UPDATE admin SET name='$name' , password='$pas' WHERE service='$id'";
			mysqli_query($conn,$query1) or die(mysqli_error($query1));
			move_uploaded_file($fileTmpName, $fullpath);
			header('location:manage.php');
		}	
	}
	elseif ($fileName!="" && empty($_POST['pass'])) {
		if (!in_array($fileExtention, $allowed)) {
		$errimg="you can't upload this type of file";
		}
		else{
			$query="UPDATE club SET description='$des', image='$fileName' WHERE name='$id'";
			mysqli_query($conn,$query) or die(mysqli_error($query));
			$query1="UPDATE admin SET name='$name'  WHERE service='$id'";
			mysqli_query($conn,$query1) or die(mysqli_error($query1));
			move_uploaded_file($fileTmpName, $fullpath);
			header('location:manage.php');
		}
	}
	elseif($fileName!="" && isset($_FILES['img'])) {
		if(strlen($pass)<8){
			$errpass="too weak password";
		}
		elseif (!in_array($fileExtention, $allowed)) {
			$errimg="you can't upload this type of file";
		}
		else{
			$pas=md5($pass);
			$query="UPDATE club SET description='$des', image='$fileName' WHERE name='$id'";
			mysqli_query($conn,$query) or die(mysqli_error($query));
			$query1="UPDATE admin SET name='$name' , password='$pas' WHERE service='$id'";
			mysqli_query($conn,$query1) or die(mysqli_error($query1));
			move_uploaded_file($fileTmpName, $fullpath);
			header('location:manage.php');
		}
	}
}
?>
<?php
	if(isset($_GET['id'])){
	$sql="select * from club where name='$id'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($sql));
	$row=mysqli_fetch_assoc($result);
	$sql1="select * from admin where service='$id'";
	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($sql1));
	$row1=mysqli_fetch_assoc($result1);
	?>
	<div class="container">
	<form class="horizontal" method="post" action="update.php?id=<?php echo $id?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-5">
		<div class="form-group">
			<label>name of club is <?php echo $row['name']?></label>
		</div>
		<div class="form-group">
			<label>description</label>
			<textarea name="des" class="form-control" required><?php echo $row['description']?></textarea>
		</div>
		<div class="form-group">
			<label>club admin</label>
			<input name="name" type="text" class="form-control" value="<?php echo $row1['name']?>" required>
			<span class="text-danger"><?php echo $errname?></span>
		</div>
		<div class="form-group">
			<label>change password</label>
			<input name="pass" type="password" class="form-control" placeholder="To change, enter new password" >
			<span class="text-danger"><?php echo $errpass?></span>
		</div>
		<div class="form-group">
			<label>change the image</label>
			<input name="img" type="file" class="btn btn-primary">
			<span class="text-danger"><?php echo $errimg ?></span>
		</div>
		<div class="form-group col-sm-8">
	        <input name="btn" type="submit" value="update" class="btn btn-primary">
	    </div>;
	    </div>
			<div class="col-sm-7">
				<p><b>The current image</b></p>
				<img src="../img/images/<?php echo $row['image']?>" alt="problem">
			</div>
		</div> 
	</form>
</div>
<?php
}
}else{
	header('location:../login.php');
}
?>		
