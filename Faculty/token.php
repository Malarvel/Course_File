<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title> KARE </title>

    
               <?php 
               session_start();
    $count=1;
    $token=$_SESSION['token'];
    $fpid=$_SESSION['fpid'];
  $course_id = 388;
    //$schools_url="http://172.16.7.163/api/schools/all";
    function jwt_request($token,$post,$url) {
    
           //header('Content-Type: application/json'); // Specify the type of data
           $ch = curl_init($url); // Initialise cURL
           $post = json_encode($post); // Encode the data array into a JSON string
           $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
           curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
           curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
           $result = curl_exec($ch); // Execute the cURL statement
           curl_close($ch); // Close the cURL connection
           return json_decode($result,true); // Return the received data
     }
    // Get your token from a cookie or database
    $post = array(); // Array of data with a trigger
    $url="http://172.19.0.5/api/get_time_table/$fpid/$course_id";
    $request = jwt_request($token,$post,$url); // Send or retrieve data
    echo '<pre>';
    print_r($request); 
    //$m=$request->data->time_table[0]; echo $m;
  ?>

