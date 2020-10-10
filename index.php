<?php  //Session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KARE </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
 <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	<script language="javascript" type="text/javascript">
window.history.forward();
</script>
  </head>

  <body class="login">
  <div class="">

  <div class="login_wrapper">
  <div class="">
  <div class="animate form login_form">
          <section class="login_content">
  <div class="row">
  <Form method="POST">
  <h1>Login</h1>
			  <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="container-fluid">
			<div  class="center">
           <h5><input type="radio" class="flat" name="flag" value="faculty"> Faculty</h4><br>
           <h5><input type="radio" class="flat" name="flag" value="student"> Student</h4><br>

           </div>
                      </div></div>
					  
                      <BR>
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
<br/></div></div>
              <div class="form-group">
			   
               <h4><b> Office of Accreditation and Ranking </b></h4></div></div>
			  <br>
              
          
              </div></div></div>
            </form>
          </section>
                        </div> </div></div></div></div>
						<!-- jQuery -->
 <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>
            
  </body>
</html>
  </body>
</html>
<?php 
if(isset($_POST['sign']))
{
if(empty($_POST['flag'])  )
{

echo "<script>alert('Please Choose One');</script>";
}
else
{
	
	 $flag=$_POST['flag']; 

if($flag=="faculty")
{
	header("Location:faculty_index.php");
}
else if($flag=="student")
{
	header("Location:student_index.php");
}
}
}
?>
