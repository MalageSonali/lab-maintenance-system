<?php

session_start();
$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
//$msg='';
function email_exists($Email,$conn)
{
$row=mysqli_query($conn,"SELECT * FROM student WHERE Email='$Email';");

  {
    if(mysqli_num_rows($row)==0)
      {
         return false;
       }
       else
       {
       return  true;
       }
        }  
}

/*function logged_in()
{
if(isset($_SESSION['Email'])||isset($_COOKIE['name']))
{
    return false;
}   
else
{
    return true;
}
}*/

if(isset($_POST['Submit']))
{
    $Email=$_POST['Email'];

     $_SESSION['Email']= $Email;
   
     /* if(empty($Email))
      {
        $msg="<div class='error'>Please Enter Your Email</div> ";
      }
      else if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
      {
        $msg="<div class='error'>Please Enter Valid Email</div> ";
      }
      else*/ if(email_exists($Email,$conn))
      {  
      
      
    
   echo "<script>window.location.href='./Resetpassstd.php';</script>";
        
    }
      else{echo "<script>alert('Invalid Email !');</script>";
       
         }}
          /*
          $msg="<div class='error'>Email found</div> ";
          include'resetpass.php';
      }
      else{
        $msg="<div class='error'> Email does not exists</div> ";

      }
     } */

?>

<!DOCTYPE html>
<html>

<head>
         
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/styles.min.css">
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
   <div class="login-clean" style="background-image:url(&quot;assets/img/computer-lab-png-computer-lab-992.png&quot;);background-repeat:no-repeat;background-size:cover;">
  <div class="icon-bar">
    <div class="iconbar-right">
  	<a href="Loginstd.php"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div></div>
        <h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-42px;background-color:#8c0100;color:rgb(255,255,255);">Forgot password</h1>
        <form method="post" style="background-repeat:no-repeat;margin-top:105px;" action="Forgetpassstu.php"><br>
            
            <div class="form-group">
                <input class="form-control" type="email" name="Email" placeholder="Email" required>
                
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block"  style="background-color:#8c0100;" name="Submit">RESET</button>
            </div>
        </form><br><br><br><br><br><br>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
   
</body>

</html>