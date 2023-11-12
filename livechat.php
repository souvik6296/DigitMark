
<?php 
    error_reporting(0);

    
    $id= $_COOKIE["userid"];
    if($id!=null){

        include 'connection.php';
        
        $got_image= FALSE;
        $avatar_url="";
        $profile_name="";

        $query= "SELECT `name`, `email`, `password`, `userid`, `avatar` FROM `user-login`";
        $response= mysqli_query($connect, $query);


        while($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
            if($row["userid"]==$id){
                    
                $avatar_url= $row["avatar"]."";
                $profile_name= $row["name"]."";
                $userid= $row["userid"]."";

                session_start();
                $_SESSION["avatar"]= $avatar_url;
                $_SESSION["name"]= $profile_name;
                    
                    

                $got_image= TRUE;
            }

        }
    }
    
    if(isset($_POST["send"])){
    
       $qyery_asked= $_POST["queryin"];
    
       $ch = curl_init();
    
       curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_POST, 1);
    
       $jayParsedAry = [
       "model" => "gpt-3.5-turbo", 
       "messages" => [
             [
                "role" => "user", 
                "content" => "how to code" 
             ], 
             [
                   "role" => "assistant", 
                   "content" => "$qyery_asked" 
                ] 
          ], 
       "temperature" => 1, 
       "max_tokens" => 256, 
       "top_p" => 1, 
       "frequency_penalty" => 0, 
       "presence_penalty" => 0 
       ]; 
    
       $postdata= $jayParsedAry;
       $postdata= json_encode($postdata);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    
       $headers = array();
       $headers[] = 'Content-Type: application/json';
       $headers[] = 'Authorization: Bearer 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';
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
       $result = curl_exec($ch);
       if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
       }
       curl_close($ch);
    
    
       $result= json_decode($result, true);
    
    //    print_r($result);
       extract($result);
    
    //    echo"$model";
    
       $newarr= $choices;
    
       $secondarr= $newarr[0];
    
       extract($secondarr);
    
       $thirdarr= $message;
    
       extract($thirdarr);
    
       $actreply= $content;

       $hostname= "localhost";
       $username= "root";
       $password= "";
       $databasename= "digitmark";
       $contact= mysqli_connect($hostname, $username, $password, $databasename);

       $query2="INSERT INTO `query-result`(`userid`, `query`, `result`) VALUES ('$userid','$qyery_asked','$actreply')";
       $result01= mysqli_query($contact, $query2);
       header("location: livechat.php");
    


    //    here is the main process to show the answer to the user....
    //    echo($actreply);
    
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitMark-LiveChatAI</title>
    <link rel="stylesheet" href="style1.css">
    <script src="./script1.js"></script>
</head>
<body>
    <header>
        <nav>
            <span class="logo" id="digit">Digit</span>
            <span class="logo" id="mark">Mark</span>
            <span id="gap0"></span>
            <div id="option-holder">

                <a class="options" href="#">Home</a>
                <a class="options" href="#">Services</a>
                <a class="options" href="#">Project</a>
                <a class="options" href="#">About Us</a>
                <a class="options" href="#">Blog</a>
                <a class="options" href="#">Contact Us</a>
                <span id="gap1"></span>
                <div class="get-started" id="btn-primary"><a href="./signup.php">Get Started</a></div>
                <div id="profile-holder">
                    <img id="user-img-src" src="./images/avatars/avatar0.png">
                    <a href="#" id="user-name" onclick="showOptions()">User Name</a>
                </div>
                <div id="extra-options">
                    <a href="./signin.php"><div id="switch-account" class="options-ex">Switch Account</div></a>
                    <a href="./logout.php"><div id="log-out" class="options-ex">Log out</div></a>
                </div>
                <?php 
                    if($got_image){
                        echo("<script>document.getElementById('btn-primary').style.visibility='hidden';
                        document.getElementById('profile-holder').style.visibility='visible';
                        document.getElementById('user-name').innerText='".$profile_name."';
                        document.getElementById('user-img-src').src='".$avatar_url."';
                        let width= document.getElementById('profile-holder').offsetWidth;
                        let width0= width+10;
                        let width1= width0+'px';
                        document.getElementById('option-holder').style.marginRight=width1;
                        </script>");
                    }
                    else{
                        echo("<script>document.getElementById('btn-primary').style.visibility='visible';
                        document.getElementById('profile-holder').style.visibility='hidden';</script>");

                    }
                ?>
            </div>


        </nav>

    </header>
    <!-- //////////////////////////////////////////////////// -->

    <main>
        <div id="leftsidenav">

        </div>
        <div id="rightsidenav">

            <div id="response-querry-holder"></div>
            
           
            <div id="form-holder">
                <form method="post">
                    <div id="all-holder">

                        <input type="text" name="queryin" id="query-input">
                        <input type="submit" value="SEND" name="send" id="send-btn">
                    </div>
                </form>
            </div>

            <?php 
                include 'connection.php';
                $query03="SELECT `userid`, `query`, `result` FROM `query-result`";
                $response01= mysqli_query($connect, $query03);
        
        
                $num=0;
                while($row01 = mysqli_fetch_array($response01, MYSQLI_ASSOC)){
                    if($id==$row01['userid']){

                    
                        $suf=$num."";
                            
                        $str01="<script>
                        let queryholder".$suf."= document.createElement('div');
                        queryholder".$suf.".className='query-holder';
                        document.getElementById('response-querry-holder').appendChild(queryholder".$suf.");
                        
                        let query".$suf."= document.createElement('div');
                        query".$suf.".className='query';
                        query".$suf.".innerText='".$row01['query']."';
                        document.getElementById('response-querry-holder').lastChild.appendChild(query".$suf.");


                        let responseholder".$suf."= document.createElement('div');
                        responseholder".$suf.".className='response-holder';
                        document.getElementById('response-querry-holder').appendChild(responseholder".$suf.");
                        
                        let response".$suf."= document.createElement('div');
                        response".$suf.".className='response';
                        response".$suf.".innerText=`".$row01['result']."`;
                        document.getElementById('response-querry-holder').lastChild.appendChild(response".$suf.");</script>";

                        echo($str01);
                        $num++;
                    }
                }

            ?>

        </div>
        <script>
            let element= document.querySelector('#response-querry-holder');
            element.scrollTop= element.scrollHeight;</script>
    </main>
</body>
</html>
<!-- dvdsdv[dvpsvsd[va]vfdsbof]fsb][OFAEDVvvwb asvfc] -->