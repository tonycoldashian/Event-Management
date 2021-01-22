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
  text-align: center;
  padding: 20px;
}
</style>
</head>
<body>
<style>
    { margin: 0; padding: 0; }

    html { 
        background: url('images/boque.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
    <?php
   $usernamequery = "select c_name from customer1 where c_username ='$u'; ";
   $username = mysqli_query($conn,$usernamequery);
   $element = mysqli_fetch_array($username);
   echo 'Hello '; echo $element["c_name"]; 
   
?>
<h3>EVENT DETAILS</h3>
<table><?php
   $query = "select * from event where event_id=(select event_id from customer1 where c_username ='$u');";
   $results = mysqli_query($conn,$query);
   $i=0;
   while($row = mysqli_fetch_array($results)) {
   ?>
   <tr>
       <th>Event ID</th>
       <th>Date</th>
       <th>Time</th>
       <th>Event Type</th>
       <th>Total Budget</th>
   </tr>
   <tr>
       <td> <?php echo $row["event_id"]; ?></td> 
       <td><?php echo $row["event_date"]; ?></td> 
       <td><?php echo $row["event_time"]; ?></td> 
       <td><?php echo $row["event_type"]; ?></td> 
       <td><?php echo $row["event_budget"]; ?></td>
   </tr>
   <?php
   $i++;
}
?>
</table>
<br><br>
<h3>VENUE</h3>
<table>
<?php  
$query = "select * from venue where v_id =(select venue_id from event where event_id=(select event_id from customer1 where c_username ='$u'));";
$results = mysqli_query($conn,$query);
$i=0;
while($row = mysqli_fetch_array($results)) {
?>
<tr>
    <th>Venue ID</th>
    <th>Venue Name</th>
    <th>Capacity</th>
    <th>Address</th>
    <th>Rent</th>
</tr>
<tr>
   <td><?php echo $row["v_id"]; ?></td> 
   <td><?php echo $row["v_name"]; ?></td> 
   <td><?php echo $row["capacity"]; ?></td>
   <td><?php echo $row["v_add"]; ?></td> 
   <td><?php echo $row["v_rent"]; ?></td> 
</tr>
<?php
$i++;
}
?>
</table>
<br><br>
<h3>VENUE ADDRESS</h3>
<table>
   <?php
   $query = "select * from venueaddress where v_id2 =( select v_id from venue where v_id =(select venue_id from event where event_id=(select event_id from customer1 where c_username ='$u')));";
   $results = mysqli_query($conn,$query);
   $i=0;
   while($row = mysqli_fetch_array($results)) {
   ?>
   <tr> 
      <th>Venue ID</th>
      <th>Pincode</th>
      <th>City</th>
      <th>State</th>
   </tr>
   <tr>  
      <td><?php echo $row["v_id2"]; ?></td> 
      <td><?php echo $row["pincode"]; ?></td>
      <td><?php echo $row["city"]; ?></td> 
      <td><?php echo $row["state"]; ?></td> 
   </tr>
   <?php
   $i++;
 }
 ?>
</table>
<br><br>
<h3>PHOTOGRAPHY</h3>
<table>
    <?php
    $query = "select * from photography where emp_id=(select emp_id from event where event_id=(select event_id from customer1 where c_username ='$u'));"
    ;
    $results = mysqli_query($conn,$query);
    $i=0;
    while($row = mysqli_fetch_array($results)) {
    ?>
    <tr> 
        <th>Photographer ID</th>
        <th>Photographer Name</th>
        <th>Photographer Email</th>
        <th>Charges</th>
        </tr>
        <tr> 
       <td><?php echo $row["p_id"]; ?></td>
       <td><?php echo $row["p_name"]; ?></td> 
       <td><?php echo $row["p_mail_id"]; ?></td> 
       <td><?php echo $row["p_charges"]; ?></td> 
    </tr>
    <?php
    $i++;
 }
 ?>
</table>
<br><br>
<h3>ENTERTAINMENT</h3>
<table>
   <?php
   $query = "select * from entertainment where emp_id=(select emp_id from event where event_id=(select event_id from customer1 where c_username='$u'));";
    $results = mysqli_query($conn,$query);
    $i=0;
    while($row = mysqli_fetch_array($results)) 
    {
    ?>
    <tr>
      <th>Performer ID </th>      
      <th>Performer Name</th>
       <th>Performance Type</th>
       <th>Pay</th>
       </tr>
       <tr> 
       <td><?php echo $row["per_id"]; ?></td> 
       <td><?php echo $row["per_fname"]; ?></td> 
       <td><?php echo $row["per_type"]; ?></td> 
       <td><?php echo $row["per_salary"]; ?></td> 
    </tr>
    <?php
    $i++;
   }
 ?>
 </table>
 <br><br>
 <h3>CATERING</h3>
 <table>
    <?php
    $query = "select * from caterers where emp_id=(select emp_id from event where event_id=(select event_id from customer1 where c_username ='$u'));"
    ;
    $results = mysqli_query($conn,$query);
    $i=0;
    while($row = mysqli_fetch_array($results)) {
    ?>
    <tr>
        <th>Catering ID</th>
        <th>Catering Name</th>
        <th>Email</th>
        </tr>
        <tr>   
       <td><?php echo $row["cat_id"]; ?></td> 
       <td><?php echo $row["cat_name"]; ?></td> 
       <td><?php echo $row["cat_mail_id"]; ?></td>
    </tr>
    <?php
    $i++;
 }
 ?>
 </table>
 <br><br>
 <h3>DECORATION</h3>
<table>
 <?php
 $query = "select * from decoration where emp_id=(select emp_id from event where event_id=(select event_id from customer1 where c_username ='$u'));"
 ;
 $results = mysqli_query($conn,$query);
 $i=0;
 while($row = mysqli_fetch_array($results)) {
 ?>
 <tr>
    <th>Decoration</th>
    <th>Team Name</th>
    <th>Email</th>
    <th>Charges</th>
    </tr>
    <tr>
    <td><?php echo $row["dec_id"]; ?></td> 
    <td><?php echo $row["dec_name"]; ?></td> 
    <td><?php echo $row["dec_email"]; ?></td> 
    <td><?php echo $row["charge"]; ?></td> 
 </tr>
 <?php
 $i++;
}
?>
</table>
<br><br>
<h3>TRANSPORTATION</h3>
<table>
    <?php
    $query = "select * from transportation where emp_id=(select emp_id from event where event_id=(select event_id from customer1 where c_username ='$u'));"
    ;
    $results = mysqli_query($conn,$query);
    $i=0;
    while($row = mysqli_fetch_array($results)) {
    ?>
    <tr>
    <th>Cost/K.M</th>
    <th>No of Seats</th>
    <th>Agency Name</th>
    </tr>
    <tr>
    <td><?php echo $row["cost_per_km"]; ?></td> 
    <td><?php echo $row["no._of_seats"]; ?></td> 
    <td><?php echo $row["v_name"]; ?></td> 
 
    </tr>
    <?php
    $i++;
 }
 ?> 
</table>
<br><br>
</body>
</html>