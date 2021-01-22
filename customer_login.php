<?php
session_start();
include("login.php");
if(isset($_POST['submit']))
{
	$u=$_POST['uname'];
	$_SESSION['username']=$_POST['uname'];
	$p=$_POST['pass'];
    $query="select * from customer1 where c_username='$u' and c_password='$p'";
	$results=mysqli_query($conn,$query);
	$count=mysqli_num_rows($results);
	//echo $count;
    if($count==1)
	{
		$_SESSION['username']=$u;
		header('Location: customer_view.php');
    }
    
	else
	{
		$serr_m='invalid details';
		echo 'User Not Found!';
		//echo $count;
	}
}
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<nav class="w3-bar w3-black">
 <a href="front1.php" class="w3-button w3-bar-item">Home</a>
 <a href="http://localhost/event/manager_login.php" class="w3-button w3-bar-item">Manager Login</a>
 </nav>
 <section class="w3-container w3-center w3-content" style="max-width:600px">
 <h2 class="w3-wide">GAMA EVENTS</h2>
 <p class="w3-opacity"><i></i></p>
 <p class="w3-justify">

 <form action="customer_login.php" method="POST">
 <div class="imgcontainer">
 <img src="images\loginlock.jpg" alt="Event Management Login" class="icon">
 </div>

 <div class="container">
 <label for="uname"><b>Customer ID</b></label>
 <input type="text" placeholder=" (all uppercase) " name="uname" required>
 <br> <br>
 <label for="psw"><b>Password</b></label>
 <input type="password" placeholder="Enter Password " name="pass" required>
 <br>
 </div>

 <div class="container" style="background-color:#f1f1f1">
 <br>
 <input type='submit' name='submit' value='Login'> 
 <button type="reset" class="btn btn-primary">Reset</button>
 </div>
 </form>
</body>
</html>
