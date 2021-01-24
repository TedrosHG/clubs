<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include 'adminnav.php';
include '../config.php';
$errclub="";
$errname="";
$errpass="";
$errrepass="";
$errimg="";
$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$club=$_POST['club'];
	$des=$_POST['des'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];

	$fileName=$_FILES['img']['name'];
	$fileTmpName=$_FILES['img']['tmp_name'];
	$filetype=$_FILES['img']['type'];
    $fileExtention=strtolower(substr($fileName, strpos($fileName, '.')+1));
	$allowed=array('jpg', 'jpeg', 'png');
	$location='../img/images/';
	$fullpath=$location.$fileName;

	$sql="select * from club where name='$club'";
    $result3=mysqli_query($conn,$sql) or die(mysqli_error($sql));
    if($row=mysqli_num_rows($result3)){
    	$errclub="this club is already in use";
    }
	else if(!preg_match("/^[a-zA-Z_]*$/", $club)){
		$errclub="name must be character or underscrol";
	}
	elseif (!in_array($fileExtention, $allowed)) {
		$errimg="you can't upload this type of file";
	}
	else if(!preg_match("/^[a-zA-Z]*$/", $name)){
			$errname="name must be character";
		}
	else if(strlen($pass)<8){
		$errpass="too weak,password must be 8 or more digits";
	}
	else if($pass!=$repass){
        $errrepass="mismatched password";
	}
	else{
		$mpass=md5($pass);
		$query1="create table $club(id INT NOT NULL AUTO_INCREMENT primary key,idnum varchar(20) , fname varchar(30), lname varchar(30), email varchar(50), phone varchar(20), gender varchar(10))";
		mysqli_query($conn,$query1) or die(mysqli_error($query1));
	    $query="insert into club (name, description, image) values ('$club','$des', '$fileName')";
		mysqli_query($conn,$query) or die(mysqli_error($query));
		$query2="INSERT INTO admin(service, name, password) VALUES ('$club','$name','$mpass')";
		mysqli_query($conn,$query2) or die(mysqli_error($query2));
		move_uploaded_file($fileTmpName, $fullpath);
		$msg=$club." has successfully added";
	}
	
}
?>
<div class="container">
	<div class="col-sm-8">
		<form class="horizontal" method="post" action="add.php" enctype="multipart/form-data">
	<div class="form-group">
		<label>name of club</label>
		<input name="club" type="text" class="form-control" required>
		<span class="text-danger"><?php echo $errclub ?></span>
	</div>
	<div class="form-group">
		<label>description</label>
		<textarea name="des" class="form-control" required></textarea>
	</div>
	<div class="form-group">
		<label>upload an image</label>
		<input name="img" type="file" class="btn btn-primary" required>
		<span class="text-danger"><?php echo $errimg ?></span>
	</div>
	<div class="form-group">
		<label>name of club admin</label>
		<input name="name" type="text" class="form-control" required>
		<span class="text-danger"><?php echo $errname ?></span>
	</div>
	<div class="form-group">
		<label>new password</label>
		<input name="pass" type="password" class="form-control" required>
		<span class="text-danger"><?php echo $errpass ?></span>
	</div>
	<div class="form-group">
		<label>reenter password</label>
		<input name="repass" type="password" class="form-control" required>
		<span class="text-danger"><?php echo $errrepass ?></span>
	</div>
	<div class="form-group">
		<label></label>
		<input type="submit" name="submit" value="add" class="btn btn-info">
	</div>
	<span class="text-success"><?php echo $msg;?></span>
</form>
	</div>
	
</div>
<?php
}else{
	header('location:../login.php');
}
?>		