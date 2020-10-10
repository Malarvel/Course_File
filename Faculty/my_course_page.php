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
          <div class="">     <div class="page-title">
              <div class="title_left">
                <h3><strong>MY Course Page</strong></h3>
              </div>
               </div>
               <br><br>
       <div class="x_panel">
                 
                  <div class="x_content">
                           <div class="row">
                           <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Academic Year :</label>
                            <label style="color:#5F9EA0"><?php $ac_year = $_GET['ac_year']; echo $ac_year;?></label>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Semester :</label>
                            <label style="color:#5F9EA0"><?php $semester = $_GET['semester']; echo $semester;?></label>
                        </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Course Code :</label>
                            <label style="color:#5F9EA0"><?php $course_code = $_GET['course_code']; echo $course_code;
                                ?></label>
                        </div>
                       <div class="col-md-4 col-sm-3 col-xs-2 ">
                       <label style="color:#F0B27A">Course Name :</label>
                            <label style="color:#5F9EA0"><?php $course_name = $_GET['course_name']; echo $course_name;
                                ?></label>
                                    </div>
                                  </div>
                         </br>
                         <form Method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" action="course_details_redir.php">
                         <input type="hidden" value="<?php $ac_year = $_GET['ac_year']; echo $ac_year; ?>" name="ac_year">
                                <input type="hidden" value="<?php $semester = $_GET['semester']; echo $semester; ?>" name="semester">
                             <input type="hidden" value="<?php $course_code = $_GET['course_code']; echo $course_code; ?>" name="course_code">
                              <input type="hidden" value="<?php $course_name = $_GET['course_name']; echo $course_name; ?>" name="course_name">
                                 <input type="hidden" value="<?php $course_id= $_GET['course_id']; echo $course_id;?>" name="course_id" >
                             <div class="form-group">
                               <div class="table-responsive">
                                 <table class="table table-bordered">
                       <tbody>
                                      <tr>
                                      
                      <!-- <td width="225"><strong>Syllabus</strong></td>
                  <td><p><em>Syllabus Available</p></em></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="lecture_submit" name="lecture_submit" href="Calendar.pdf" download="Syllabus"> <strong>Download</strong> </a></td> 
                    </tr> -->
                    <?php
                               $staff_id=$_SESSION['username'];
                                require_once 'config.php'; 
                                $query="SELECT * from course_details where academic_year='$ac_year' AND semester='$semester' AND staff_id='$staff_id' AND course_code='$course_code' AND course_name='$course_name' ";
                                $result=mysqli_query($conn,$query);
                                if (mysqli_num_rows($result) != 0)
                                {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                 if(!empty($row['course_plan_proof'])) 
                    {     
                 ?>
                 
                    <tr>
                       <td width="225"><strong>Course Plan</strong></td>
                      <td width="600"><input style="display:none" type="file" id="course_plan_file" name="course_plan_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="course_plan_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['course_plan_path'];?>"><?php $course_plan=$row['course_plan_proof']; echo explode('_', $course_plan, 3)[2];?></a></span></td>
                    <td  width="150" style="text-align: center;"><a class="btn btn-primary btn-xs" id="course_plan_attach" name="course_plan_attach" onclick="course_plan_invisible();"><strong> Attach</strong> </a>
                    <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="course_plan_sub" name="course_plan_sub"  value="Submit" > <strong> </strong></a></td>
                  </tr>
                    <?php } else { ?>
                      <tr>
                       <td width="225"><strong>Course Plan</strong></td>
                      <td width="600"><input style="display:none" type="file" id="course_plan_file" name="course_plan_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="course_plan_material"></span></td>
                    <td  width="150" style="text-align: center;"><a class="btn btn-primary btn-xs" id="course_plan_attach" name="course_plan_attach" onclick="course_plan_invisible();"><strong> Attach</strong> </a>
                    <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="course_plan_sub" name="course_plan_sub"  value="Submit" > <strong> </strong></a></td>
                  </tr>
                    <?php } if(!empty($row['ebook1_proof'])) 
                    {   ?>
                    <tr>
                     <td ><strong>e-book1 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook1_file" name="ebook1_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="ebook1_material"><strong style="color:#71A5CB">Uploaded File : </strong></strong><a href="<?php echo $row['ebook1_path'];?>"><?php $ebook1=$row['ebook1_proof']; echo explode('_', $ebook1, 3)[2];?></a></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook1_attach" name="ebook1_attach" onclick="ebook1_mat();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook1_sub" name="ebook1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else { ?>
                    <tr>
                     <td ><strong>e-book1 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook1_file" name="ebook1_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="ebook1_material"></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook1_attach" name="ebook1_attach" onclick="ebook1_mat();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook1_sub" name="ebook1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } if(!empty($row['ebook2_proof'])) 
                    {   ?>
                  <tr>
                     <td ><strong>e-book2 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook2_file" name="ebook2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="ebook2_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['ebook2_path'];?>"><?php $ebook2=$row['ebook2_proof']; echo explode('_', $ebook2, 3)[2];?></a></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook2_attach" name="ebook2_attach" onclick="ebook2_mat();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook2_sub" name="ebook2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else { ?>
                    <tr>
                     <td ><strong>e-book2 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook2_file" name="ebook2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="ebook2_material"></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook2_attach" name="ebook2_attach" onclick="ebook2_mat();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook2_sub" name="ebook2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } if(!empty($row['se1_proof'])) 
                    {   ?>
                  <tr>
                    <td ><strong>SE-1 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se1_file" name="se1_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['se1_path'];?>"><?php $se1=$row['se1_proof']; echo explode('_', $se1, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_attach" name="se1_attach" onclick="se1_invisible();"><strong> Attach</strong> </a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="se1_sub" name="se1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else { ?>
                  <tr>
                    <td ><strong>SE-1 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se1_file" name="se1_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_attach" name="se1_attach" onclick="se1_invisible();"><strong> Attach</strong> </a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="se1_sub" name="se1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } if(!empty($row['se1_sam_proof'])) 
                    { ?>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE1</strong></td>
                    <td ><input style="display:none" type="file" id="se1_ans_file" name="se1_ans_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_ans_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['se1_sam_path'];?>"><?php $se1_sam=$row['se1_sam_proof']; echo explode('_', $se1_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_ans_attach" name="se1_ans_attach" onclick="se1_ans_invisible();"><strong> Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se1_ans_sub" name="se1_ans_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else { ?>
                    <tr>
                    <td ><strong>Sample Answer Sheets SE1</strong></td>
                    <td ><input style="display:none" type="file" id="se1_ans_file" name="se1_ans_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_ans_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_ans_attach" name="se1_ans_attach" onclick="se1_ans_invisible();"><strong> Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se1_ans_sub" name="se1_ans_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } if(!empty($row['se2_proof'])) 
                    { ?>
                  <tr>
                    <td ><strong>SE-2 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se2_file" name="se2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['se2_path'];?>"><?php $se2=$row['se2_proof']; echo explode('_', $se2, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_attach" name="se2_attach" onclick="se2_invisible();"><strong> Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se2_sub" name="se2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } else { ?>
                    <tr>
                    <td ><strong>SE-2 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se2_file" name="se2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_attach" name="se2_attach" onclick="se2_invisible();"><strong> Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se2_sub" name="se2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } if(!empty($row['se2_sam_proof'])) { ?>
                    <tr>
                    <td ><strong>Sample Answer Sheets SE2</strong></td>
                    <td ><input style="display:none" type="file" id="se2_ans_file" name="se2_ans_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_ans_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['se2_sam_path'];?>"><?php $se2_sam=$row['se2_sam_proof']; echo explode('_', $se2_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_ans_attach" name="se2_ans_attach" onclick="se2_ans_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"id="se2_ans_sub" name="se2_ans_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                 <?php } else {?>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE2</strong></td>
                    <td ><input style="display:none" type="file" id="se2_ans_file" name="se2_ans_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_ans_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_ans_attach" name="se2_ans_attach" onclick="se2_ans_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"id="se2_ans_sub" name="se2_ans_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['assign1_proof'])) { ?>
                  <tr>
                    <td ><strong>Assignment-I</strong></td>
                  <td><input style="display:none" type="file" id="assign1_file" name="assign1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign1_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['assign1_path'];?>"><?php $assign1=$row['assign1_proof']; echo explode('_', $assign1, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_attach" name="assign1_attach" onclick="assign1_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sub" name="assign1_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Assignment-I</strong></td>
                  <td><input style="display:none" type="file" id="assign1_file" name="assign1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_attach" name="assign1_attach" onclick="assign1_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sub" name="assign1_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['assign1_sam_proof'])) { ?>
                  <tr>
                    <td ><strong>Sample Assignment-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign1_sam_file" name="assign1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="assign1_sam_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['assign1_sam_path'];?>"><?php $assign1_sam=$row['assign1_sam_proof']; echo explode('_', $assign1_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_sam_attach" name="assign1_sam_attach" onclick="assign1_sam_invisible();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sam_sub" name="assign1_sam_sub"value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Sample Assignment-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign1_sam_file" name="assign1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="assign1_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_sam_attach" name="assign1_sam_attach" onclick="assign1_sam_invisible();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sam_sub" name="assign1_sam_sub"value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['assign2_proof'])) { ?>
                  <tr>
                    <td ><strong>Assignment-II</strong></td>
                    <td><input style="display:none" type="file" id="assign2_file" name="assign2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign2_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['assign2_path'];?>"><?php $assign2=$row['assign2_proof']; echo explode('_', $assign2, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_attach" name="assign2_attach" onclick="assign2_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sub" name="assign2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Assignment-II</strong></td>
                    <td><input style="display:none" type="file" id="assign2_file" name="assign2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_attach" name="assign2_attach" onclick="assign2_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sub" name="assign2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['assign2_sam_proof'])) { ?>
                  <tr>
                    <td ><strong>Sample Assignment-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign2_sam_file" name="assign2_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign2_sam_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['assign2_sam_path'];?>"><?php $assign2_sam=$row['assign2_sam_proof']; echo explode('_', $assign2_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_sam_attach" name="assign2_sam_attach" onclick="assign2_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sam_sub" name="assign2_sam_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Sample Assignment-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign2_sam_file" name="assign2_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign2_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_sam_attach" name="assign2_sam_attach" onclick="assign2_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sam_sub" name="assign2_sam_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['assign3_proof'])) { ?>
                  <tr>
                    <td ><strong>Assignment-III</strong></td>
                    <td><input style="display:none" type="file" id="assign3_file" name="assign3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign3_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['assign3_path'];?>"><?php $assign3=$row['assign3_proof']; echo explode('_', $assign3, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_attach" name="assign3_attach" onclick="assign3_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sub" name="assign3_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Assignment-III</strong></td>
                    <td><input style="display:none" type="file" id="assign3_file" name="assign3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign3_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_attach" name="assign3_attach" onclick="assign3_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sub" name="assign3_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['assign3_sam_proof'])) { ?>
                  <tr>
                    <td ><strong>Sample Assignment-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign3_sam_file" name="assign3_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign3_sam_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['assign3_sam_path'];?>"><?php $assign3_sam=$row['assign3_sam_proof']; echo explode('_', $assign3_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_sam_attach" name="assign3_sam_attach" onclick="assign3_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sam_sub" name="assign3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                  <tr>
                    <td ><strong>Sample Assignment-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign3_sam_file" name="assign3_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign3_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_sam_attach" name="assign3_sam_attach" onclick="assign3_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sam_sub" name="assign3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['quiz1_proof'])) { ?>
                  <tr>
                    <td ><strong>Quiz-I</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_file" name="quiz1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz1_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['quiz1_path'];?>"><?php $quiz1=$row['quiz1_proof']; echo explode('_', $quiz1, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_attach" name="quiz1_attach" onclick="quiz1_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sub" name="quiz1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Quiz-I</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_file" name="quiz1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_attach" name="quiz1_attach" onclick="quiz1_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sub" name="quiz1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['quiz1_sam_proof'])) { ?>
                  <tr>
                    <td ><strong>Sample Quiz-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_sam_file" name="quiz1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz1_sam_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['quiz1_sam_path'];?>"><?php $quiz1_sam=$row['quiz1_sam_proof']; echo explode('_', $quiz1_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_sam_attach" name="quiz1_sam_attach" onclick="quiz1_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sam_sub" name="quiz1_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Sample Quiz-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_sam_file" name="quiz1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz1_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_sam_attach" name="quiz1_sam_attach" onclick="quiz1_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sam_sub" name="quiz1_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['quiz2_proof'])) { ?>
                  <tr>
                    <td ><strong>Quiz-II</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_file" name="quiz2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz2_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['quiz2_path'];?>"><?php $quiz2=$row['quiz2_proof']; echo explode('_', $quiz2, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_attach" name="quiz2_attach" onclick="quiz2_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sub" name="quiz2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Quiz-II</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_file" name="quiz2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_attach" name="quiz2_attach" onclick="quiz2_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sub" name="quiz2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['quiz2_sam_proof'])) { ?>
                  <tr>
                    <td ><strong>Sample Quiz-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_sam_file" name="quiz2_sam_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz2_sam_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['quiz2_sam_path'];?>"><?php $quiz2_sam=$row['quiz2_sam_proof']; echo explode('_', $quiz2_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_sam_attach" name="quiz2_sam_attach" onclick="quiz2_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sam_sub" name="quiz2_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Sample Quiz-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_sam_file" name="quiz2_sam_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz2_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_sam_attach" name="quiz2_sam_attach" onclick="quiz2_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sam_sub" name="quiz2_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['quiz3_proof'])) { ?>
                  <tr>
                    <td ><strong>Quiz-III</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_file" name="quiz3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz3_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['quiz3_path'];?>"><?php $quiz3=$row['quiz3_proof']; echo explode('_', $quiz3, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_attach" name="quiz3_attach" onclick="quiz3_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sub" name="quiz3_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Quiz-III</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_file" name="quiz3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz3_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_attach" name="quiz3_attach" onclick="quiz3_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sub" name="quiz3_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['quiz3_sam_proof'])) { ?>
                  <tr>
                    <td ><strong>Sample Quiz-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_sam_file" name="quiz3_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz3_sam_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['quiz3_sam_path'];?>"><?php $quiz3_sam=$row['quiz3_sam_proof']; echo explode('_', $quiz3_sam, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_sam_attach" name="quiz3_sam_attach" onclick="quiz3_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sam_sub" name="quiz3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Sample Quiz-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_sam_file" name="quiz3_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz3_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_sam_attach" name="quiz3_sam_attach" onclick="quiz3_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sam_sub" name="quiz3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php }if(!empty($row['model_que_proof'])) { ?>
                  <tr>
                    <td ><strong>Model Question Paper</strong></td>
                    <td><input style="display:none" type="file" id="model_file" name="model_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="model_material"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['model_que_path'];?>"><?php $model=$row['model_que_proof']; echo explode('_', $model, 3)[2];?></a></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="model_attach" name="model_attach" onclick="model_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="model_sub" name="model_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <?php } else {?>
                    <tr>
                    <td ><strong>Model Question Paper</strong></td>
                    <td><input style="display:none" type="file" id="model_file" name="model_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="model_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="model_attach" name="model_attach" onclick="model_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="model_sub" name="model_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                        <?php } } } else {?>
                          <tr>
                       <td width="225"><strong>Course Plan</strong></td>
                      <td width="600"><input style="display:none" type="file" id="course_plan_file" name="course_plan_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="course_plan_material"></span></td>
                    <td  width="150" style="text-align: center;"><a class="btn btn-primary btn-xs" id="course_plan_attach" name="course_plan_attach" onclick="course_plan_invisible();"><strong> Attach</strong> </a>
                    <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="course_plan_sub" name="course_plan_sub"  value="Submit" > <strong> </strong></a></td>
                  </tr>
                    <tr>
                     <td ><strong>e-book1 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook1_file" name="ebook1_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="ebook1_material"></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook1_attach" name="ebook1_attach" onclick="ebook1_mat();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook1_sub" name="ebook1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                     <td ><strong>e-book2 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook2_file" name="ebook2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="ebook2_material"></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook2_attach" name="ebook2_attach" onclick="ebook2_mat();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook2_sub" name="ebook2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>SE-1 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se1_file" name="se1_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_attach" name="se1_attach" onclick="se1_invisible();"><strong> Attach</strong> </a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="se1_sub" name="se1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE1</strong></td>
                    <td ><input style="display:none" type="file" id="se1_ans_file" name="se1_ans_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_ans_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_ans_attach" name="se1_ans_attach" onclick="se1_ans_invisible();"><strong> Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se1_ans_sub" name="se1_ans_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>SE-2 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se2_file" name="se2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_attach" name="se2_attach" onclick="se2_invisible();"><strong> Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se2_sub" name="se2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE2</strong></td>
                    <td ><input style="display:none" type="file" id="se2_ans_file" name="se2_ans_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_ans_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_ans_attach" name="se2_ans_attach" onclick="se2_ans_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"id="se2_ans_sub" name="se2_ans_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-I</strong></td>
                  <td><input style="display:none" type="file" id="assign1_file" name="assign1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_attach" name="assign1_attach" onclick="assign1_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sub" name="assign1_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign1_sam_file" name="assign1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="assign1_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_sam_attach" name="assign1_sam_attach" onclick="assign1_sam_invisible();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sam_sub" name="assign1_sam_sub"value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-II</strong></td>
                    <td><input style="display:none" type="file" id="assign2_file" name="assign2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_attach" name="assign2_attach" onclick="assign2_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sub" name="assign2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign2_sam_file" name="assign2_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign2_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_sam_attach" name="assign2_sam_attach" onclick="assign2_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sam_sub" name="assign2_sam_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-III</strong></td>
                    <td><input style="display:none" type="file" id="assign3_file" name="assign3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign3_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_attach" name="assign3_attach" onclick="assign3_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sub" name="assign3_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign3_sam_file" name="assign3_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign3_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_sam_attach" name="assign3_sam_attach" onclick="assign3_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sam_sub" name="assign3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-I</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_file" name="quiz1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_attach" name="quiz1_attach" onclick="quiz1_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sub" name="quiz1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_sam_file" name="quiz1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz1_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_sam_attach" name="quiz1_sam_attach" onclick="quiz1_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sam_sub" name="quiz1_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-II</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_file" name="quiz2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_attach" name="quiz2_attach" onclick="quiz2_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sub" name="quiz2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_sam_file" name="quiz2_sam_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz2_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_sam_attach" name="quiz2_sam_attach" onclick="quiz2_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sam_sub" name="quiz2_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-III</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_file" name="quiz3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz3_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_attach" name="quiz3_attach" onclick="quiz3_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sub" name="quiz3_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_sam_file" name="quiz3_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz3_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_sam_attach" name="quiz3_sam_attach" onclick="quiz3_sam_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sam_sub" name="quiz3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Model Question Paper</strong></td>
                    <td><input style="display:none" type="file" id="model_file" name="model_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="model_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="model_attach" name="model_attach" onclick="model_invisible();"> <strong>Attach </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="model_sub" name="model_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                        <?php } ?>

                </tbody>
                 </table>
                 </div>
                         </div>
                         </form>
                      <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
             
              </div>
               </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <br />
          <table class="table table-bordered jambo_table bulk_action" >
          
                 <thead>
                 <tr>
                 <th>S.No</th>
                          <th style="text-align: center;">Date</th>
                          <th style="text-align: center;">Day</th>
                          <th style="text-align: center;">Slot</th>
                          <th style="text-align: center;">Topic</th>
                          <th style="text-align: center;">Materials</th>
              <th style="text-align: center;">Edit</th>
              </tr>
                      </thead>
               <?php 
    $count=1;
    $token=$_SESSION['token'];
    $name=$_SESSION['username'];
    $fpid=$_SESSION['fpid'];
  $course_id = $_GET['course_id'];
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
   // print_r($request); $m=$request->data->time_table[0]; echo $m;
  // $co=count($request['time_table']); echo $co; 
    foreach ($request as $data)
{
  $co=count($data['time_table']); //echo $co;
 
      for($i=0;$i<$co;$i++) {
 
  $date=$data['time_table'][$i]['date_of_the_day'];
  $day_order=$data['time_table'][$i]['day_order'];
  $slot_id=$data['time_table'][$i]['slot_id'];
  //$day=$row->day_order;
 // $slot=$row->slot_name;
  $_SESSION['date']=$date;
 // $_SESSION['day']=$day;
 $_SESSION['day_order']=$day_order;
 $_SESSION['slot_id']=$slot_id;  
  ?>
   <tbody>
                  <tr>
          
                <td width="10"><?php echo $count; ?></td>
                <td width="20"><?php echo ((date('d/m/Y', strtotime($date))))?></td>
                <td width="10"><?php $timestamp = strtotime($date);
                $day = date('D', $timestamp);echo $day;?></td>
             <td width="60"><?php if($slot_id==4){ echo "Slot-1"; }
                                  if($slot_id==5){ echo "Slot-2"; }
                                  if($slot_id==6){ echo "Slot-3"; }
                                  if($slot_id==7){ echo "Slot-4"; }
                                  if($slot_id==10){ echo "Slot-5"; }
                                  if($slot_id==11){ echo "Slot-6"; }
                                  if($slot_id==12){ echo "Slot-7"; }
                                  if($slot_id==13){ echo "Slot-8"; }
                                  if($slot_id==15){ echo "Slot-9"; };?></td> 
                <?php  
            require_once 'config.php'; 
               $query="SELECT * from materials_add where academic_year='$ac_year' AND semester='$semester' AND staff_id='$name' AND course_code='$course_code' AND date='$date' AND day_order='$day_order' AND slot_id='$slot_id'";
                 $result=mysqli_query($conn,$query); 
                 if (mysqli_num_rows($result) != 0)
                 {
                 while($row=mysqli_fetch_assoc($result))
                                {
                                 $mat1= $row['material1_path'];
                                 $mat2= $row['material2_path'];
                                 $web1= $row['web_link1_name'];
                                 $web2= $row['web_link2_name'];
                ?>
                <td width="400"><label id="topic" name="topic"><?php echo $row['topic'];?></label></td>
                <td>
               <?php if(!empty($mat1))
                {?>
                <a href="<?php echo $row['material1_path'];?>" ><u><strong>Material1</strong></u></a><br>
               <?php } else { ?>
               
               <?php } 
               if(!empty($mat2))
                {?>
                <a href="<?php echo $row['material2_path'];?>" ><u><strong>Material2</strong></u></a><br>
                <?php } else { ?>
                 
               <?php } 
               if(!empty($web1))
                {?>
                <a href="<?php echo $row['web_link1_name'];?>" ><u><strong>Web Link1</strong></u></a><br>
                <?php } else { ?>
                  
               <?php } 
               if(!empty($web2))
                {?>
                <a href="<?php echo $row['web_link2_name'];?>" ><u><strong>Web Link2</strong></u></a>
                <?php } else { ?>
                  <a href="" ><u><strong></strong></u></a>
                  <?php } ?>
              </td>
              <?php } } else{ ?>
                <td width="400"><label id="topic" name="topic"></label></td>
                <td>
                
              </td>
            <?php  } ?>
              <td style="text-align: center;"><a class="btn btn-primary btn-xs btn-round" id="lecture_submit" href="my_course_page_add.php?course_code=<?php echo $course_code;?>&course_name=<?php echo $course_name;?>&date=<?php echo ((date('Y-m-d', strtotime($date))));?>&day=<?php echo $day;?>&day_order=<?php echo $day_order;?>&ac_year=<?php echo $ac_year?>&slot_id=<?php echo $slot_id;?>&semester=<?php echo $semester?>" name="lecture_submit"> <strong>Add/Edit</strong> </a></td>
                  </tr>
   <?php
   
            
              $count++;    }  } 
                      ?>
                 
       </tr>
       </tbody>
       </table>
         </div>
                </div>
                           </div></div></div></div></div></div> </div></div>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
    <!-- Validate numbers Only -->
    
  </body>
</html>
<script type="text/javascript">
                     function sub()
                     {
                       alert("Do you want to Save?");
                       return true;
                     }
</script>
<script type="text/javascript">
function course_plan_invisible()
{
    $("#course_plan_file").click();
    var fileupload = $("#course_plan_file");
    var filePath = $("#course_plan_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#course_plan_attach").hide();
        $("#course_plan_sub").show();
       
}

function ebook1_mat()
{
    $("#ebook1_file").click();
    var fileupload = $("#ebook1_file");
    var filePath = $("#ebook1_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#ebook1_attach").hide();
        $("#ebook1_sub").show();
}

function ebook2_mat()
{
    $("#ebook2_file").click();
    var fileupload = $("#ebook2_file");
    var filePath = $("#ebook2_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#ebook2_attach").hide();
        $("#ebook2_sub").show();
}

function se1_invisible()
{
    $("#se1_file").click();
    var fileupload = $("#se1_file");
    var filePath = $("#se1_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#se1_attach").hide();
        $("#se1_sub").show();
}

function se1_ans_invisible()
{
    $("#se1_ans_file").click();
    var fileupload = $("#se1_ans_file");
    var filePath = $("#se1_ans_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#se1_ans_attach").hide();
        $("#se1_ans_sub").show();
}

function se2_invisible()
{
    $("#se2_file").click();
    var fileupload = $("#se2_file");
    var filePath = $("#se2_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#se2_attach").hide();
        $("#se2_sub").show();
}

function se2_ans_invisible()
{
    $("#se2_ans_file").click();
    var fileupload = $("#se2_ans_file");
    var filePath = $("#se2_ans_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#se2_ans_attach").hide();
        $("#se2_ans_sub").show();
}

function assign1_invisible()
{
    $("#assign1_file").click();
    var fileupload = $("#assign1_file");
    var filePath = $("#assign1_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#assign1_attach").hide();
        $("#assign1_sub").show();
}

function assign1_sam_invisible()
{
    $("#assign1_sam_file").click();
    var fileupload = $("#assign1_sam_file");
    var filePath = $("#assign1_sam_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#assign1_sam_attach").hide();
        $("#assign1_sam_sub").show();
}

function assign2_invisible()
{
    $("#assign2_file").click();
    var fileupload = $("#assign2_file");
    var filePath = $("#assign2_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#assign2_attach").hide();
        $("#assign2_sub").show();
}

function assign2_sam_invisible()
{
    $("#assign2_sam_file").click();
    var fileupload = $("#assign2_sam_file");
    var filePath = $("#assign2_sam_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#assign2_sam_attach").hide();
        $("#assign2_sam_sub").show();
}

function assign3_invisible()
{
    $("#assign3_file").click();
    var fileupload = $("#assign3_file");
    var filePath = $("#assign3_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#assign3_attach").hide();
        $("#assign3_sub").show();
}

function assign3_sam_invisible()
{
    $("#assign3_sam_file").click();
    var fileupload = $("#assign3_sam_file");
    var filePath = $("#assign3_sam_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#assign3_sam_attach").hide();
        $("#assign3_sam_sub").show();
}

function quiz1_invisible()
{
    $("#quiz1_file").click();
    var fileupload = $("#quiz1_file");
    var filePath = $("#quiz1_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#quiz1_attach").hide();
        $("#quiz1_sub").show();
}

function quiz1_sam_invisible()
{
    $("#quiz1_sam_file").click();
    var fileupload = $("#quiz1_sam_file");
    var filePath = $("#quiz1_sam_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#quiz1_sam_attach").hide();
        $("#quiz1_sam_sub").show();
}

function quiz2_invisible()
{
    $("#quiz2_file").click();
    var fileupload = $("#quiz2_file");
    var filePath = $("#quiz2_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#quiz2_attach").hide();
        $("#quiz2_sub").show();
}

function quiz2_sam_invisible()
{
    $("#quiz2_sam_file").click();
    var fileupload = $("#quiz2_sam_file");
    var filePath = $("#quiz2_sam_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#quiz2_sam_attach").hide();
        $("#quiz2_sam_sub").show();
}

function quiz3_invisible()
{
    $("#quiz3_file").click();
    var fileupload = $("#quiz3_file");
    var filePath = $("#quiz3_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#quiz3_attach").hide();
        $("#quiz3_sub").show();
}

function quiz3_sam_invisible()
{
    $("#quiz3_sam_file").click();
    var fileupload = $("#quiz3_sam_file");
    var filePath = $("#quiz3_sam_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#quiz3_sam_attach").hide();
        $("#quiz3_sam_sub").show();
}

function model_invisible()
{
    $("#model_file").click();
    var fileupload = $("#model_file");
    var filePath = $("#model_material");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#model_attach").hide();
        $("#model_sub").show();
}

</script>



