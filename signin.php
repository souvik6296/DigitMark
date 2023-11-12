<?php include 'action1.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form class="form" method="post">
        <div class="container">
            <div id="logo">
                <a href="#">BlogsToday</a>
            </div>
            
                <div id="inputs">
                    <div id="email-input" class="input-container">
                        <img src="images/email (1).png" alt="">
                        <input name="email" type="email" class="inputs" placeholder="enter your registerd email">
                    </div>
                    <div id="password-input" class="input-container">
                        <img src="images/password.png" alt="">
                        <input name="password" type="password" class="inputs" placeholder="enter your password">
                    </div>
                </div>
                <input name="signin" class="go" type="submit" value="Sign In">
                <div id="others">
                    <a href="#" id="forget">forgot password?</a>
                    <span style="width: 150px;"></span>
                    <a href="signup.php" id="register">new user? click to sign up</a>
                </div>
            
        </div>
    </form>
</body>
</html>