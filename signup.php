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
