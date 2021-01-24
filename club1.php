
  <?php
//include 'nav.php';
include 'config.php';


    echo "<div style='height:50px;''></div>
    <div class='row'>
          <div class='col-sm-offset-2'>"; 
    if(isset($_GET['id'])){
        $name=$_GET['id'];
        $query2="select * from club where name='$name'";
        $result2=mysqli_query($conn,$query2) or die(mysqli_error($query2));
        $row2=mysqli_fetch_assoc($result2);
        echo "<div class='col-sm-8'><img src='img/images/$row2[image]' alt='image not found'></div>";
        echo "<div class='col-sm-8'> <b>description of $row2[name]</b>";
        echo "<pre id='pre' class='text-info pre-scrollable'>$row2[description]</pre></div>";
         }
    else{
        $query3="select * from club";
        $result3=mysqli_query($conn,$query3) or die(mysqli_error($query3));
        $row3=mysqli_fetch_assoc($result3);
        echo "<div class='col-sm-8'><img src='img/images/$row3[image]' alt='w'></div>";
        echo "<div class='col-sm-8'><b>description of $row3[name]</b>";
        echo "<p class='text-info pre-scrollable'>$row3[description]</p></div>";
           }
         echo " </div></div></div>";
          ?>  
        
        
          
