
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <title> KARE </title>
   
    <?php include('header.php');?>
     <!-- page content -->
     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3><strong>Course Page</strong></h3>
               </div>
             </div>
            
            </div>
            <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
  				    <div class="x_content">
                        <br /><br>
                        <br /><br>
                         <form Method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" action="">
                         <div class="row">
                         <div class="col-md-1 col-sm-3 col-xs-3 "></div>

                           <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Academic Year :</label>
                            <label style="color:#5F9EA0"><?php $ac_year="AY-2020-21"; echo $ac_year; ?></label>
                        </div>
                        <div class="col-md-5 col-sm-3 col-xs-3 "></div>
                        <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Semester :</label>
                            <label style="color:#5F9EA0"><?php $semester="Odd"; echo $semester; ?></label>
                        </div>
                        </div>
                        <br></br>
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-3 ">
                        </div>

              <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Course <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class=""><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Current Course</h4>
                        </a>
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                          <table class="table table-bordered jambo_table bulk_action">
                              <thead>
                                <tr>
                                  <th>S.No</th>
                                  <th>Course Code</th>
                                  <th>Course Name</th>
                                  <th>view</th>
                                </tr>
                              </thead>
                          <?php 
    $count=1;
  $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xNzIuMTkuMC41XC9hcGlcL2xvZ2luIiwiaWF0IjoxNjAyMDUyMDQzLCJleHAiOjE2MDI0MTIwNDMsIm5iZiI6MTYwMjA1MjA0MywianRpIjoibDl0NmtpRmphaDUyaW1ZRyIsInN1YiI6Mjc5MywicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.1iT_lMSAOMbeSIISKSF_1RSvtIR4GET2RTK760NGo3c";
  // $token=$_SESSION['token']; echo $token;
    $stu_id=$_SESSION['student_id']; //echo $stu_id;
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
           return json_decode($result); // Return the received data
     }
    // Get your token from a cookie or database
    $post = array(); // Array of data with a trigger
    
    $url="http://172.19.0.5/api/get_student_courses_all/$stu_id";
    $request = jwt_request($token,$post,$url); // Send or retrieve data
   // echo '<pre>';
  // print_r($request);
    foreach ($request as $data)
{
  foreach ($data as $row)
                  
    {
  $id=$row->id;
  $course_id=$row->course_id;
  $course_code=$row->course_code;
  $course_name=$row->course_name;
  $credits=$row->credits;
  $staff_id=$row->staff_id;
  $_SESSION['course_id']=$course_id;
  $_SESSION['course_code']=$course_code;
  $_SESSION['course_name']=$course_name;
  $_SESSION['credits']=$credits;  
  $_SESSION['staff_id']=$staff_id;  
  ?>
                            
                              <tbody>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?= $row->course_code;?></td>
                                <td><?= $row->course_name;?></td>
                                  <td><a class="btn btn-warning btn-xs btn-round" id="lecture_submit" href="archive_my_course_page.php?ac_year=<?php echo $ac_year;?>&semester=<?php echo $semester;?>&course_code=<?php echo $row->course_code;?>&course_name=<?php echo $row->course_name;?>&course_id=<?php echo $row->course_id;?>&staff_id=<?php echo $row->staff_id;?>" name="lecture_submit"> <strong>View</strong> </a></td>
                                      </tr>
                                <?php
                  $count++;    }  } 
                      ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                     
                    <!-- end of accordion -->

                  </div>
                </div>
              </div>
            </div>
            </div>
            <br>
            <br><br>
            <br /><br>
            <br /><br><br /><br><br /><br>
                       
                      </form>
                  </div></div>
                </div></div></div></div></div>
           
                            <!-- /btn-group -->
              <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          <strong>Accreditation and Ranking </strong>
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


