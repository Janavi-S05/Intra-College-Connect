<?php
  $db = mysqli_connect('localhost', 'root', 'password', 'login');
  $username = "";
  $email = "";
  if (isset($_POST['register']))
  {
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];

  	$sql1 = "SELECT * FROM users WHERE username='$username'";
  	$sql2 = "SELECT * FROM users WHERE email='$email'";
  	$res1 = mysqli_query($db, $sql1);
  	$res2 = mysqli_query($db, $sql2);

  	if (mysqli_num_rows($res1) > 0) 
    {
        header('Location:signup.php');
  	}
    else if(mysqli_num_rows($res2) > 0)
    {
        header('Location:signup.php');
    }
  	else
    {
        $query = "INSERT INTO users (username, email,password) VALUES ('$username', '$email', '$password')";
        $results = mysqli_query($db, $query);
        header('Location:index.php');
  	}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="LOGIN" class="back" target="_blank">
        <div class="form">
            <div class="inner-form">
                <form action="home1.php" method="post" class="input-group position" id="signup">
                    <h3 class="heading-login">SIGN UP</h3>
                    <input type="name" name="username" class="input" placeholder="Username" style="padding-left: 2px;">
                    <input type="email" name="email" class="input" placeholder="Email" style="padding-left: 2px;">
                    <input type="password" name="password" class="input" placeholder="Password" style="padding-left: 2px;">
                    <input  type="submit" name="register" class="input"  value="Sign Up" style="font-size: 1rem;padding:6px 72px;" >
                    <p style="margin:20px 0;">Already Registered? <a href="login.php" class="signup-btn">Login</a></p>
                </form> 
            </div>
        </div>
    </section>
    <script src="connect.js"></script>  
</body>
</html>
