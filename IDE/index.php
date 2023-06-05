<?php
session_start();

	include("connection.php");
	include("function.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		// SOMETHING WAS POSTED
		// $username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if (!empty($email) && !empty($password) ) {

			// get data from database
			
			$query = "select * from sign_in where email = '$email' limit 1";
			
			$result = mysqli_query($con,$query);

			if ($result) {

				if ($result && mysqli_num_rows($result) > 0) {

					$user_data = mysqli_fetch_assoc($result);
					
					if ($user_data['password'] === $password) {

						$_SESSION['user_id'] = $user_data['user_id'];
						
						header("Location: index.php");
						die;
						
					}
					
				}
			
			}

			// echo "WRONG USERNAME OR PASSWORD";

		}else{
			echo "WRONG USERNAME OR PASSWORD";
		}

	}
	

?>

<!-- end of php -->
<!DOCTYPE html>
<html>
<head>
	<title>Code_IDE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>

  <DIV>
    <form action="" autocomplete="off" method="post">

  
    <div class="cont">
      <div class="form sign-in">
        <h2>Sign In</h2>
       <label>
        <span>Email Address</span>
        <input type="email" name="email" >
       </label>
        <label>
        <span>Password</span>
        <input type="password" name="password">
       </label>
       <button class="submit" type="button">Sign In</button>
       <p class="forgot-pass">Forgot Password ?</p>

        <!-- <div class="social-media">
        <ul>
          <li><a href="https://www.facebook.com/"><img src="images/facebook.png"></a></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
       </div> -->
        </div>

       <div class="sub-cont">
        <div class="img">
        <div class="img-text m-up">
          <h2>New here? </h2>
          <p>Sign up and Start your coding practice Today </p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already have an account, just sign in.</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
       </div>
       <div class="form sign-up">
        <h2>Sign Up</h2>
        <label>
          <span>Name</span>
          <input type="text">
        </label>
        <label>
          <span>Email</span>
          <input type="email">
        </label>
        <label>
          <span>Password</span>
          <input type="password">
        </label>
        <label>
          <span>Confirm Password</span>
          <input type="password">
        </label>
        <button type="button" class="submit" submit>Sign Up Now</button>
        </div>
        </div>
        </div>
        </form>
        </DIV>
<script type="text/javascript" src="script.js"></script>
</body>
</html>