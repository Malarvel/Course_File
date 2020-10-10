
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
                  <h3><strong>My Course Page</strong></h3>
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
                                  <th>Academic Year</th>
                                  <th>Semester</th>
                                  <th>Course Code</th>
                                  <th>Course Name</th>
                                  <th>view</th>
                                </tr>
                              </thead>
                          <?php 
    $count=1;
    $staff_id=$_SESSION['username'];
     require_once 'config.php'; 
     $query="SELECT * from course_details where staff_id='$staff_id' And (academic_year!='AY-2020-21' OR  semester!='Odd') ";
     $result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{  
  ?>
                            
                              <tbody>
                                <tr>
                                <td><?php echo $count; ?></td>
                                <td><?= $row['academic_year'];?></td>
                                <td><?= $row['semester'];?></td>
                                <td><?= $row['course_code'];?></td>
                                <td><?= $row['course_name'];?></td>
                                  <td><a class="btn btn-warning btn-xs btn-round" id="lecture_submit" href="archive_my_course_page.php?ac_year=<?php echo $row['academic_year'];?>&semester=<?php echo $row['semester'];?>&course_code=<?php echo $row['course_code'];?>&course_name=<?php echo $row['course_name'];?>" name="lecture_submit"> <strong>View</strong> </a></td>
                                      </tr>
                                <?php
                  $count++;    }  
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


