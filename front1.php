<?php
include("login.php");
session_start();
//$u= $_SESSION['username']

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">

<body>

<nav class="w3-bar w3-black">
 <a href="front1.php" class="w3-button w3-bar-item">Home</a>
 <a href="http://localhost/event/about.html" class="w3-button w3-bar-item">About Us</a>
 <a href="customer_login.php" class="w3-button w3-bar-item">Customer Login</a>
 <a href="manager_login.php" class="w3-button w3-bar-item">Manager Login</a>
  

</nav>
 <section class="w3-container w3-center w3-content" style="max-width:600px">
 <h1 class="w3-wide">GAMA EVENTS</h1>
 <p class="w3-opacity"><i></i></p>
 <p class="w3-justify">

</p></section>
  <div class="row">
    <div class="side">
<form action="front1.php" method="POST">
      <h2>New Registration</h2>
        
        
      <?php
        
        if(isset($_POST['register']))
        {
        //  $cid=$_POST['cid'];
        $cname=$_POST['cname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $usern=$_POST['usrn'];
        $password=$_POST['psw'];
        $address=$_POST['address'];
        $password=$_POST['psw-repeat'];
        $eventid= $_POST['eventidp'];
        
        $insertc1query="INSERT INTO customer1  (c_name,c_mail_id,c_username,c_password, address,event_id )VALUES('$cname','$email','$usern','$password','$address','$eventid');";
        $status1=mysqli_query($conn,$insertc1query);
        $querycid= "SELECT c_id FROM customer1 WHERE c_username ='$usern';";
        $result = mysqli_query($conn,$querycid);
        $row = mysqli_fetch_row($result);
        $cid = $row[0];
  
        $insertc2query="INSERT INTO customer2 VALUES('$cid','$phone');";
        $status2=mysqli_query($conn,$insertc2query);
        
        if($status1 ==1 and $status2==1)
        {
          echo "Registered!";
        }
        }
        ?>
          <div class="container">
            
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="cname" id="name" required>
            <br>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <br>
            <label for="address"><b>Address</b></label>
            <input type="text" placeholder="Enter address" name="address" id="address" required>
            <br>
            <label for="phone"><b>Phone</b></label>
            <input type="text" placeholder="Enter Ph:no" name="phone" id="phone" required>
            <br>
            <label for="Event ID"><b>Event ID</b></label>
            <input type="text" placeholder="Enter Event ID Provided" name="eventidp" id="name" required>
            <br>
            <label for="psw"><b>User Name</b></label>
            <input type="text" placeholder="Enter Username" name="usrn" id= "usrn" required >           
           <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
            <br>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
            <hr>
            <br>
            <button type="submit" class="registerbtn" name="register">Register</button>
          </div>
          
        </form>
      </div>

       <div class="main">

          <h1>Our Services</h1>
          <p> We are an event management company that stands out with it's creative concepts, innovative themes and exceptional execution of each project. We have made an imprint in the market and in the minds of people who have experienced the magic of our expertise in event management!
        
          </p>
      
        <details>
      <summary>Decoration</summary>
      <p> A party is always wonderful as it is organized for your special people to come together and have some beautiful moments to share in their lives! We can make this occasion incredible for you and your loved ones with our creative themes, spectacular settings, a tempting menu, and warm hospitality! You name it, we make it possible for you!</p>

      </details>
 
       <details>
      <summary>Photography</summary>
    <p>Photography is the art, application, and practice of creating durable images by recording light, either electronically by means of an image sensor, or chemically by means of a light-sensitive material such as photographic film.

      </p>
    </details>
 
    <details>
    <summary>Entertainment</summary>
    <p>They found that an emotional reaction was the result of being subjected to music in both the groups. Dancing erupted in them both irrespective of their background. While dancing is the most natural outcome of music, there are other emotions that can result too.</p>
    </details>
    <details>
    <summary>Transportation</summary>
    <p>
        A logistics company plans, implements, and controls the movement and storage of goods, services, or information within a supply chain and between the points of origin and consumption. Various logistic companies handle some or all of these supply chain functions, depending on a client’s logistical needs.
    </p>
    </details>
    <details>
       <summary>Catering</summary>
    <p>Listen to the people who love you. Believe that they are worth living for even when you don't believe it. Seek out the memories depression takes away and project them into the future. Be brave; be strong; take your pills. Exercise because it's good for you even if every step weighs a thousand pounds. Eat when food itself disgusts you. Reason with yourself when you have lost your reason.</p>
    </details>
 
   </div>
</div> 

<br>
  <br>
  <br><br><br><br><br>
  <footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
</footer>                    


</body></html>