<?php
    // $name= "Souvik Gupta";
    // $email= "souvikgupta64@gmail.com";
    // $msg= "hii this is a test message.";
    // $subject= "testtrial02";
    // $header= "From: souvikguptabusiness@gmail.com";

    // ini_set("SMTP", "smtp.gmail.com");
    // ini_set("smtp_port","587");
    // ini_set("sendmail_from", "souvikguptabusiness@gmail.com");
    // ini_set("sendmail_path",  "\\'C:\\xampp\\sendmail\\sendmail.exe\\' -t");
    
    
    // if(mail($email, $subject, $msg, $header)){
    //     echo("<script>console.log('mail sent successfully...');</script>");
    // }else{

    //     echo("<script>console.log('not send');</script>");
    // }



    $qyery_asked="which state kolkata is located?";
    
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
    
       print_r($result);
       extract($result);
    
    //    echo"$model";
    
       $newarr= $choices;
    
       $secondarr= $newarr[0];
    
       extract($secondarr);
    
       $thirdarr= $message;
    
       extract($thirdarr);
    
       $actreply= $content;
       echo($actreply);

?>