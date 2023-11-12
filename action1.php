<?php
    error_reporting(0);
    $click=FALSE;
    if(isset($_POST["signin"])){


        // $hostname= "localhost";
        // $username= "root";
        // $password= "";
        // $databasename= "blogstoday";

        // $connect= mysqli_connect($hostname, $username, $password, $databasename);

        include 'connection.php';

        $email= $_POST["email"];
        $pasword= $_POST["password"];
        $query= "SELECT `email`, `password`, `userid` FROM `user-login`";
        $response= mysqli_query($connect, $query);


        while($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
            
            if($row["email"]==$email){
                
                if($row["password"]==$pasword){

                    setcookie("userid", $row['userid'], time()+2592000, "/");
                    


                    $str= "<script>localStorage['email']='".$email."';</script>";
                    $str1= "<script>localStorage['userid']='".$row['userid']."';</script>";
                    echo($str);
                    
                    sleep(2);
                    $click=TRUE;
                    
                    
                }
            }

        }


        

       
        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php" id="tap"></a>
    <?php 
        if($click){
            $str3= "<script>document.getElementById('tap').click();</script>";
            echo($str3);
        }
    ?>
</body>
</html>