<!-- 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 -->

<?php 
error_reporting(0);

if(isset($_POST['send'])){


   $qyery_asked= $_POST['queryin'];

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
               "content" => $qyery_asked 
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

   extract($result);

   // echo"$model";

   $newarr= $choices;

   $secondarr= $newarr[0];

   extract($secondarr);

   $thirdarr= $message;

   extract($thirdarr);

   $actreply= $content;

   echo($actreply);


}

?>