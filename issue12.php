<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Loginstd.php");
    exit;
}
$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
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
  
  <div class="contact-clean" style ="background-image:url(&quot;assets/img/computer-lab-png-computer-lab-992.png&quot;);background-repeat:no-repeat;background-size:cover;">
 <div class="icon-bar">
   
  <a href="logoutstd.php" ><i  class="fa fa-power-off"></i></a>
  <div class="iconbar-right">
  	<a href="menu12stu.php"><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a class="active" href="home.html"><i class="fa fa-home"></i></a>
  </div></div>





<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;margin-top:-46px;background-color:#8c0100;color:rgb(255,255,255);">ISSUE</h1>
      
  <br><br>
  <form method="post" style="background-color:#8c0100;" action="issue12.php">
            
<div class="form-group">
                  <input class="form-control" type="text" value="<?php echo $_SESSION['RollNo']; ?>" readonly></div>
   <div class="form-group">
<input class="form-control" type="text" maxlength="4" name="LABNO" placeholder="LAB NO" required></div>
 <div class="form-group">
<input class="form-control" type="number" maxlength="4" name="PCNO" placeholder="PC NO" required></div>
 <div class="form-group">
<input class="form-control"  value="<?php echo date('d-m-Y');?>" readonly="readonly" name="DATE"></div>
 <div class="form-group">
  <select name="TIME" style="width:400px;height:42px;" class="form-control" required>
        <option > TIME SLOT</option>
        <option value="8.30-10.30">8.30-10.30</option>
        <option value="10.30-12.30">10.30-12.30</option>
        <option value="12.30-2.30">12.30-2.30</option>
        <option value="2.30-4.30">2.30-4.30</option>
        <option value="4.30-6.30">4.30-6.30</option>
      </select></div>

    
 <div class="form-group">
   <select name="Categories" class="form-control" required>
  <option>Issue Categories</option>
   <option value=Hardware>HARDWARE</option>
    <option value=Software>SOFTWARE</option>
  </select>
</div>

<div class="form-group" >

 
    <select name=Issue class="form-control" required >
  <option>Issue</option>
  <optgroup label="HARDWARE">
    <option value=Mouse>Mouse</option>
    <option value==Keyboard>Keyboard</option>
    <option value=Sudden_computer_shutdown_or_restart> Sudden computer shutdown or restart</option>
   <option value= Blank_Screen> Blank Screen</option>
     <option value=Windows_Won’t_Boot>Windows Won’t Boot</option>
    <option value= Frozen_Screen >Frozen Screen </option>
      <option value= Internet_Issues>Internet Issues</option>
<option value= Peripherals_Stop_Working>Peripherals Stop Working</option>
<option value= Failure_to_start_up_computer>Failure to start up computer</option>
<option value= Visual_glitches>Visual glitches</option>
<option value=loud_noises>Loud noises</option>
<option value= Overheating >Overheating </option>
<option value= Electricity_interruptions>Electricity interruptions </option>
  </optgroup>
  <option></option>

  <optgroup label="SOFTWARE">
    <option value= Pop-up_Ads> Pop-up Ads</option>
    <option value=Viruses_and_malicious_programs>Viruses and malicious programs</option>
   <option value= delay_in_File_downloading> Delay in File downloading</option>
   
      <option value= Windows_Update_problems>Windows Update problems</option>
      <option value= Apps_malfunction>Apps behaving badly</option>
    <option value= Corrupted_files>Damaged and corrupted files</option>
     <option value=Slow_Internet>Slow Internet </option>
    <option value=Computer_Restarts_Randomly>Computer Restarts Randomly</option>
    <option value= Slow_computer >Slow computer</option>
    <option value= Applications_won’t_install > Applications won’t install  </option>
     
    </optgroup>
  </select>
</div>
            <div class="form-group">
      <textarea class="form-control" rows="16" name="COMMENT" placeholder="COMMENT" ></textarea></div>
   
 <div class="form-group"><button class="btn btn-primary" type="submit" style="margin-left:140PX;" name="SUBMIT" >SUBMIT</button></div>
 
   </form>
  <?php
	            if(isset( $_POST["SUBMIT"])){
	          	
					 $RollNo=$_SESSION["RollNo"];
					 $LABNO=$_POST["LABNO"];
					 $PCNO=$_POST["PCNO"];
			         $DATE=$_POST["DATE"];
					 $TIME=$_POST["TIME"];
					   $Categories=$_POST["Categories"];
             $Issue=$_POST["Issue"];
					 $COMMENT=$_POST["COMMENT"];
					
					/*if($_SESSION['Q']==1)
					{
						$_SESSION['Q'] = 0;
						echo $cid."<br>";
						$query = "update staff set Name='$Name',Roll_No='$Roll_No',Department='$Department',Email='$Email',password='$password',Year=$Year,password_repeat='password_repeat';";
					}
					else
					*/
					
					$query="insert into issue12 values ('','$RollNo','$LABNO','$PCNO','$DATE','$TIME','$Categories', '$Issue','$COMMENT');";
					echo $query."<br>";
					$run=mysqli_query($conn,$query);
					if(isset($run)){
						echo "<script>alert('successful');
						</script>";
						echo "<script>window.location.href='./issue12.php';</script>";	
					 }
				}
				?>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

