<?php
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
     <a href="http://localhost/event/front1.php" class="w3-button w3-bar-item">Log Out</a>
     <a href="http://localhost/event/manager_edit.php" class="w3-button w3-bar-item">Update Customer Data</a>
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


<?php /*
if(isset($_POST['insert']))
{
$cid=$_POST['cid'];
$cname=$_POST['cname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$usern=$_POST['usrn'];
$password=$_POST['password'];
$address=$_POST['address'];
$eventid=$_POST['event_id'];

$insertc1query="INSERT INTO customer1 VALUES('$cid','$cname','$email','$usern','$password','$address','$eventid');";
mysqli_query($conn,$insertc1query);
$insertc2query="INSERT INTO customer2 VALUES('$cid',$phone);";
mysqli_query($conn,$insertc2query);


} */
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
  
<h2>All Events</h2>

<?php /*
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
}*/
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
 
 
  <h2> Venues </h2>
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
  
  
  <h2> Managers </h2>
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


<h2>Entertainment</h2>
<table>
  <tr>
    <th>Performer ID</th>
    <th>Performer Name</th>
    <th>Performance Type</th>
    <th>Charges </th>
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

<h2> Photography</h2>
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


<h2> Transportion </h2>
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
  echo "<td>" . $row['travel_charges'] . "</td> ";
  echo "<td>" . $row['no._of_seats'] . "</td> ";
  echo "<td>" . $row['v_name'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
  ?>
  </table> 
  
<h2> Decoration Team </h2>
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
  
<h2> Catering </h2>
<table>
  <tr>
    <th>Team ID</th>
    <th>Team Name</th>
    <th>Email</th>
    <th>Food Type</th>
    <th>Number of plates</th>
    <th>Cost</th>
    
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
  echo "<td>" . $food['f_type'] . "</td> ";
  echo "<td>" . $row['plates_number'] . "</td> ";
  echo "<td>" . $food['cost']*$row['plates_number'] . "</td> ";
  echo "<td>" . $row['emp_id'] . "</td> ";
  echo "</tr>";
  }
?>
  </table> 
</body>
</html>
