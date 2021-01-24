<?php
include 'config.php';
//include 'nav.php';
if(isset($_GET['name'])){
	$name=$_GET['name'];
	$query="select * from news where name='$name'";
$result=mysqli_query($conn,$query) or die(mysqli_error($query));
if($num=mysqli_num_rows($result)){
	echo "
<div class='container'>
<h3 class='col-sm-offset-3'>NEWS OF $name</h3>";
	
while($row=mysqli_fetch_assoc($result)){
   echo "<div class='col-sm-8 jumbotron'>
   
		<label>$row[news]</label><br>
		
	</div>";
}
echo "</div>";
}else{
	echo "<h3>sorry, there is no news from $name <h3>";
}

}

?>