<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Loginstf.php");
    exit;
}

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM data12 JOIN student ON data12.ROLL_NO = student.RollNo WHERE CONCAT(Name,RollNo,Department,Year,SUBJECT,LABNO,PCNO,DATE,TIME) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM data12 JOIN student ON data12.ROLL_NO = student.RollNo";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "mydb");
    $filter_Result = mysqli_query($connect, $query);
    if (!$filter_Result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}
    return $filter_Result;
}

?>
<html>
<head>
    <meta charset="utf-8">
  <title>Data Entry Report</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bigshot+One">
  <link rel="stylesheet" href="assets12/css/styles.min.css">
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
  padding: 6px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
  margin-top: 4px;
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
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>

  </head>
<body>
  
       <h1 class="text-uppercase text-center justify-content-center" style="background-size:auto;font-weight:bold;font-family:Alegreya, serif;font-size:40px;margin-top:20px;background-color:#8c0100;color:rgb(255,255,255);">DATA ENTRY REPORT</h1>
        <div class="icon-bar hidden-print">
     <a href="logoutstf.php" ><i class="fa fa-power-off"></i></a>
    <div class="iconbar-right">
    <a href="menu12.php"><i onclick="history.back()"class="fa fa-arrow-left "></i></a>
      <a href="home.html"><i class="fa fa-home "></i></a>
       </div></div>

   <br><br>
        
        <form action="datareport.php" method="post"><center>
          <div class="no-print">
            <input type="text" name="valueToSearch" placeholder=" Search here?">&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" class="btn btn-primary" name="search" value="Search">
             <button class="btn btn-primary" style="float:right;" onclick="window.print()">
              <span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
            </div></center>
           
  <br><br>
   <div class="container"> 
   <table width="1000" border="2" class="table table-striped ">
      <thead bgcolor="#8c0100" style="color:white; font-size: 16px;">
        
                           <th height="40">NAME</th>  
                               <th>ROLL NO</th>
                               <th>DEPARTMENT</th>
                               <th>YEAR</th>
                               <th>SUBJECT</th>
                               <th>LAB NO</th>
                               <th>PC NO</th>
                               <th>DATE</th>
                               <th>TIME</th>
                        </thead>
      <tbody>
                          <?php while($row = mysqli_fetch_array($search_result)):?>
                              
                   <tr bgcolor="#ef8b8b"  style="font-size: 15px;">
                              <td height="28"><?php echo $Name=$row['Name']; ?></td>
                              <td><?php echo $RollNo=$row['RollNo']; ?></td>
                              <td><?php echo $Department=$row['Department']; ?></td>
                              <td><?php echo $Year=$row['Year']; ?></td>
                              <td><?php echo $SUBJECT=$row['SUBJECT']; ?></td>
                              <td><?php echo $LABNO=$row['LABNO']; ?></td>
                              <td><?php echo $PCNO=$row['PCNO']; ?></td>
                              <td><?php echo $date=$row['DATE']; ?></td>
                              <td><?php echo $time=$row['TIME']; ?></td>
                   </tr>
                 <?php endwhile;?>
           </tbody>
    </table>
        </form>
        </div>
  
    </body>
</html>