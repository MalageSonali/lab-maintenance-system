<?php
session_start();
$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
?>
<!DOCTYPE html>
	<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   	<title>staff sign up</title>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
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


<script type="text/javascript">
   
</style>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
	</head>
	<body>
 <div class="contact-clean" style ="background-image:url(&quot;assets/img/computer-lab-png-computer-lab-992.png&quot;);background-repeat:no-repeat;background-size:cover;">
<div class="icon-bar">
   <div class="iconbar-right">
  	<a href="Loginstf.php"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div></div>


<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-46px;background-color:#8c0100;color:rgb(255,255,255);">STAFF SIGN-UP</h1><br><br>
    
	    <form method="post"  style="background-color:#8c0100;" action="staff.php">
          <div class="form-group">
            <input class="form-control" type="text" name="Name" placeholder="NAME" required ></div>
            <div class="form-group">
            <input class="form-control" type="text" name="StaffId" placeholder="STAFF ID" required  ></div>
            <div class="form-group">
            <input class="form-control" type="email" name="EmailId" placeholder="EMAIL ID"  required ></div>
           <div class="form-group">
          
              <select class="form-control" name="Department">
 	  	<option > DEPARTMENT</option>
  			<option value="COMPUTER ">COMPUTER</option>
  			<option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
  			<option value="ELECTRONICS & TELECOMMUNICATION">ELECTRONICS & TELECOMMUNICATION</option>
  			<option value="ELECTRONICS">ELECTRONICS</option>
  			<option value="INSTRUMENTATION">INSTRUMENTATION</option>
			</select></div>
			   <div class="form-group">
			<input class="form-control" type="password" name="password" placeholder="PASSWORD"value="" id="myInput"  required><br>
			<input type="checkbox" style="font-color: white;" onclick="myFunction()">Show Password

			<script>
			function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
			x.type = "text";
			} else {
			x.type = "password";
			}
			}
			</script>
			</div>

            
			<div class="form-group">
			<input class="form-control" type="password" name="ConfirmPassword" placeholder="CONFIRM PASSWORD" value="" id="my"  required><br>
			<input type="checkbox" onclick="myFunct()">Show Password

			<script>
			function myFunct() {
			var y = document.getElementById("my");
			if (y.type === "password") {
			y.type = "text";
			} else {
			y.type = "password";
			}
			}
			</script>
			</div>


            <div class="form-group"><button class="btn btn-primary active btn-block btn-lg" role="button" href="Loginstf.html" onclick="return validation()" name="SignUp">SignUp</button></div></form>
	          <?php
	            if(isset( $_POST["SignUp"])){
	            	
					$Name=$_POST["Name"];
					 $Staff_id=$_POST["StaffId"];
					 $Department=$_POST["Department"];
					 $Email=$_POST["EmailId"];
					 $password=$_POST["password"];
					 $password_repeat=$_POST["ConfirmPassword"];
					// $password=md5(password);
					// $password_repeat=md5(password-repeat);
					  $password1=md5($password);
					  $password_repeat1=md5($password_repeat);
									
					  if($password_repeat!=$password){
					 	echo "<script>alert(' password does not match');</script>";
						echo "<script>window.location.href='./staff.php';</script>";
					 }
					 else
					 {
					 $sel_u="select * from staff;";
					$run_u=mysqli_query($conn,$sel_u);
					while($row_u=mysqli_fetch_assoc($run_u)){
						
						if( $Staff_id==$row_u['Staff id']){
						echo "<script>alert(' Staff_id  $Staff_id already exist. Choose another Staff id');</script>";
						echo "<script>window.location.href='./staff.php';</script>";	
						}
						if($Email==$row_u['Email']){
						echo "<script>alert(' Email already exist. Choose another  Email');</script>";
						echo "<script>window.location.href='./staff.php';</script>";	
						}
					

					}
					 
					/*if($_SESSION['Q']==1)
					{
						$_SESSION['Q'] = 0;
						echo $cid."<br>";
						$query = "update staff set Name='$Name',Roll_No='$Roll_No',Department='$Department',Email='$Email',password='$password',Year=$Year,password_repeat='password_repeat';";
					}
					else
					*/

					$query="insert into staff values ('$Name','$Staff_id','$Email','$Department','$password1','$password_repeat1');";
					echo $query."<br>";
					$run=mysqli_query($conn,$query);
					if(isset($run)){
						echo "<script>alert('successful');</script>";
						//echo "<script>window.location.href='./staff.php';</script>";	
						echo "<script>window.location.href='./Loginstf.php';</script>";
					
					}	}
				}
				?>
		    </div>
	    </div>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

