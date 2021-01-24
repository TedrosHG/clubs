<?php
session_start();
if(isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
include 'clubnav.php';
include '../config.php';
$errcurpass="";
$errpass="";
$errrepass="";
$msg="";

$sql1="select * from $admin";
$res1=mysqli_query($conn,$sql1) or die(mysqli_error($sql1));
$num=mysqli_num_rows($res1);

$sql2="select * from admin where service='$admin'";
$res2=mysqli_query($conn,$sql2) or die(mysqli_error($sql2));
$row2=mysqli_fetch_assoc($res2);

$sql3="select * from news where name='$admin'";
$res3=mysqli_query($conn,$sql3) or die(mysqli_error($sql3));
$numnews=mysqli_num_rows($res3);

$admin_name=$row2['name'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $curpass=$_POST['curpass'];
  $pass=$_POST['pass'];
  $repass=$_POST['repass'];
  $mpass=md5($curpass);

  $sql="select * from admin where service='$admin' and password='$mpass'";
    $result3=mysqli_query($conn,$sql) or die(mysqli_error($sql));
    if($row=mysqli_num_rows($result3)){
      if(strlen($pass)<8){
        $errpass="too weak,password must be 8 or more digits";
      }
      else if($pass!=$repass){
        $errrepass="mismatched password";
      }else{
        $pas=md5($pass);
        $query="update admin set password='$pas' where service='$admin'";
        mysqli_query($conn,$query) or die(mysqli_error($query));
        $msg="password has been changed";
      }
    }else{
      $errcurpass="incorrect password!";
    }
}
?>
<div class="container">
  <div class="col-sm-8">
    <table class="table">
      <tr>
        <th colspan=2><center>welcome to my profile</center></th>
      </tr>
      <tr>
        <td>Name of the club</td>
        <td><?php echo $admin;?></td>
      </tr>
      <tr>
        <td>Admin's name</td>
        <td><?php echo $admin_name;?></td>
      </tr>
      <tr>
        <td>Total number of users</td>
        <td><?php echo $num; ?></td>
      </tr>
      <tr>
        <td>Total number of news sent</td>
        <td><?php echo $numnews; ?></td>
      </tr>
    </table>
    <form class="horizontal" method="post" action="clubprofile.php">
  <div class="form-group">
    <label>current password</label>
    <input name="curpass" type="password" class="form-control" required>
    <span class="text-danger"><?php echo $errcurpass ?></span>
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