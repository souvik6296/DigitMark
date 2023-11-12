
<?php 
     
     error_reporting(0);
     $alert=FALSE;
     if($_POST["done"]){
         
         // $hostname= "localhost";
         // $username= "root";
         // $password= "";
         // $databasename= "digitmark";

         $hostname= "sql101.infinityfree.com";
         $username= "if0_35363182";
         $password= "Eld0YDYRTKkn";
         $databasename= "if0_35363182_digitmark";
 
         
         $email= $_POST["email"];
         
         $prefix= substr($email, 0, strpos($email, "@"));
 
         $connect= mysqli_connect($hostname, $username, $password, $databasename);
 
         $query0= "SELECT `email`, `userid` FROM `user-login`";
         $retval = mysqli_query($connect, $query0);
         $email_array= array();
         $userid_array= array();
 
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
             array_push($email_array, $row['email']);
             array_push($userid_array, $row['userid']);
 
         }
         
         if(in_array($email, $email_array)){
             $alert=TRUE;
             
         }else{
 
             $got_uniqueid= FALSE;
             $userid="";
             while(!$got_uniqueid){
                 $userid= uniqid($prefix);
                 if(!in_array($userid, $userid_array)){
                     $got_uniqueid= TRUE;
                 }else{
                     $got_uniqueid= FALSE;
                 }
             }
 
 
 
             $name= $_POST["name"];
             $pasword= $_POST["password0"];
             $avatar= $_POST["avatar"];
             $query1= "INSERT INTO `user-login`(`name`, `email`, `password`, `userid`, `avatar`) VALUES ('$name','$email','$pasword','$userid','$avatar')";
             $result= mysqli_query($connect, $query1);
             if($result){
                setcookie("userid", $userid, time()+2592000, "/");
                header("location: index.php");
             }
             
         }
         
     }
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    
    <div id="alert-msg">
        <p id="alert-text"></p>
    </div>

    <?php
        if($alert){
            echo("
            <script>
                document.getElementById('alert-msg').style.visibility='visible';
                document.getElementById('alert-text').innerText='Oooops! This mail-id is already registered. Please signin or try with another mail-id';
            </script>");
        }elseif(!$alert){
            echo("
            <script>
                document.getElementById('alert-msg').style.visibility='hidden';
            </script>");
        }
    ?>
    


    <form class="form" method="post">


        <div id="container2" class="container">
            <div id="logo">
                <a href="#">DigitMark</a>
            </div>
            <div id="holder">
                <img id="leftmove" src="images/left-inactive-arrow.png" alt="" onclick="movetoleft()">
                <span style="width: 20px;"></span>
                <div id="avtar-picker">
                    <img id="imgid" src="images/avatars/avatar0.png" alt="">
                </div>
                <script src="script2.js"></script>
                <span style="width: 20px;"></span>
                <img id="rightmove" src="images/active-right-arrow.png" alt="" onclick="movetoright()">
                

            </div>
            <p>select a Avatar for your Profile</p>
            <input type="hidden" name="avatar" id="avatar" value="images/avatars/avatar0.png">
            <div id="name-input" class="input-container">
                <img src="images/user.png" alt="">
                <input name="name" type="text" class="inputs" placeholder="enter your name">
            </div>
            <input name="done" class="go" type="submit" value="Sign Up">

        </div>




        <div id="container1" class="container">
            <div id="logo">
                <a href="#">DigitMark</a>
            </div>
            <div id="inputs">
                <div id="email-input" class="input-container">
                    <img src="images/email (1).png" alt="">
                    <input name="email" type="email" class="inputs" placeholder="enter your email">
                </div>
                <div id="password-input" class="input-container">
                    <img src="images/password.png" alt="">
                    <input name="password0" type="password" class="inputs" placeholder="enter a password">
                </div>
                <div id="password-input" class="input-container">
                    <img src="images/password.png" alt="">
                    <input name="password1" type="password" class="inputs"
                        placeholder="re-enter your password to confirm">
                </div>
            </div>
            <script>
                function b1() {
                    document.getElementById("container1").style.visibility = "hidden";
                    document.getElementById("container2").style.visibility = "visible";
                    document.getElementById("container0").style.visibility= "hidden";
                    document.getElementById("avatar").value= "images/avatars/avatar0.png";
                }

            </script>
            <div class="go" onclick="b1()" id="btn">
                Continue
            </div>
            
            <div id="others">
                <a href="#" id="forget">generate password</a>
                <span style="width: 150px;"></span>
                <a href="signin.php" id="register">old user? click to sign in</a>
            </div>

        </div>

        
    </form>
</body>

</html>