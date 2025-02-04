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
  <title>Issue Report</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>

.body {margin:0;}

@page { size: auto;}

.icon-bar {
  width: 100%;
  margin-top:-52px;
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
.hide-on-screen {display:none;}

@media print
{     
  .hide-on-screen {display:block;}

    .no-print, .no-print *
    {
        display: none !important;
    }
}

.icon-bar a:hover {
  background-color: #000;
}
    input[type="checkbox"] {
    transform:scale(2, 2);
    }
  </style>
</head>
<body>

  <h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;font-size:40px;margin-top:20px;background-color:#8c0100;color:rgb(255,255,255);">ISSUE REPORT</h1>
  <div class="icon-bar hidden-print">
     <a href="logoutstf.php" ><i class="fa fa-power-off"></i></a>
  <div class="iconbar-right">
    <a href="menu12.php"><i onclick="history.back()" class="fa fa-arrow-left"></i></a>
    <a href="home.html"><i class="fa fa-home"></i></a>
  </div></div>
 <br>  
 <div class="no-print">
    <button class="btn btn-primary" style="float: right" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button></div>
<div>
  <ul class="nav nav-tabs no-print" >
            <li class="nav-item" ><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1" style="font-size: 20px"><b>Issues</b></a></li>
            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2" style="font-size: 20px"><b>Solved Issues</b></a></li>
          </ul>
<br><br>
<div class="tab-content">
<div class="tab-pane active" role="tabpanel" id="tab-1">
<h3 class="text-uppercase text-center justify-content-center hide-on-screen" style="font-weight:bold;">Unsolved Issues</h3>
 
<div class="container">
  
    <table width="1000" border="2" class="table table-striped ">
      <thead bgcolor="#8c0100" style="color:white; font-size: 16px;">
        <th class="hidden-print"></th>
         <th height="40" >SR.NO</th>
          <th>ROLL NO</th>
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
        
        $query=mysqli_query($conn,"select * from issue12");
        while($row=mysqli_fetch_array($query)){
          ?>
          <tr bgcolor="#ef8b8b"  style="font-size: 16px;">
            <td class="hidden-print" align="center"><input type="checkbox" value="<?php echo $row['id']; ?>" name="id[]"></td>
             <td height="28"><?php echo $id=$row['id']; ?></td>
                    <td><?php echo $Roll_No=$row['RollNo']; ?></td>
                       <td><?php echo $LABNO=$row['LABNO']; ?></td>
                    <td><?php echo $PCNO=$row['PCNO']; ?></td>
                    <td><?php echo $DATE=$row['DATE']; ?></td>
                     <td><?php echo $TIME=$row['TIME']; ?></td>
                    <td><?php echo $Categories=$row['Categories']; ?></td>
                    <td><?php echo $Issue=$row['Issue']; ?></td>
                     <td><?php echo $COMMENT=$row['COMMENT']; ?></td>
                      </tr>
          <?php
        }
      
      ?>
      </tbody>
    </table><center>
       <button type="submit" class="btn btn-primary hidden-print"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp; Completed</button>
      </center>
      </form>
  </div></div>

<div class="tab-pane" role="tabpanel" id="tab-2">
<h3 class="text-uppercase text-center justify-content-center hide-on-screen" style="font-weight:bold;">Solved Issues</h3>
 <div class="container">

  <table width="1000" border="2" class="table table-striped ">
      <thead bgcolor="#8c0100" style="color:white; font-size: 16px;">
     <th height="40" >SR.NO</th>
        <th>ROLL NO</th>
        <th >LABNO</th>
        <th>PCNO</th>
        <th>DATE</th>
        <th>TIME</th>
        <th>ISSUE CATEGORY</th>
        <th>ISSUE</th>
        <th>COMMENT</th>

    </thead>      
    <tbody>              
        <?php 
            $select="select * from issue";
            $run_s=mysqli_query($conn,$select);
            while ($row=mysqli_fetch_array($run_s)){
            ?>
                <tr bgcolor="#ef8b8b">
                      <td height="28"><?php echo $id=$row['id']; ?></td>
                      <td><?php echo $Roll_No=$row['RollNo']; ?></td>
                       <td><?php echo $LABNO=$row['LABNO']; ?></td>
                    <td><?php echo $PCNO=$row['PCNO']; ?></td>
                    <td><?php echo $DATE=$row['DATE']; ?></td>
                    <td><?php echo $TIME=$row['TIME']; ?></td>
                    <td><?php echo $Categories=$row['Categories']; ?></td>
                    <td><?php echo $Issue=$row['Issue']; ?></td>
                     <td><?php echo $COMMENT=$row['COMMENT']; ?></td>
                     </tr>

            <?php
            } ?>
          </tbody>
</table>
    </div></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>