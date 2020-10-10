<?php 
session_start(); 
 $student_id=$_SESSION['student_id']; //echo $student_id;
 $register_no=$_SESSION['register_no']; //echo $register_no;
	$aadhar_no=$_SESSION['aadhar_no']; //echo $aadhar_no;
	$stu_name=$_SESSION['stu_name']; //echo $stu_name;
	$specialization=$_SESSION['specialization']; //echo $specialization;
	$batch=$_SESSION['batch']; //echo $batch;
	$sec=$_SESSION['sec']; //echo $sec;
	$nad_id=$_SESSION['nad_id']; //echo $nad_id;
	$date_of_birth=$_SESSION['date_of_birth'];
  $degree=$_SESSION['degree']; //echo $date_of_birth;
  $email_id=$_SESSION['email_id'];
  $faculty_advisor_id=$_SESSION['faculty_advisor_id'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href=""  />

    <title>KARE-A&R!  </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
 <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/klu.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span><strong>Welcome,</strong></span>
                <h2><strong>
                <?php 
         echo $stu_name;?></strong>
                </h2>
             </div>  </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
             <h3 style="color:#48C9B0" ><strong  > KARE </strong><strong style="color:#F0B27A"> - ACCREDITATION & RANKING </strong></h3>
             <BR/>
                <ul class="nav side-menu">
               
                      <li><a href="Dashboard.php"><i class="fa fa-dashboard"></i><strong>Dashboard</strong></a></li> 
				 <li><a href="course_page.php"><i class="fa fa-book"></i> <strong>Course Page </strong></a></li>
				 <li><a href="search_course_page.php"><i class="fa fa-search"></i> <strong>Search Course Page </strong></a></li>
				 </div>
             
              </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php require_once("entry_exit_screen.php");
            ?>
            <div class="sidebar-footer hidden-small">
              <a >
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip"  onclick="openFullscreen();" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" onclick="closeFullscreen()" data-placement="top" title="Exit FullScreen">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt=""><strong>
                    <?php
                      echo $register_no;?></strong>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <br>
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><strong>Dashboard</strong></h3>
              </div>
               </div><br>
			
               <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
  				    <div class="x_content">
                           <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Dashboard <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a ><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title"><strong>Personal Details</strong></h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                          <form Method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" action="">
                     
                          <table class="table table-striped w-autotable table-bordered table-hover table-striped w-auto ">

<tbody><tr>
      <th>Student Name</th>
        <td><?php echo  $stu_name;?></td>
         </tr>
  <tr>
      <th>Register Number</th>
        <td><?php echo $register_no;?></td>
         </tr>
    <tr>
      <th>DOB</th>
        <td><?php $date=$date_of_birth; 
echo ((date('m/d/Y', strtotime($date))));echo " ( MM/ DD/ YYYY )";?></td>
         </tr>
    <tr>
      <th>Degree/Programe</th>
        <td><?php echo $degree."/".$specialization;?></td>
         </tr>
    <tr>
   
      <th>Batch</th>
        <td><?php echo $batch;?></td>
    </tr>
    <tr>
      <th>Section</th>
        <td><?php echo $sec;?></td>
    </tr>
    <tr>
      <th>Aadhar Number</th>
	  <td><?php echo $aadhar_no;?></td>
    </tr>
    <tr>
      <th>NAD Id</th>
	  <td><?php echo $nad_id;?></td>
    </tr>
    <tr>
      <th>Email Id</th>
	  <td><?php echo $email_id;?></td>
    </tr>
</tbody>
</table>
</form>
                          </div>
                        </div>
                      </div>
                      
                     
                   <div class="form-group">
               
              
				  
               
		
                   
              </div>
      </div>
   </div></div></div></div>
</div></div><br/>
             <div class="clearfix"></div>
            <div class="clearfix"></div>
          
   </div>
</div></div></div></div></div></div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
          <strong> Accreditaion and Ranking </strong>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
<?php
if(!isset($_SESSION['stu_id']))
{
    header('Cache-Control: no-cache, must-revalidate');
   echo '<script type="text/javascript">window.location="../index.php"</script>';
    // header("Location:../index.php");  
   
}?>