<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Loginstf.php");
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  padding: 6px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}
.iconbar-right a{
	float: left;
  width: 5%;
  text-align: center;
  padding: 6px 0;
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
		input[type="checkbox"] {
		transform:scale(2, 2);
    }
	</style>
</head>
<body>

<div class="icon-bar">
   
  <a href="logoutstf.php" ><i  class="fa fa-power-off"></i></a>
  <div class="iconbar-right">
  	<a href=""><i onclick="history.back()"class="fa fa-arrow-left"></i></a>
  	<a href="home.html"><i class="fa fa-home"></i></a>
  </div></div>
	<h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;font-size:40px;margin-top:-40px;background-color:#8c0100;color:rgb(255,255,255);">ISSUE REPORT</h1>
     
<div class="container">
	<br><br>
		<table width="1000" border="3" class="table table-striped ">
			<thead bgcolor="#8c0100" style="color:white; font-size: 16px;">
				<th></th>
				 <th height="40" >ROLL NO</th>
        		<th >LAB NO</th>
        		<th>PC NO</th>
        		<th>DATE</th>
        		<th>TIME</th>
        		<th>ISSUE CATEGORY</th>
        		<th>ISSUE</th>
        		<th>COMMENT</th>

			</thead>
			<form method="POST" action="delete.php">
			<tbody>
			<?php
				$conn=mysqli_connect("localhost","root","","mydb") or die("connection not established");
				
				$query=mysqli_query($conn,"select * from `issue12`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr bgcolor="#ef8b8b"  style="font-size: 16px;">
						<td align="center"><input type="checkbox" value="<?php echo $row['Roll_No']; ?>" name="Roll_No[]"></td>
						 <td height="28"><?php echo $Roll_No=$row['Roll_No']; ?></td>
                       <td><?php echo $LABNO=$row['LAB_NO']; ?></td>
                    <td><?php echo $PCNO=$row['PC_NO']; ?></td>
                    <td><?php echo $DATE=$row['DATE']; ?></td>
                     <td><?php echo $DATE=$row['TIME']; ?></td>
                    <td><?php echo $DATE=$row['Issue_Categories']; ?></td>
                    <td><?php echo $DATE=$row['Issue']; ?></td>
                     <td><?php echo $COMMENT=$row['COMMENT']; ?></td>
                     	</tr>
					<?php
				}
			
			?>
			</tbody>
		</table><center>
			 <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp; Completed</button>
			</form>
	</div>
	</div>
</body>
</html>