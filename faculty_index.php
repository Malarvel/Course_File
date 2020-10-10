<?php
$conn=mysqli_connect('localhost','root','','academic_course');
if(!$conn)
{
die("Could not connect to the database:".mysqli_connect_error());
}
if(isset($_POST['sign']))
{
  
if(empty($_POST['ulname']) || empty($_POST['plass']))
{

echo "<script>alert('Fill all the Details');</script>";
}
else
{
	
	$luname=$_POST["ulname"];
	
	$lpass=$_POST["plass"];
	$staff_url = "http://172.19.0.5/api/login";
	$fields = ['user_name'=> $luname ,'password' => $lpass ];
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $staff_url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
//echo $result;


//$json = file_get_contents('http://172.16.7.163/api/login/?user_name='.$username.'&password='.$pwd);
$obj = json_decode($result);


//print_r($obj);

if(isset($obj->user))
{
	session_start();
	$fpid=$obj->user->id;
  $fname=$obj->user->name;
  $sid=$obj->user->staffid;
  $dpname=$obj->user->department;
  $designation=$obj->user->designation;
  $mobile_no=$obj->user->mobile_no;
   $dob=$obj->user->date_of_birth; 
$fmail=$obj->user->email;
$doj=$date=$obj->user->date_of_joining; 
 $qualification=$obj->user->qualification;
 $_SESSION['fpid']=$fpid;
  $_SESSION['sname']=$fname;
   $_SESSION['username']=$sid;
  $_SESSION['department']=$dpname;
  $_SESSION['designation']=$designation;
   $_SESSION['mobile_no']=$mobile_no;
    $_SESSION['dob']=$dob;
	 $_SESSION['fmail']=$fmail;
	  $_SESSION['doj']=$doj;
	   $_SESSION['qualification']=$qualification;
	$_SESSION['token']=$obj->token;
		//$_SESSION['submit'] =true;

	$_SESSION['username'] =$luname;
header("Location:Faculty/Dashboard.php");
 //echo '<script>alert("sdfr sdfer.")</script>' ;
}


elseif(isset($obj->error))
{
	//header("Location:index.php");
	echo '<script>alert("Incorrect Username/ Password Please Try Again.")</script>' ;
  
}
}
}

//student login


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KARE-A&R!  </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	<script language="javascript" type="text/javascript">
window.history.forward();
</script>

  </head>

  <body class="login">
    

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  <div class="row"> 
		  <div class="col-md-12 col-sm-12 col-xs-12">
		  </div>
		 
	
          <form method="post" >
		  
			  
              <h1>Login</h1>
			  <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="container-fluid">
			<div  class="center">
			<p style="color:#31ab00;"><strong>Use EDU-KARE Credentials to Login </strong></p><br>
                <input type="text" name="ulname" class="form-control"  autocomplete="off" placeholder="Username" onkeyup="this.value = this.value.toUpperCase();" required="required" >
              </div>
           <div  class="center">
                <input type="password" class="form-control" name="plass" placeholder="Password" required="required" >
              
			       
                      </div></div>
					  
                      <div class="row">

<div class="col-xl-9 col-sm-9 mb-3">
<div class="clearfix"></div>
<br/><div  class="center">
              <input type="submit" class="btn btn-primary btn-block" value="Login" name="sign">
             
              </div></div></div></div>
              <div class="clearfix"></div>
			  <br>
			  
              <div class="separator">
			  <div class="row">
<div class="col-xl-1 col-sm-1 mb-3">
</div>
<div class="col-xl-1 col-sm-1 mb-3">
</div>
<div class="col-xl-8 col-sm-8 mb-3">
<div class="clearfix"></div>
<br/><div  class="center">
              
              </div></div></div>
               <div class="form-group">
			   
               <h4><b> Office of Accreditation and Ranking </b></h4></div></div>
			  <br>
              
                   
          
              </div></div></div>
            </form>
          </section>
        </div>
</div>
        
  </body>
</html>
 
