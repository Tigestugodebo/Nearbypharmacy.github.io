<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pharmacy");  
if($conn->connect_error)die("Database connection failed" . $conn->connect_error);

/*if (isset($_GET['id'])) {
  $id = $_GET['id']; 
  //echo $id;
 }*/

if (isset($_SESSION['id'])) {
     $id = $_SESSION['id'];
}
if (isset($_GET['id'])) {
    $medicine = $_GET['id']; 
   // echo $medicine;
    }


$signal="";
if(isset($_SESSION["flag"])){
?>

<!DOCTYPE html>
<html>
<head>

<style>
body {font-family: "Lato",sans-serif;}

.topnav {
  overflow: hidden;
  background-color: #858778;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 11px;
  text-decoration: none;
  font-size: 16px;
  width : 165px;
}

.topnav a:hover {
  background-color: #a7b7a8;
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


/*  ///////////////////////      box column   ///////////////////////////////// */ 

* {
    box-sizing: border-box;
}

.col-container {
    display: table;
    width: 100%;
  font-weight: bold;
  padding:auto;
}
.col {
    display: table-cell;
    padding: 15px;
  font-weight: bold;
  width: 60%;
}
@media only screen and (max-width: 600px) {
    .col { 
        display: block;
         width: 100%;
    }
}
.img{
  height: 300px;
  width : 300px;
}

/* /////////////////////////////  table  //////////////////////////// */

table {
    width:100%;
}
table, th, td {

    border: 1px solid black;
    border-collapse: collapse;
}
th{
    padding: 6px;
    text-align: center;
}
td{
    padding: 8px;
    text-align: left;
}

table#t01 th {
    background-color: #858778;
    color: white;
}

input[type=text], select, textarea {
    width: 10%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}

input[type=submit] {
    background-color: #858778;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #a7b7a8;
}
</style>
</head>
<body>

  <?php 
    $conn = new mysqli("localhost", "root", "", "pharmacy");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    
    foreach($conn->query('SELECT * from location') as $row){    
             if($row['pharmacy_id'] == $id) 
             $pharmacy_name = $row['name'];
      }
?>

<h1 align="center" style="color:#131413"> <b> <?php echo $pharmacy_name; ?></b> </h1>
<div class="topnav" id="myTopnav">

 <a href="admin.php?id=<?php echo $id ?>"><span><b> PHARMACY </b></span></a>
  <a href="medicine_list.php?id=<?php echo $id ?>"><span><b>MEDICINE LIST</b></span></a>
  
  
   <a href="user_logout.php"><span><b>LOG OUT</b></span></a> 
  
</div>
  
  
   


        </table>
    </div>
        <br>
        <br>
        
    
</body>

</html>


