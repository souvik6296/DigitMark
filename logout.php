<?php 
    
    setcookie("userid", null, time()+2592000, "/");
    
    header("Location: ./home.php");
    
?>