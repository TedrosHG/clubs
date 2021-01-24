<?php
include 'config.php';
//include 'nav.php';
$erridnum="";
$errfname="";
$errlname="";
$erremail="";
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['idnum']) && isset($_POST['email']) && isset($_POST['pno'])){
		$idnum=$_POST['idnum'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$pno=$_POST['pno'];
		$club=$_POST['club'];
		$gender=$_POST['gender'];
		if(!preg_match("/^[a-zA-Z]*$/", $fname)){
			$errfname="name must be character";
		}
		else if(!preg_match("/^[a-zA-Z]*$/", $lname)){
			$errlname="name must be character";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$erremail="invalid email format";
		}
		else{
			$query="insert into $club (idnum, fname, lname, email, phone, gender) values ('$idnum','$fname', '$lname', '$email', '$pno', '$gender')";
		$result=mysqli_query($conn,$query) or die(mysql_error($query));
		$msg=$fname." has successfully registered";
		}		
	}
}

?>
<html>
<head></head>
<body>
	<div class="container ">
<form class="form-horizontal col-sm-8 jumbotron" method="post" action="reg.php">
<h3 class="col-sm-offset-3">register form</h3>
<div class="form-group">
<label>id number</label>
<input name="idnum" type="text" placeholder="R/..../.." required class="form-control">
<span class="text-danger"><?php echo $erridnum ?></span>
</div>		
<div class="form-group">		
<label>first name</label>	
<input name="fname" type="text" placeholder="first name" required class="form-control">
<span class="text-danger"><?php echo $errfname?></span>
</div>
<div class="form-group">
<label>last name</label>	
<input name="lname" type="text" placeholder="last name" required class="form-control">
<span class="text-danger"><?php echo $errlname?></span>
</div>
<div class="form-group">
<label>EMAIL</label>	
<input name="email" type="email" placeholder="example@gmail.com" required class="form-control">
<span class="text-danger"><?php echo $erremail?></span>
</div>
<div class="form-group">
<label>phone number</label>	
<input name="pno" type="tel" pattern="\d{10}" placeholder="##########" required class="form-control">
</div>
<div class="form-group">
<label>gender</label>
<select class="form-control" name="gender" required>
   <option value="">select your gender</option>
   <option value="male">male</option>
   <option value="female">female</option>
</select>
</div>
<div class="form-group">
<label>clubs</label>	
<select class="form-control" name="club" required>
	<option value="">select your club</option>
	<?php
		$query="select * from club";
		$result=mysqli_query($conn,$query) or die(mysql_error($query));
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<option >$row[name]</option>";
			}
		?>
</select>
</div>
<div class="form-group">
<input name="btn" type="submit" value="register" class="btn btn-primary">
</div>
<span class="text-success"><?php echo $msg;?></span>
</form>
</div>
</body>
</html>