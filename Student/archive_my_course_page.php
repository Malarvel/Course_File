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
       <?php
       $course_code = $_GET['course_code'];
       $course_name = $_GET['course_name'];
       $semester = $_GET['semester'];
       $ac_year = $_GET['ac_year']; 
       // $staff_name=$_GET['staff_name']; 
        $staff_id=$_GET['staff_id'];
        ?>
                  <div class="x_content">
                           <div class="row">
                           <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Academic Year :</label>
                            <label style="color:#5F9EA0"><?php echo $ac_year;?></label>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Semester :</label>
                            <label style="color:#5F9EA0"><?php  echo $semester;?></label>
                        </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Course Code :</label>
                            <label style="color:#5F9EA0"><?php echo $course_code; ?></label>
                        </div>
                       <div class="col-md-4 col-sm-3 col-xs-2 ">
                       <label style="color:#F0B27A">Course Name :</label>
                            <label style="color:#5F9EA0"><?php  echo $course_name; ?></label>
                                    </div>
                                  </div>
                         </br>
                         <form Method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" action="">
                        
                             <div class="form-group">
                               <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered">
                       <tbody>
                                      <tr>
                                      
                      <!-- <td width="225"><strong>Syllabus</strong></td>
                  <td><p><em>Syllabus Available</p></em></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="lecture_submit" name="lecture_submit" href="Calendar.pdf" download="Syllabus"> <strong>Download</strong> </a></td> 
                    </tr> -->
                    <?php
                            
                                require_once 'config.php'; 
                                $query="SELECT * from course_details where staff_fid='$staff_id' AND course_code='$course_code' AND course_name='$course_name' ";
                             //  echo $query;
                                $result=mysqli_query($conn,$query); //print_r($result);
                                if (mysqli_num_rows($result) != 0)
                                {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                 ?>
                          <tr>
                       <td width="225"><strong>Course Plan</strong></td>
                      <td width="600"><input style="display:none" type="file" id="course_plan_file" name="course_plan_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="course_plan_material"></span></td>
                    <td  width="150" style="text-align: center;"><a href="<?php echo $row['course_plan_path'];?>" class="btn btn-primary btn-xs" id="course_plan_attach" name="course_plan_attach" Download><strong> Download</strong> </a>
                  </tr>
                    <tr>
                     <td ><strong>e-book1 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook1_file" name="ebook1_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="ebook1_material"></span></td>
                     <td style="text-align: center;"><a href="<?php echo $row['ebook1_path'];?>" class="btn btn-primary btn-xs" id="ebook1_attach" name="ebook1_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                     <td ><strong>e-book2 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook2_file" name="ebook2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="ebook2_material"></span></td>
                     <td style="text-align: center;"><a href="<?php echo $row['ebook2_path'];?>" class="btn btn-primary btn-xs" id="ebook2_attach" name="ebook2_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>SE-1 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se1_file" name="se1_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['se1_path'];?>" class="btn btn-primary btn-xs" id="se1_attach" name="se1_attach" Download><strong> Download</strong> </a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE1</strong></td>
                    <td ><input style="display:none" type="file" id="se1_ans_file" name="se1_ans_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_ans_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['se1_sam_path'];?>" class="btn btn-primary btn-xs" id="se1_ans_attach" name="se1_ans_attach" Download><strong> Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>SE-2 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se2_file" name="se2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['se2_path'];?>" class="btn btn-primary btn-xs" id="se2_attach" name="se2_attach" Download><strong> Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE2</strong></td>
                    <td ><input style="display:none" type="file" id="se2_ans_file" name="se2_ans_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_ans_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['se2_sam_path'];?>" class="btn btn-primary btn-xs" id="se2_ans_attach" name="se2_ans_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-I</strong></td>
                  <td><input style="display:none" type="file" id="assign1_file" name="assign1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign1_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['assign1_path'];?>" class="btn btn-primary btn-xs" id="assign1_attach" name="assign1_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign1_sam_file" name="assign1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="assign1_sam_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['assign1_sam_path'];?>" class="btn btn-primary btn-xs" id="assign1_sam_attach" name="assign1_sam_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-II</strong></td>
                    <td><input style="display:none" type="file" id="assign2_file" name="assign2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign2_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['assign2_path'];?>" class="btn btn-primary btn-xs" id="assign2_attach" name="assign2_attach" Download><strong>Download</strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sub" name="assign2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign2_sam_file" name="assign2_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign2_sam_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['assign2_sam_path'];?>"  class="btn btn-primary btn-xs" id="assign2_sam_attach" name="assign2_sam_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-III</strong></td>
                    <td><input style="display:none" type="file" id="assign3_file" name="assign3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign3_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['assign3_path'];?>" class="btn btn-primary btn-xs" id="assign3_attach" name="assign3_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign3_sam_file" name="assign3_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign3_sam_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['assign3_sam_path'];?>" class="btn btn-primary btn-xs" id="assign3_sam_attach" name="assign3_sam_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-I</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_file" name="quiz1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz1_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['quiz1_path'];?>" class="btn btn-primary btn-xs" id="quiz1_attach" name="quiz1_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_sam_file" name="quiz1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz1_sam_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['quiz1_sam_path'];?>" class="btn btn-primary btn-xs" id="quiz1_sam_attach" name="quiz1_sam_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-II</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_file" name="quiz2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz2_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['quiz2_path'];?>" class="btn btn-primary btn-xs" id="quiz2_attach" name="quiz2_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_sam_file" name="quiz2_sam_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz2_sam_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['quiz2_sam_path'];?>" class="btn btn-primary btn-xs" id="quiz2_sam_attach" name="quiz2_sam_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-III</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_file" name="quiz3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz3_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['quiz3_path'];?>" class="btn btn-primary btn-xs" id="quiz3_attach" name="quiz3_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_sam_file" name="quiz3_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz3_sam_material"></span></td>
                    <td style="text-align: center;"><a href="<?php echo $row['quiz3_sam_path'];?>" class="btn btn-primary btn-xs" id="quiz3_sam_attach" name="quiz3_sam_attach" Download><strong>Download</strong></a>
                  </tr>
                  <tr>
                    <td ><strong>Model Question Paper</strong></td>
                    <td><input style="display:none" type="file" id="model_file" name="model_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="model_material"></td>
                    <td style="text-align: center;"><a href="<?php echo $row['model_que_path'];?>" class="btn btn-primary btn-xs" id="model_attach" name="model_attach" Download><strong>Download</strong></a>
                  </tr>
                        <?php } }else{?>
                          <tr>
                       <td width="225"><strong>Course Plan</strong></td>
                      <td width="600"><input style="display:none" type="file" id="course_plan_file" name="course_plan_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="course_plan_material"></span></td>
                    <td  width="150" style="text-align: center;"><a class="btn btn-primary btn-xs" id="course_plan_attach" name="course_plan_attach" onclick="course_plan_invisible();"><strong> Download</strong> </a>
                    <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="course_plan_sub" name="course_plan_sub"  value="Submit" > <strong> </strong></a></td>
                  </tr>
                    <tr>
                     <td ><strong>e-book1 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook1_file" name="ebook1_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="ebook1_material"></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook1_attach" name="ebook1_attach" onclick="ebook1_mat();"> <strong>Download </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook1_sub" name="ebook1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                     <td ><strong>e-book2 </strong></td>
                     <td ><input style="display:none" type="file" id="ebook2_file" name="ebook2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="ebook2_material"></span></td>
                     <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="ebook2_attach" name="ebook2_attach" onclick="ebook2_mat();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="ebook2_sub" name="ebook2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>SE-1 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se1_file" name="se1_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_attach" name="se1_attach" onclick="se1_invisible();"><strong> Download</strong> </a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="se1_sub" name="se1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE1</strong></td>
                    <td ><input style="display:none" type="file" id="se1_ans_file" name="se1_ans_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="se1_ans_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se1_ans_attach" name="se1_ans_attach" onclick="se1_ans_invisible();"><strong> Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se1_ans_sub" name="se1_ans_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>SE-2 QP+Key</strong></td>
                    <td ><input style="display:none" type="file" id="se2_file" name="se2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_attach" name="se2_attach" onclick="se2_invisible();"><strong> Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"  id="se2_sub" name="se2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Answer Sheets SE2</strong></td>
                    <td ><input style="display:none" type="file" id="se2_ans_file" name="se2_ans_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="se2_ans_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="se2_ans_attach" name="se2_ans_attach" onclick="se2_ans_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs"id="se2_ans_sub" name="se2_ans_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-I</strong></td>
                  <td><input style="display:none" type="file" id="assign1_file" name="assign1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_attach" name="assign1_attach" onclick="assign1_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sub" name="assign1_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign1_sam_file" name="assign1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="assign1_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign1_sam_attach" name="assign1_sam_attach" onclick="assign1_sam_invisible();"> <strong>Download </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign1_sam_sub" name="assign1_sam_sub"value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-II</strong></td>
                    <td><input style="display:none" type="file" id="assign2_file" name="assign2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_attach" name="assign2_attach" onclick="assign2_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sub" name="assign2_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign2_sam_file" name="assign2_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign2_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign2_sam_attach" name="assign2_sam_attach" onclick="assign2_sam_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign2_sam_sub" name="assign2_sam_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Assignment-III</strong></td>
                    <td><input style="display:none" type="file" id="assign3_file" name="assign3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="assign3_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_attach" name="assign3_attach" onclick="assign3_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sub" name="assign3_sub" value="Submit" > <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Assignment-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="assign3_sam_file" name="assign3_sam_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="assign3_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="assign3_sam_attach" name="assign3_sam_attach" onclick="assign3_sam_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="assign3_sam_sub" name="assign3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-I</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_file" name="quiz1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz1_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_attach" name="quiz1_attach" onclick="quiz1_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sub" name="quiz1_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-I Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz1_sam_file" name="quiz1_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz1_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz1_sam_attach" name="quiz1_sam_attach" onclick="quiz1_sam_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz1_sam_sub" name="quiz1_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-II</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_file" name="quiz2_file" class="form-control col-md-3 col-xs-3"   autocomplete="off"><span id="quiz2_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_attach" name="quiz2_attach" onclick="quiz2_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sub" name="quiz2_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-II Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz2_sam_file" name="quiz2_sam_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz2_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz2_sam_attach" name="quiz2_sam_attach" onclick="quiz2_sam_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz2_sam_sub" name="quiz2_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Quiz-III</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_file" name="quiz3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="quiz3_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_attach" name="quiz3_attach" onclick="quiz3_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sub" name="quiz3_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Sample Quiz-III Sheets</strong></td>
                    <td><input style="display:none" type="file" id="quiz3_sam_file" name="quiz3_sam_file" class="form-control col-md-3 col-xs-3" autocomplete="off"><span id="quiz3_sam_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="quiz3_sam_attach" name="quiz3_sam_attach" onclick="quiz3_sam_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="quiz3_sam_sub" name="quiz3_sam_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                  <tr>
                    <td ><strong>Model Question Paper</strong></td>
                    <td><input style="display:none" type="file" id="model_file" name="model_file" class="form-control col-md-3 col-xs-3"  autocomplete="off"><span id="model_material"></span></td>
                    <td style="text-align: center;"><a class="btn btn-primary btn-xs" id="model_attach" name="model_attach" onclick="model_invisible();"> <strong>Download </strong></a>
                   <input type="submit" style="display:none" class="btn btn-success btn-xs" id="model_sub" name="model_sub" value="Submit"> <strong> </strong></a></td>
                  </tr>
                        <?php }  ?>

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
          <table id="datatable-buttons" class="table table-bordered jambo_table bulk_action" >
          
                 <thead>
                 <tr>
                 <th>S.No</th>
                          <th style="text-align: center;">Date</th>
                          <th style="text-align: center;">Day</th>
                          <th style="text-align: center;">Slot</th>
                          <th style="text-align: center;">Topic</th>
                          <th style="text-align: center;">Materials</th>
              </tr>
                      </thead>
        
   <tbody>
                  <tr>
          
                
                <?php  
                $count=1;
                require_once 'config.php'; 
               $query="SELECT * from materials_add where academic_year='$ac_year' AND semester='$semester' AND staff_fid='$staff_id' AND course_code='$course_code' ";
                 $result=mysqli_query($conn,$query); //echo $query;
                 if (mysqli_num_rows($result) != 0)
                                {
                 while($row=mysqli_fetch_assoc($result))
                                {
                                 $date=$row['date'];
                                 $day=$row['day'];
                                 $slot_id=$row['slot_id'];
                                 $mat1= $row['material1_path'];
                                 $mat2= $row['material2_path'];
                                 $web1= $row['web_link1_name'];
                                 $web2= $row['web_link2_name'];
                ?>
                <td width="10"><?php echo $count; ?></td>
                <td width="20"><?php echo ((date('d/m/Y', strtotime($date))))?></td>
                <td width="25"><?php echo $day;?></td>
                <td width="70"><?php if($slot_id==4){ echo "Slot-1"; }
                                    if($slot_id==5){ echo "Slot-2"; }
                                    if($slot_id==6){ echo "Slot-3"; }
                                    if($slot_id==7){ echo "Slot-4"; }
                                    if($slot_id==10){ echo "Slot-5"; }
                                    if($slot_id==11){ echo "Slot-6"; }
                                    if($slot_id==12){ echo "Slot-7"; }
                                    if($slot_id==13){ echo "Slot-8"; }
                                    if($slot_id==15){ echo "Slot-9"; };?></td>
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
                 </td>
                 <td></td> </tr>
                <?php } ?>
                </tr>
                 <?php $count++;  }}  else{ ?></tr>
              <td colspan="6" style="text-align:center"><centre><strong >No Data Available</strong></centre></td>
          <?php   } ?>
                 
       </tr>
       </tbody>
       </table>
         </div>
                </div></div></div>
                            </div></div></div></div></div></div>
              
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
