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
	$staff_url = "http://172.19.0.6/api/login";
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
//$json = file_get_contents('http://172.16.7.163/api/login/?user_name='.$username.'&password='.$pwd);
$obj = json_decode($result);

//print_r($obj);


if(isset($obj->user))
{
	$token=$obj->token; echo '<br>';echo $token;
	$student_id=$obj->user->student_id;
	$register_no=$obj->user->register_no; //echo $register_no;
	$aadhar_no=$obj->user->aadhar_no;
	$stu_name=$obj->user->name;
	$specialization=$obj->user->specialization;
	$batch=$obj->user->batch;
	$sec=$obj->user->sec;
	$nad_id=$obj->user->nad_id;
	$degree=$obj->user->degree;
	$date_of_birth=$obj->user->date_of_birth;
	$remember_token=$obj->user->remember_token;
	$faculty_advisor_id=$obj->user->faculty_advisor_id;
	session_start();
	$_SESSION['token']=$token;
	$_SESSION['remember_token']=$remember_token;
	$_SESSION['stu_id'] =$luname;
	$_SESSION['student_id'] =$student_id;
	$_SESSION['register_no'] =$register_no;
	$_SESSION['aadhar_no'] =$aadhar_no;
	$_SESSION['stu_name'] =$stu_name;
	$_SESSION['specialization'] =$specialization;
	$_SESSION['batch'] =$batch;
	$_SESSION['sec'] =$sec;
	$_SESSION['nad_id'] =$nad_id;
	$_SESSION['date_of_birth'] =$date_of_birth;
	$_SESSION['degree'] =$degree;
	$_SESSION['faculty_advisor_id'] =$faculty_advisor_id;
	$_SESSION['email_id'] =$obj->user->email_id;
 header("Location:Student/Dashboard.php");
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
			<p style="color:#31ab00;"><strong>Use SIS-LOGIN Credentials to Login </strong></p><br>
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
 
