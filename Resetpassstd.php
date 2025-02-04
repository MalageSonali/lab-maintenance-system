<?php 

session_start();
$errors = [];
$db = mysqli_connect('localhost', 'root', '', 'mydb');


// ENTER A NEW PASSWORD
if (isset($_POST['np'])) {
  //$Username = mysqli_real_escape_string($db, $_POST['Username']);
 
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $passwordrepeat = mysqli_real_escape_string($db, $_POST['passwordrepeat']);
 $Email = $_SESSION['Email'];

  if ($password !== $passwordrepeat) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
     $query="UPDATE student SET password='$password',passwordrepeat='$passwordrepeat' WHERE Email='$Email'";
					echo $query."<br>";
					$run=mysqli_query($db,$query);
					if(isset($run))
					{
						echo "<script>alert('successful');</script>";
			      echo "<script>window.location.href='./Loginstd.php';</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
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
  	<a href="Forgetpassstu.php"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div></div>
    
     <h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-43px;background-color:#8c0100;color:rgb(255,255,255);">reset password</h1>
        <br>
          <form method="post" style="background-repeat:no-repeat;margin-top:88px;">
           
   <?php  if (count($errors) > 0) : ?>
  <div class="msg">
    <?php foreach ($errors as $error) : ?>
      <span><?php echo $error ?></span>
    <?php endforeach ?>
  </div>
<?php  endif ?>
    

                 <div class="form-group"><input class="form-control" type="password" name="password" placeholder="New Password" required></div>
            <div class="form-group"><input class="form-control" type="password" name="passwordrepeat" placeholder="Confirm Password" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:#8c0100;" name="np" >Change Password</button></div>
        </form><br><br><br><br>
    
    </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>