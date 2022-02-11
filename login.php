<?php
    $db = mysqli_connect('localhost', 'root', 'password', 'login');
    $username = "";
    $password = "";
    if(isset($_POST['submit'])) {
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      if($username!="" && $password !="")
      {
        $sql_query="select count(*) as cntuser from users where username = '".$username."' and password = '".$password."'";
        $result= mysqli_query($db,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntuser'];
        if($count>0)
        {
            $_SESSION['username']=$username;
            header('Location:index.php');
        }
        else{
            header('Location:login.php');
        }
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
   <!-- Login form-->
    <section id="LOGIN" class="back" target="_blank">
        <div class="form">
            <div class="inner-form"  >
                <form  action="" method="post" class="input-group" id="login">
                    <h3 class="heading-login">LOGIN</h3>
                    <input type="name" name="username" class="input" placeholder="Username" style="padding-left: 2px;">
                    <input type="password" name="password" class="input"  placeholder="Password" style="padding-left: 2px;">
                    <input type="submit" name="submit" class="input"  value="Login" style="font-size: 1rem;padding:6px 79px;">
                    <p style="margin:20px 0;">Not a memeber? <a href="signup.php" class="signup-btn">Signup</a></p>
                </form>
            </div>
        </div>
    </section>
    
    <script src="connect.js"></script>  
</body>
</html>
