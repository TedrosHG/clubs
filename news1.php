<?php
include 'config.php';
//include 'nav.php'; 
$query1="select * from club";
$result1=mysqli_query($conn,$query1) or die(mysqli_error($query1));

if($num=mysqli_num_rows($result1)){
	echo "
<div class='container'>
   <div class='row'>
    <h1 class='col-sm-offset-3'>NEWS</h1>
     <div class='col-sm-6  list-group'> 
     <div class='list-group'>    
";

while($row=mysqli_fetch_assoc($result1)){
echo "<a href='allnews.php?name=$row[name]'  class='list-group-item'>$row[name]</a><br>";
}
echo "</div></div></div></div>";
}else{
	echo "<h3>sorry, there is no clubs<h3>";
}

?>