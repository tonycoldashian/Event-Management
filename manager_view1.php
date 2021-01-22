<?php  // input fields for all tables without css
include("login.php");
session_start();
$u= $_SESSION['username']

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
    <nav class="w3-bar w3-black">
     <a href="http://localhost/event/front1.html" class="w3-button w3-bar-item">Log Out</a>
     <a href="http://localhost/event/about.html" class="w3-button w3-bar-item">About Us</a>
    </nav>
    <section class="w3-container w3-center w3-content" style="max-width:600px">
    <b> <h1>GAMA EVENTS</h1></b>
    <title>Details</title>

<style>
table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}
</style>
</head>
<body >
<style>
    { margin: 0; padding: 0; }

    html { 
        background: url('images/leaves.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<form action="manager_view.php" method="POST">
<h2>Customers</h2>


<?php
if(isset($_POST['insertcu']))
{
$cid=$_POST['cid'];
$cname=$_POST['cname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$usern=$_POST['usrn'];
$password=$_POST['password'];
$address=$_POST['address'];
$eventid=$_POST['eventid'];

$insertc1query="INSERT INTO customer1 VALUES('$cid','$cname','$email','$usern','$password','$address','$eventid');";
mysqli_query($conn,$insertc1query);
$insertc2query="INSERT INTO customer2 VALUES('$cid',$phone);";
mysqli_query($conn,$insertc2query);
}
?>


<table>
  <tr>
    <th>Customer ID</th>
    <th>Customer Name</th>
    <th>Email </th>
    <th>Address </th>
    <th>Event ID</th>
    <th>Phone No.</th>
  </tr>
  <?php
   $query = "select * from customer1;";
   $phoneq = "select * from customer2;";
   $results = mysqli_query($conn,$query);
   $phoneqresults = mysqli_query($conn,$phoneq);
   $i=0;
   
  while($row = mysqli_fetch_array($results) and $phone = mysqli_fetch_array($phoneqresults))
  { 
  echo "<tr>";
  echo "<td>" . $row['c_id'] . "</td> ";
  echo "<td>" . $row['c_name'] . "</td> ";
  echo "<td>" . $row['c_mail_id'] . "</td> ";
  echo "<td>" . $row['address'] . "</td> ";
  echo "<td>" . $row['event_id'] . "</td> ";
  echo "<td>" . $phone['c_phone'] . "</td> ";
  echo "</tr>";
  }
  ?>
  </table>
  <div class="container">
 <label for="uname"><b>Customer ID</b></label>
 <input type="text" placeholder="Customer ID" name="cid" >
 <br> 
 <label for="psw"><b>Customer Name</b></label>
 <input type="text" placeholder="Name" name="cname" >
 <br>
 <label for="psw"><b>Email</b></label>
 <input type="text" placeholder="Email" name="email" >
 <br>
 <label for="psw"><b>Phone Number</b></label>
 <input type="text" placeholder="Phone" name="phone" >
 <br>
 <label for="psw"><b>User Name</b></label>
 <input type="text" placeholder="username" name="usrn" >
 <br>
 <label for="psw"><b>Password</b></label>
 <input type="password" placeholder="Password" name="password" >
 <br>
 <label for="psw"><b>Address</b></label>
 <input type="text" placeholder="Address" name="address" >
 <br>
 <label for="psw"><b>Event ID</b></label>
 <input type="text" placeholder="Event ID" name="eventid" >
 <br>

 <input type='submit' name='insertcu' value='Insert'>




 <h2>All Events</h2>


<?php
if(isset($_POST['insertevent']))
{
$eid=$_POST['eventid'];
$edate=$_POST['date'];
$etime=$_POST['time'];
$etype=$_POST['type'];
$ebudget=$_POST['budget'];
$venueid=$_POST['venueid'];
$empid=$_POST['empid'];

$insertc1query="INSERT INTO event VALUES('$eid','$edate','$etime','$etype','$ebudget','$venueid','$empid');";
mysqli_query($conn,$insertc1query);
}
?>
<table>
  <tr>
    <th>Event ID</th>
    <th>Event Date</th>
    <th>Time </th>
    <th>Event Type </th>
    <th>Event Budget</th>
    <th>Venue ID</th>
    <th>Assigned Employee ID </th>
  </tr>
  <?php
   $query = "select * from event;";
   $results = mysqli_query($conn,$query);
   
   $i=0;
   
  while($row = mysqli_fetch_array($results))
  { 
  echo "<tr>";
  echo "<td>" . $row['event_id'] . "</td> ";
  echo "<td>" . $row['event_date'] . "</td> ";
  echo "<td>" . $row['event_time'] . "</td> ";
  echo "<td>" . $row['event_type'] . "</td> ";
  echo "<td>" . $row['event_budget'] . "</td> ";
  echo "<td>" . $row['venue_id'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
  ?>
  </table>
  <div class="container">
 <label for="eventid"><b>Event ID</b></label>
 <input type="text" placeholder="Event ID" name="eventid" >
 <br> 
 <label for="date"><b>Event Date</b></label>
 <input type="text" placeholder="Event Date" name="date" >
 <br>
 <label for="time"><b>Event Time</b></label>
 <input type="text" placeholder="Event Time" name="time" >
 <br>
 <label for="type"><b>Event Type</b></label>
 <input type="text" placeholder="Event type" name="type" >
 <br>
 <label for="venueid"><b>Venue ID</b></label>
 <input type="text" placeholder="Venue ID" name="venueid" >
 <br>

 <label for="empid"><b>Employment ID</b></label>
 <input type="text" placeholder="Employment ID" name="empid" >
 <br>
 <input type='submit' name='insertevent' value='Insert'>

 <form action="manager_view.php" method="POST">


 <h2>Venue</h2>


<?php
if(isset($_POST['insertvenue']))
{
$vid=$_POST['vid'];
$vname=$_POST['vname'];
$capacity=$_POST['capacity'];
$vadd=$_POST['vadd'];
$vrent=$_POST['rent'];
$pincode=$_POST['pincode'];
$city=$_POST['city'];
$state=$_POST['state'];

$insertc1query="INSERT INTO venueaddress VALUES('$vid','$vname','$capacity','$vadd','$vrent');";
$insertintovenueadd =$insertc1query="INSERT INTO venueaddress VALUES('$pincode','$city','$state');";
mysqli_query($conn,$insertc1query);
mysqli_query($conn,$insertintovenueadd);
}
?>
<table>
  <tr>
    <th>Venue ID</th>
    <th>Venue Name</th>
    <th>Capacity</th>
    <th>Address</th>
    <th>Rent</th>
    <th>Pincode</th>
    <th>City</th>
    <th>State</th>
  </tr>
  <?php
   $query = "select * from venue;";
   $addrquery = "select * from venueaddress;";
   $results = mysqli_query($conn,$query);
   $fresults = mysqli_query($conn,$addrquery);
   $i=0;
   
  while($row = mysqli_fetch_array($results) and $addr =mysqli_fetch_array($fresults))
  { 
  echo "<tr>";
  echo "<td>" . $row['v_id'] . "</td> ";
  echo "<td>" . $row['v_name'] . "</td> ";
  echo "<td>" . $row['capacity'] . "</td> ";
  echo "<td>" . $row['v_add'] . "</td> ";
  echo "<td>" . $row['v_rent'] . "</td> ";
  echo "<td>" . $addr['pincode'] . "</td> ";
  echo "<td>" . $addr['city'] . "</td> ";
  echo "<td>" . $addr['state'] . "</td> ";
  echo "</tr>";
  }
  ?>
  </table>
  <div class="container">
 <label for="uname"><b>Venue ID</b></label>
 <input type="text" placeholder="Venue ID" name="vid" >
 <br> 
 <label for="psw"><b>Venue Name</b></label>
 <input type="text" placeholder="Name" name="vname" >
 <br>
 <label for="psw"><b>Capacity</b></label>
 <input type="text" placeholder="Capacity" name="capacity" >
 <br>
 <label for="psw"><b>Venue address</b></label>
 <input type="text" placeholder="Address" name="vadd" >
 <br>
 <label for="psw"><b>Venue Rent</b></label>
 <input type="text" placeholder="Rent" name="rent" >
 <br>
 <label for="psw"><b>Pincode</b></label>
 <input type="text" placeholder="Pincode" name="pincode" >
 <br>
 <label for="psw"><b>City</b></label>
 <input type="text" placeholder="City" name="city" >
 <br>
 <label for="psw"><b>State</b></label>
 <input type="text" placeholder="State" name="state" >
 <br>
 <input type='submit' name='insertvenue' value='Insert'>
 
 <form action="manager_view.php" method="POST">



<!--
<?php/*
if(isset($_POST['insertemp']))
{
$empid=$_POST['emp_id'];
$empname=$_POST['empname'];
$mailid=$_POST['mailid'];
$salary=$_POST['salary'];
$department=$_POST['dept'];
$insertc1query="INSERT INTO manager VALUES('$empid','$department','$empname','$mailid','$salary');";
mysqli_query($conn,$insertc1query);
} */?>
 -->
<h2>Managers</h2> 
<table>
  <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Email</th>
    <th>Salary</th>
    <th>Department</th>
  </tr>
  <?php
   $query = "select * from employees;";
   $addrquery = "select * from managers;";
   $results = mysqli_query($conn,$query);
   $fresults = mysqli_query($conn,$addrquery);
   $i=0;
   
  while($row = mysqli_fetch_array($results) and $addr =mysqli_fetch_array($fresults))
  { 
  echo "<tr>";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "<td>" . $row['emp_name'] . "</td> ";
  echo "<td>" . $row['emp_mailid'] . "</td> ";
  echo "<td>" . $row['emp_salary'] . "</td> ";
  echo "<td>" . $addr['department'] . "</td> ";
  echo "</tr>";
  }
  ?>
 </table> 
  <!--
  </table>
  <div class="container">
 <label for="uname"><b>Employee ID</b></label>
 <input type="text" placeholder="empid" name="emp_id" >
 <br> 
 <label for="psw"><b> Name</b></label>
 <input type="text" placeholder="Name" name="empname" >
 <br>
 <label for="psw"><b>MailID</b></label>
 <input type="text" placeholder="mailid" name="mailid" >
 <br>
 <label for="psw"><b>Department</b></label>
 <input type="text" placeholder="Department" name="department" >
 <br>
 <label for="psw"><b>Salary</b></label>
 <input type="text" placeholder="Salary" name="salary" >
 <br>
 <input type='submit' name='insertemp' value='Insert'>
-->
  
 <h2>Entertainment</h2>


<?php
if(isset($_POST['insertentert']))
{
$perid=$_POST['per_id'];
$pername=$_POST['pername'];
$pertype=$_POST['pertype'];
$salary=$_POST['salary'];
$empid=$_POST['empid'];

$insertc1query="INSERT INTO entertainment VALUES('$perid','$pername','$pertype','$salary','$empid');";
mysqli_query($conn,$insertc1query);
}
?>
<table>
  <tr>
    <th>Performer ID</th>
    <th>Performer Name</th>
    <th>Performance Type</th>
    <th>Salary </th>
    <th>Assigned Employee ID </th>
  </tr>
  <?php
   $query = "select * from entertainment;";
   $results = mysqli_query($conn,$query);
   $i=0;
   
  while($row = mysqli_fetch_array($results))
  { 
  echo "<tr>";
  echo "<td>" . $row['per_id'] . "</td> ";
  echo "<td>" . $row['per_fname'] . "</td> ";
  echo "<td>" . $row['per_type'] . "</td> ";
  echo "<td>" . $row['per_salary'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
  ?>
</table>
<div class="container">
 <label for="uname"><b>Performer ID</b></label>
 <input type="text" placeholder="Performer ID" name="per_id" >
 <br> 
 <label for="psw"><b>Performer Name</b></label>
 <input type="text" placeholder="Name" name="pername" >
 <br>
 <label for="psw"><b>Performer Type</b></label>
 <input type="text" placeholder="Type" name="pertype" >
 <br>
 <label for="psw"><b>Performer Salary</b></label>
 <input type="text" placeholder="Salary" name="salary" >
 <br>
 <label for="psw"><b>Employment ID</b></label>
 <input type="text" placeholder="Employment ID" name="empid" >
 <br>
 <input type='submit' name='insertentert' value='Insert'>

 <form action="manager_view.php" method="POST">

 
 <h2>Photographer</h2>


 <?php
if(isset($_POST['insertphoto']))
{
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$pmailid=$_POST['pmailid'];
$salary=$_POST['salary'];
$empid=$_POST['empid'];

$insertc1query="INSERT INTO photography VALUES('$pid','$pname','$pmailid','$salary','$empid');";
mysqli_query($conn,$insertc1query);
}
?>
<table>
  <tr>
    <th>Photographer ID</th>
    <th>Photographer Name</th>
    <th>Email</th>
    <th>Charges </th>
    <th>Assigned Employee ID </th>
  </tr>
  <?php
   $query = "select * from photography;";
   $results = mysqli_query($conn,$query);
   $i=0;
   
  while($row = mysqli_fetch_array($results))
  { 
  echo "<tr>";
  echo "<td>" . $row['p_id'] . "</td> ";
  echo "<td>" . $row['p_name'] . "</td> ";
  echo "<td>" . $row['p_mail_id'] . "</td> ";
  echo "<td>" . $row['p_charges'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
  ?>
  </table>
  <div class="container">
 <label for="uname"><b>Photographer ID</b></label>
 <input type="text" placeholder="Photographer ID" name="pid" >
 <br> 
 <label for="psw"><b>Photographer Name</b></label>
 <input type="text" placeholder="Name" name="pname" >
 <br>
 <label for="psw"><b>mailid</b></label>
 <input type="text" placeholder="mailid" name="pmailid" >
 <br>
 <label for="psw"><b>Performer Salary</b></label>
 <input type="text" placeholder="Salary" name="salary" >
 <br>
 <label for="psw"><b>Employment ID</b></label>
 <input type="text" placeholder="Employment ID" name="empid" >
 <br>
 <input type='submit' name='insertphoto' value='Insert'>

 <form action="manager_view.php" method="POST">
 <h2>Transportation</h2>


<?php
if(isset($_POST['inserttransporters']))
{
$cost_per_km=$_POST['cost_km'];
$seats=$_POST['no_of_seats'];
$vname=$_POST['vname'];
$empid=$_POST['empid'];

$insertc1query="INSERT INTO transportation VALUES('$cost_per_km','$seats','$vname','$empid');";
mysqli_query($conn,$insertc1query);
}
?>
<table>
  <tr>
    <th>Cost Per K.M</th>
    <th>No.of Seats</th>
    <th>Agency Name</th>
    <th>Assigned Employee ID </th>
  </tr>
  <?php
   $query = "select * from transportation;";
   $results = mysqli_query($conn,$query);
   $i=0;
   
  while($row = mysqli_fetch_array($results))
  { 
  echo "<tr>";
  echo "<td>" . $row['cost_per_km'] . "</td> ";
  echo "<td>" . $row['no._of_seats'] . "</td> ";
  echo "<td>" . $row['v_name'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
  ?>
  </table> 
  
 <div class="container">
 <label for="uname"><b>Cost per KM</b></label>
 <input type="text" placeholder="cost/km" name="cost/km" >
 <br> 
 <label for="psw"><b> No of seats</b></label>
 <input type="text" placeholder="No of seats" name="no_of_seats" >
 <br>
 <label for="psw"><b>Vehicle name</b></label>
 <input type="text" placeholder="vehicle name" name="vname" >
 <br>
 <label for="psw"><b>Employment ID</b></label>
 <input type="text" placeholder="Employment ID" name="empid" >
 <br>
 <input type='submit' name='inserttransporters' value='Insert Transporters'>
  
 <form action="manager_view.php" method="POST">
 <h2>Decoration team</h2>


<?php
if(isset($_POST['insertdecorators']))
{
$decid=$_POST['decid'];
$decname=$_POST['decname'];
$email=$_POST['emailid'];
$charge=$_POST['charge'];
$empid=$_POST['empid'];

$insertc1query="INSERT INTO decoration VALUES('$decid','$decname','$email','$charge','$empid');";
mysqli_query($conn,$insertc1query);
$insertc1query="INSERT INTO food VALUES('$type','$cost','$empid');";
mysqli_query($conn,$insertc1query);

}
?>
<table>
  <tr>
    <th>Team ID</th>
    <th>Team Name</th>
    <th>Email</th>
    <th>charge</th>
    <th>Assigned Employee ID </th>
  </tr>
  <?php
   $query = "select * from decoration;";
   $results = mysqli_query($conn,$query);
   $i=0;
   
  while($row = mysqli_fetch_array($results))
  { 
  echo "<tr>";
  echo "<td>" . $row['dec_id'] . "</td> ";
  echo "<td>" . $row['dec_name'] . "</td> ";
  echo "<td>" . $row['dec_email'] . "</td> ";
  echo "<td>" . $row['charge'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
?>
</table> 
<div class="container">
 <label for="uname"><b>Team ID</b></label>
 <input type="text" placeholder="Team ID" name="decid" >
 <br> 
 <label for="psw"><b> Team name</b></label>
 <input type="text" placeholder="Name" name="decname" >
 <br>
 <label for="psw"><b>EmailID</b></label>
 <input type="text" placeholder="Email ID" name="emailid" >
 <br>
 <label for="psw"><b>Charge</b></label>
 <input type="text" placeholder="Charge" name="charge" >
 <br>
 <label for="psw"><b>Employment ID</b></label>
 <input type="text" placeholder="Employment ID" name="empid" >
 <br>
 <input type='submit' name='insertdecorators' value='Insert Decorators'>
  
 <form action="manager_view.php" method="POST">
 <h2>Catering</h2>


<?php
if(isset($_POST['insertcaterers']))
{
$catid=$_POST['catid'];
$catname=$_POST['catname'];
$email=$_POST['emailid'];
$cost=$_POST['cost'];
$type=$_POST['type'];
$empid=$_POST['empid'];

$insertc1query="INSERT INTO catering VALUES('$catid','$catname','$email','$empid');";
mysqli_query($conn,$insertc1query);
$insertc2query="INSERT INTO food VALUES('$type','$cost','$empid');";
mysqli_query($conn,$insertc2query);
}
?>
<table>
  <tr>
    <th>Catering ID</th>
    <th>Catering Name</th>
    <th>Email</th>
    <th>Cost</th>
    <th>Food Type</th>
    <th>Assigned Employee ID </th>
  </tr>
  <?php
   $query = "select * from caterers;";
   $foodquery = "select * from food;";
   $results = mysqli_query($conn,$query);
   $fresults = mysqli_query($conn,$foodquery);
   $i=0;
   
  while($row = mysqli_fetch_array($results) and $food =mysqli_fetch_array($fresults))
  { 
  echo "<tr>";
  echo "<td>" . $row['cat_id'] . "</td> ";
  echo "<td>" . $row['cat_name'] . "</td> ";
  echo "<td>" . $row['cat_mail_id'] . "</td> ";
  echo "<td>" . $food['cost'] . "</td> ";
  echo "<td>" . $food['f_type'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
?>
  </table> 
  <div class="container">
 <label for="uname"><b>Catering ID</b></label>
 <input type="text" placeholder="Catering ID" name="catid" >
 <br> 
 <label for="psw"><b> Catering name</b></label>
 <input type="text" placeholder="Name" name="catname" >
 <br>
 <label for="psw"><b>EmailID</b></label>
 <input type="text" placeholder="Email ID" name="emailid" >
 <br>
 <label for="psw"><b>Cost</b></label>
 <input type="text" placeholder="Cost" name="cost" >
 <br>
 <label for="psw"><b>Food Type</b></label>
 <input type="text" placeholder="Type" name="type" >
 <br>
 <label for="psw"><b>Employment ID</b></label>
 <input type="text" placeholder="Employment ID" name="empid" >
 <br>
 <input type='submit' name='insertcaterers' value='Insert Caterers'>
  
</body>
</html>
