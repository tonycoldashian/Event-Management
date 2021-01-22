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
<link rel="stylesheet" href="style.css">

<body>
<nav class="w3-bar w3-black">
    <a href="http://localhost/event/manager_view.php" class="w3-button w3-bar-item">View All  Tables</a>
    <a href="http://localhost/event/about.html" class="w3-button w3-bar-item">About Us</a>
    <a href="http://localhost/event/front1.php" class="w3-button w3-bar-item">Log Out</a>
</nav>
<section class="w3-container w3-center w3-content" style="max-width:600px">
    <b> <h1>GAMA EVENTS</h1></b>
</section>
<div class="container">


<form action="manager_edit.php">
<?php

if(isset($_POST['insertenterdetails']))  //event details updation
{

$perfid = $emp_id =$_POST['perid'];
$perfname = $emp_id =$_POST['pername'];
$perftype = $emp_id =$_POST['type'];
$perfpay= $emp_id =$_POST['perfpay'];
$emp_id =$_POST['employee'];

$insertintoenter = "INSERT INTO entertainment VALUES('$perfid','$perfname','$perftype','$perfpay','$emp_id');";
mysqli_query($conn,$insertintoenter);
}

if(isset($_POST['insertphotodetails'])) // photo update
{

$pid=$_POST['pid'];
$pname=$_POST['studio'];
$pmailid=$_POST['pmailid'];
$photocharge=$_POST['photocharge'];
$empid=$_POST['employee'];

$insertintophoto = "INSERT INTO photography VALUES('$pid','$pname','$pmailid','$photocharge','$empid');";
mysqli_query($conn,$insertintophoto);
}

if(isset($_POST['inserttransportdetails'])) // transport update
{

$travel_charges=$_POST['transportcost'];
$seats=$_POST['no_of_seats'];
$vname=$_POST['agency'];
$empid=$_POST['employee'];

$insertintotravel = "INSERT INTO transportation VALUES('$travel_charges','$seats','$vname','$empid');";
mysqli_query($conn,$insertintotravel);
}

if(isset($_POST['insertdecordetails']))   //decor update
{

$decid=$_POST['decid'];
$decname=$_POST['decname'];
$email=$_POST['decemail'];
$deccharge=$_POST['deccharge'];
$empid=$_POST['employee'];

$insertintodec = "INSERT INTO decoration VALUES('$decid','$decname','$email','$deccharge','$empid');";
mysqli_query($conn,$insertintodec);
}
if(isset($_POST['insertcaterdetails']))         //cater update
{

$catid=$_POST['catid'];
$catname=$_POST['catname'];
$email=$_POST['emailid'];
$empid=$_POST['empid'];
$numofplates=$_POST['plates'];
$type=$_POST['ftype'];
$catcost=$_POST['costfortype'];
$totalfoodcost = $numofplates * $catcost;

$insertintocater = "INSERT INTO caterers VALUES('$catid','$catname','$email','$empid','$numofplates');";
$insertintofood = "INSERT INTO food VALUES('$type','$cost','$catid');";

mysqli_query($conn,$insertintocater);
mysqli_query($conn,$insertintofood);
}

if(isset($_POST['inserteventdetails']))    // event update and budget calculation
{

$event_id =$_POST['eventid'];
$event_date =$_POST['date'];
$new_date = date("Y-m-d",strtotime($event_date));
echo $new_date;
$event_time =$_POST['time'];
$event_type =$_POST['type'];  // remeber to use this last with budget
$venue_id = $_POST['venueid'];
$emp_id =$_POST['employee'];
$query = "select v_rent from venue where v_id = (select venue_id from event where event_id = '$event_id');";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_row($result);
$venue_rent = $row[4];
$total_budget =$perfpay  +$venue_rent + $photocharge + $travel_charges + $deccharge + $totalfoodcost;

$insertintoevents = "INSERT INTO events VALUES('$event_id','$new_date','$event_time','$event_type','$total_budget','$venue_id','$emp_id');";
mysqli_query($conn,$insertintoevents);
echo "inserted";
}
?>


 <h3>Event</h3>
<div class="container">
<label for="event">Event ID</label>
<input type="text" placeholder="ID" name="eventid" id="id" required>
<br>
<label for="Event Type">Type</label>
<select id="type" name="type">
    <option value="Bithday">Birthday</option>
    <option value="Wedding">Wedding</option>
    <option value="Corporate">Corporate</option>
    <option value="Reunion">Reunion</option>
</select>
<br>
<label for="date">Date</label>
<input type="date" id="date" name="date">
<br>
<label for="time">time</label>
<input type="time" id="time" name="time">
<br>
<label for="venue">Venue ID</label>
<input type="text" placeholder=" Venue ID" name="venueid" id="id" required>
<br>
<label for="Employee ID">Employee ID</label>
<select id="employee" name="employee">
    <option value="e1">e1</option>
    <option value="e2">e2</option>
    <option value="e3">e3</option>
                                    
</select>

<button type="submit" class="registerbtn" name="inserteventdetails">Insert Event Fields</button>
<br>

<h3>Entertainment</h3>
<label for="enter">performer ID</label>
<input type="text" placeholder="performer ID" name="perid" id="id" >
<br>
<label for="enter">performer Name</label>
<input type="text" placeholder="performer name" name="pername" id="id" >
<br>
<label for="pertype">Performer Type</label>
<select id="type" name="type">
    <option value="singer ">singer</option>
    <option value="dancer">dancer</option>
    <option value="stand up">stand up</option>
    <option value="clown">clown</option>
</select>
<input type="text" placeholder="charges" name="perfpay" id="pay" >
<br>

<button type="submit" class="registerbtn" name="insertentertaindetails">Insert Entertainment Fields</button>
<br>
<h3>Photography</h3>
<label for="event">photographer ID</label>
<input type="text" placeholder="ID" name="pid" id="id" >
<br>

<label for="studio Name">Studio Name</label>
<select id="studio" name="studio">
    <option value="carbon ">Carbon Studios</option>
    <option value="chromium">Chromium Digital</option>
    <option value="shutter">Shutter Magic</option>
    </select>
<br>
<label for="email">Email</label>
<select id="email" name="pemailid">
    <option value="carbonmail@domain.com ">carbonmail@domain.com</option>
    <option value="chromiummail@domain.com">chromiummail@domain.com</option>
    <option value="shuttermail@domain.com">shuttermail@domain.com </option>
    </select>
<br>
<label for="charge">Charge</label>
<select id="charge" name="photocharge">
    <option value="2000">2000</option>
    <option value="1500">1500</option>
    <option value="1700">1700</option>
    </select>
<br>
<button type="submit" class="registerbtn" name="insertphotodetails">Insert Photography Fields</button>

<h3>Transport</h3>
<label for="name">Transport</label>
<select id="agency" name="agency">
    <option value="Nisha">Nisha Travel</option>
    <option value="rapid">Rapid Transit</option>
    <option value="van ">Vann Damit</option>
    </select>
    <br>
    <label for="no_of_seats">No of Seats</label>
    <select id="no_of_seats" name="no_of_seats">
    <option value="20">20</option>
    <option value="50">35</option>
    <option value="50 ">50</option>
    </select>
    <br>
    <label for="cost">cost</label>
    <input type="text" placeholder="cost" name="transportcost"  >
<br>
<button type="submit" class="registerbtn" name="inserttransportindetails">Insert Transport Fields</button>

<h3>Decoration</h3>
<label for="Decoration ID">Decoration ID</label>
<input type="text" placeholder="Decoration ID" name="decid"  >
<br>

    <label for="Decorator name">Decoration name</label>
    <select id="decname" name="decname">
    <option value="design">Design Galleria</option>
    <option value="bella">Bellacase Design Associates</option>
    <option value="decore">Decore and More Group</option>
    </select>
    <br>
    
<br>
<label for="email">Email</label>
<select id="email" name="decemail">
    <option value="designgalleria@domain.com ">designgalleria@domain.com</option>
    <option value="bellacaseDA@domain.com">bellacasDA@domain.com</option>
    <option value="decoreandmore@domain.com">decoreandmore@domain.com </option>
    </select>
<br>
<label for="charge">Charge</label>
<select id="charge" name="deccharge">
    <option value="7000">2000</option>
    <option value="10000">10000</option>
    <option value="15000">15000</option>
    </select>
<br>
<button type="submit" class="registerbtn" name="insertdecordetails">Insert Decoration Fields</button>

<h3>Catering</h3>
<label for="Catering ID">Catering ID</label>
<select id="catid" name="catid">
    <option value="catr1">catr1</option>
    <option value="catr2">catr2</option>
    <option value="catr3">catr3</option>
    </select>
<br>

<label for="Catering name">Catering name</label>
<select id="catname" name="catname">
    <option value="fancy">Fancy Fiesta</option>
    <option value="cater">Cater Nation</option>
    <option value="Happy_plate">The Happy Plate</option>
    </select>
<br>

<label for="email">Email</label>
<select id="email" name="catemail">
    <option value="fancyfiesta@domain.com ">happyfiesta@domain.com</option>
    <option value="caternation@domain.com">caternation@domain.com</option>
    <option value="thehappyplace@domain.com">thehappyplace@domain.com </option>
    </select>
<br>
<label for="No of Plates">No of plates</label>
<select id="plates" name="plates">
    <option value="100">100</option>
    <option value="500">500</option>
    <option value="50">50</option>
    </select>
<br>

<label for="Food Type">Food type</label>
<select id="ftype" name="ftype">
    <option value="NON VEG">NON VEG</option>
    <option value="VEG">VEG</option>
    <option value="BOTH">BOTH</option>
    </select>
<br>

<label for="cost">cost</label>
<select id="cost" name="costfortype">
    <option value="1000">1000</option>
    <option value="750">750</option>
    <option value="1700">1700</option>
    </select>
<br>

<button type="submit" class="registerbtn" name="insertcaterdetails">Insert Catering Fields</button>
</form>
</div>
</body>

</head>
</html>