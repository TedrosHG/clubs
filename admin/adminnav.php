
<html>
 
 <head>
   <title>bootstrap</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../jb/css/bootstrap.min.css">
  <script src="../jq/jquery.min.js"></script>
  <script src="../jb/js/bootstrap.min.js"></script>
      <style>
         body{
            padding-top: 100px;
         }
         #logout{
            padding-right: 50px;
         }
      </style>
 </head>

 <body>
   <nav class="navbar navbar-inverse navbar-fixed-top"> 
         <div class="navbar-header">
            <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#mynav">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            
         </div>
            <div class="navbar-collapse collapse" id="mynav">
               <ul class="nav navbar-nav">
                  <li><a href="manage.php">manage clubs</a></li>
                  <li><a href="add.php">add club</a></li>
                  <li><a href="adminprofile.php">profile</a></li>
                  
               </ul>
                <ul class="nav navbar-nav navbar-right" id="logout">
                  <li><a href="../out.php">log out</a></li>
                  
               </ul>
            </div>
   </nav>
</body>
</html>