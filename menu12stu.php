<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Loginstd.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   <title>project</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
   
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
 
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bigshot+One">
 
   <link rel="stylesheet" href="assets12/css/styles.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
.body {margin:0;}

.icon-bar {
  width: 100%;
  
  overflow: auto;
}

.icon-bar a {
  float: right;
  width: 5%;
  text-align: center;
  padding: 5px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}
.iconbar-right a{
	float: left;
  width: 5%;
  text-align: center;
  padding: 5px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;


}

.icon-bar a:hover {
  background-color: #000;
}

.active {
  background-color: #8C0100;
}
</style>

</head>

<body>
  
  
   
 <div class="login-clean" style="background-image:url(&quot;assets/img/computer-lab-png-computer-lab-992.png&quot;);background-repeat:no-repeat;background-size:cover ;">
     <div class="icon-bar">
   
  <a  class="active"href="logoutstd.php" ><i class="fa fa-power-off"></i></a>
  <div class="iconbar-right">
  	<a  class="active"href=""><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div></div>





<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-46px;background-color:#8c0100;color:rgb(255,255,255);"></h1>
      
	<br>
  <br>

	
		<form method="post" style="margin-top:16px;">
  
          <h2 class="sr-only">Login Form</h2><img src="logo.png" style="width:250PX;">
   
         <div class="illustration"></div>
     
       <div class="form-group"><a role="button" class="btn btn-primary btn-block"  href="data12.php" style="background-color:#8c0100;font-size:20PX;">DATA ENTRY</a>
	   <a class="btn btn-primary btn-block" role="button" href="issue12.php" style="background-color:#8c0100;font-size:20PX;">ISSUE </a></button></div>
        </form><br><br><br>
    </div>
    <div></div>
    <script src="jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>