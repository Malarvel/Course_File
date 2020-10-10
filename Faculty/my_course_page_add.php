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
                  <h3><strong>Materials Upload</strong></h3>
               </div>
             </div>
            <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
  				    <div class="x_content">
                        <br /><br>
                           <form Method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" action="my_course_page_add_redir.php">
                           <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3 ">
                            <label style="color:#F0B27A">Course Code :</label>
                            <label style="color:#5F9EA0"><?php echo $course_code = $_GET['course_code']; ?></label>
                        </div>
                          <div class="col-md-2 col-sm-3 col-xs-2 ">
                           <label style="color:#F0B27A">Slot :</label>
                            <label style="color:#5F9EA0"><?php $slot_id = $_GET['slot_id'];
                                                          if($slot_id==4){ echo "Slot-1"; }
                                                          if($slot_id==5){ echo "Slot-2"; }
                                                          if($slot_id==6){ echo "Slot-3"; }
                                                          if($slot_id==7){ echo "Slot-4"; }
                                                          if($slot_id==10){ echo "Slot-5"; }
                                                          if($slot_id==11){ echo "Slot-6"; }
                                                          if($slot_id==12){ echo "Slot-7"; }
                                                          if($slot_id==13){ echo "Slot-8"; }
                                                          if($slot_id==15){ echo "Slot-9"; };?></label>
                                   
                          </div> 
                          <div class="col-md-2 col-sm-3 col-xs-2 ">
                           <label style="color:#F0B27A">Date :</label>
                            <label style="color:#5F9EA0"><?php $date = $_GET['date']; echo ((date('d/m/Y', strtotime($date))));?></label>
                                   
                          </div>
                       <div class="col-md-5 col-sm-3 col-xs-2 ">
                       <label style="color:#F0B27A">Course Name :</label>
                            <label style="color:#5F9EA0"><?php echo $course_name = $_GET['course_name'];?></label>
                                    </div>
                                  </div>
                         </br>
                         <input type="hidden" id="ac_year" value="<?php echo $ac_year = $_GET['ac_year'];?>"  name="ac_year"></td>
                         <input type="hidden" id="semester" value="<?php echo $semester = $_GET['semester'];?>"  name="semester"></td>
                         <input type="hidden" id="ccode" value="<?php echo $course_code = $_GET['course_code'];?>"  name="course_code"></td>
                         <input type="hidden" id="course_name" value="<?php echo $course_name = $_GET['course_name'];?>"  name="course_name"></td>
                         <input type="hidden" id="date" value="<?php echo $date = $_GET['date'];?>"  name="date"></td>
                         <input type="hidden" id="day" value="<?php echo $day = $_GET['day'];?>"  name="day"></td>
                         <input type="hidden" id="slot_id" value="<?php echo $slot = $_GET['slot_id'];?>"  name="slot_id"></td>
                         <input type="hidden" id="day_order" value="<?php echo $day_order = $_GET['day_order'];?>"  name="day_order"></td>
                             <div class="form-group">
                               <div class="table-responsive">
                               <?php
                               $staff_id=$_SESSION['username'];
                                require_once 'config.php'; 
                                $query="SELECT * from materials_add where academic_year='$ac_year' AND semester='$semester' AND staff_id='$staff_id' AND course_code='$course_code' AND date='$date' AND day_order='$day_order' AND slot_id='$slot_id'";
                                $result=mysqli_query($conn,$query);
                                if (mysqli_num_rows($result) != 0)
                                {
                        while($row=mysqli_fetch_assoc($result))
                        { 
                 ?>
                   <table class="table table-bordered ">
						           <tbody>
                                      <tr>
									     <td width="150"><strong>Lecture Topic</strong><span class="required" style="color:red;">*</span></td>
										 <td colspan="2" ><input type="text" id="topic" required="required"  autocomplete="off" name="topic" value="<?php echo $row['topic'];?>" class="form-control col-md-7 col-xs-12" ></td>
										 </tr>
									  <tr>
                    <?php if(!empty($row['material1_path'])) {?>
                    <td ><strong>Reference Material I</strong></td>
										 <td ><input  style="display:none" type="file" id="mat1_file" name="mat1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off">
										 <span id="File_Path" name="File_Path"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['material1_path'];?>"><?php $material1_proof_name=$row['material1_proof_name']; echo explode('_', $material1_proof_name, 3)[2];?></a></span></td>
                     <td width="150"  style="text-align: center;"><a    class="btn btn-primary btn-xs" id="mat1_attach1" name="fmat1_attach1" onclick="mat1_invisible();"> <strong>Attach </strong></a>
                     <input type="submit"   style="display:none" class="btn btn-success btn-xs" id="file1_sub" value="Submit" name="file1_sub" > <strong> </strong></a>
                    <?php } else{ ?>
                      <td ><strong>Reference Material I</strong></td>
										 <td ><input style="display:none" type="file" id="mat1_file" name="mat1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off">
										 <span id="File_Path" name="File_Path"></span></td>
                     <td width="150" style="text-align: center;"><a  class="btn btn-primary btn-xs" id="mat1_attach1" name="fmat1_attach1" onclick="mat1_invisible();"> <strong>Attach </strong></a>
                     <input type="submit" style="display:none" class="btn btn-success btn-xs" id="file1_sub" value="Submit" name="file1_sub" > <strong> </strong></a>
                    <?php } ?>  </tr>
						
									<tr>
                  <?php if(!empty($row['material2_path'])) {?>
										<td ><strong>Reference Material II</strong></td>
										<td ><input  style="display:none" type="file" id="mat2_file" name="mat2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off">
                    <span id="File_Path2"><strong style="color:#71A5CB">Uploaded File : </strong><a href="<?php echo $row['material2_path'];?>"><?php $material2_proof_name=$row['material2_proof_name']; echo explode('_', $material2_proof_name, 3)[2];?></span></td></td>
										<td style="text-align: center;"><a  class="btn btn-primary btn-xs" id="mat2_attach2" name="mat2_attach2" onclick="mat2_invisible();"><strong> Attach</strong> </a>
                      <input  style="display:none" type="submit" class="btn btn-success btn-xs" value="Submit"  id="file2_sub" name="file2_sub" > <strong> </strong></a></td>
                     <?php } else{ ?>
                      <td ><strong>Reference Material II</strong></td>
										<td ><input style="display:none" type="file" id="mat2_file" name="mat2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off">
                    <span id="File_Path2"></td>
										<td style="text-align: center;"><a class="btn btn-primary btn-xs" id="mat2_attach2" name="mat2_attach2" onclick="mat2_invisible();"><strong> Attach</strong> </a>
                        <input style="display:none" type="submit" class="btn btn-success btn-xs" value="Submit"  id="file2_sub" name="file2_sub" > <strong> </strong></a></td>
                  </tr>
                     <?php } ?>
                  <tr> 
										<td ><strong>Web Material I</strong></td>
										<td colspan="2"><input type="text" id="web_link"  autocomplete="off" name="web_link" value="<?php echo $row['web_link1_name'];?>" class="form-control col-md-7 col-xs-12" ></td>
										</tr><br>
                  <tr> 
										<td ><strong>Web Material II</strong></td>
										<td colspan="2"><input type="text" id="web_link2"  autocomplete="off" name="web_link2" value="<?php echo $row['web_link2_name'];?>" class="form-control col-md-7 col-xs-12" ></td>
										</tr>
								</tbody>
						     </table>        
                              
                        <?php } } else { ?>     
                          
                                <table class="table table-bordered  ">
						           <tbody>
                                      <tr>
									     <td width="150"><strong>Lecture Topic</strong><span class="required" style="color:red;">*</span></td>
										 <td colspan="2"><input type="text" id="topic" required="required"  autocomplete="off" name="topic"  class="form-control col-md-7 col-xs-12" ></td>
										 </tr>
									  <tr>
										 <td ><strong>Reference Material I</strong></td>
										 <td ><input style="display:none" type="file" id="mat1_file" name="mat1_file" class="form-control col-md-3 col-xs-3"   autocomplete="off">
										 <span id="File_Path"></span></td>
                     <td width="150" style="text-align: center;"><a class="btn btn-primary btn-xs" id="mat1_attach1" name="mat1_attach1" onclick="mat1_invisible();"> <strong>Attach </strong></a>
										 <a type="file" class="btn btn-success btn-xs" style="display:none" id="sub1" name="sub1" ><strong>Submit </strong></a></td>

									</tr>
									<tr>
										<td ><strong>Reference Material II</strong></td>
										<td ><input style="display:none" type="file" id="mat2_file" name="mat2_file" class="form-control col-md-3 col-xs-3"  autocomplete="off">
                    <span id="File_Path2"></span></td></td>
										<td style="text-align: center;"><a class="btn btn-primary btn-xs" id="mat2_attach2" name="mat2_attach2" onclick="mat2_invisible();"><strong> Attach</strong> </a>
										<a class="btn btn-success btn-xs" style="display:none" id="sub2" name="sub2" > <strong>Submit </strong></a></td>
									</tr>
									<!--<tr>
										<td ><strong>Reference Material III</strong></td>
										<td ><input style="display:none" type="file" id="mat3_file" name="mat3_file" class="form-control col-md-3 col-xs-3"  autocomplete="off">
                    <span id="File_Path3"></span></td></td>
										<td style="text-align: center;"><a class="btn btn-primary btn-xs" id="mat3_attach3" name="mat3_attach3" onclick="mat3_invisible();"><strong> Attach </strong></a>
										<a class="btn btn-success btn-xs" style="display:none" id="sub3" name="sub3" > <strong>Submit </strong></a></td>
									</tr>
									<tr>
										<td ><strong>Reference Material VI</strong></td>
										<td ><input style="display:none" type="file" id="mat4_file" name="mat4_file" class="form-control col-md-3 col-xs-3"   autocomplete="off">
                    <span id="File_Path4"></span></td></td>
										<td style="text-align: center;"><a class="btn btn-primary btn-xs" id="mat4_attach4" name="mat4_attach4" onclick="mat4_invisible();"><strong> Attach </strong></a>
										<a class="btn btn-success btn-xs" style="display:none" id="sub4" name="sub4" > <strong>Submit </strong></a></td>
									</tr>
									<tr>
										<td ><strong>Reference Material V</strong></td>
										<td ><input style="display:none" type="file" id="mat5_file" name="mat5_file" class="form-control col-md-3 col-xs-3"   autocomplete="off">
                    <span id="File_Path5"></span></td></td>
										<td style="text-align: center;"><a class="btn btn-primary btn-xs" id="mat5_attach5" name="mat5_attach5" onclick="mat5_invisible();"> <strong>Attach </strong></a>
										<a class="btn btn-success btn-xs" style="display:none" id="sub5" name="sub5" > <strong>Submit </strong></a></td>
									</tr>-->
									<tr> 
										<td ><strong>Web Material I</strong></td>
										<td colspan="2"><input type="text" id="web_link"  autocomplete="off" name="web_link"  class="form-control col-md-7 col-xs-12" ></td>
									</tr><br>
                  <tr> 
										<td ><strong>Web Material II</strong></td>
										<td colspan="2"><input type="text" id="web_link2"  autocomplete="off" name="web_link2"  class="form-control col-md-7 col-xs-12" ></td>
										</tr>
								</tbody>
						     </table>
                        <?php } ?>
                           </div>
                         </div>
                         <div class="ln_solid"></div>
                        <div class="row">
                            <div class="col-md-4 col-sm-3 col-xs-3 ">
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-2 ">
                        <input type="submit" class="btn btn-warning btn-block" value="Go Back" onclick="window.history.go(-1); return false;"> 
                      </div>
                      <div class="col-md-2 col-sm-3 col-xs-2 ">
                          <input type="submit" class="btn btn-success btn-block" value="Done" onclick="return sub(); " name="submit">
                        
                          </div>
                      </div>
                      </form>
                  </div>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  
   
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
function mat1_invisible()
{
    $("#mat1_file").click();
    var fileupload = $("#mat1_file");
    var filePath = $("#File_Path");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
        $("#mat1_attach1").hide();
       $("#file1_sub").show();
   
        
}

function mat2_invisible()
{
  $("#mat2_file").click();
    var fileupload = $("#mat2_file");
    var filePath = $("#File_Path2");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
      $("#mat2_attach2").hide();
       $("#file2_sub").show();
       // $("#File_Path2").show();
}

function mat3_invisible()
{
  $("#mat3_file").click();
    var fileupload = $("#mat3_file");
    var filePath = $("#File_Path3");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
}

function mat4_invisible()
{
  $("#mat4_file").click();
    var fileupload = $("#mat4_file");
    var filePath = $("#File_Path4");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
}

function mat5_invisible()
{
  $("#mat5_file").click();
    var fileupload = $("#mat5_file");
    var filePath = $("#File_Path5");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
}
/*function file1_sub()
{
 // window.location.href = "file1.php";
 var ccode = document.getElementById('ccode');
 var course_name = document.getElementById('course_name');
 var date = document.getElementById('date');
 var day = document.getElementById('day');
 var slot = document.getElementById('slot');
 var topic = document.getElementById('topic');
 var mat1_file = document.getElementById('mat1_file');
 $.ajax({
url:"file1.php",
method:"POST",
data:{ccode:ccode,course_name:course_name,day:day,date:date,slot:slot,topic:topic,mat1_file:mat1_file},
success:function(data){
  $("#file1_sub").html(data);
  

}
});
} */

/*function remove()
                     {
                      $("#mat1_attach1").show();
                   $("#File_Path").hide();
                      $("#remove").hide();
                     }
                     function remove1()
                     {
                      $("#mat2_attach2").show();
                   $("#File_Path2").hide();
                      $("#remove1").hide();
                     }*/
                    
</script>

<script type="text/javascript">
function up_mat1_invisible()
{
  $("#up_mat1_file").click();
var doc='course_';
var staff_id = "<?php echo $_SESSION['username'];?>";
var fileupload = $("#up_mat1_file");
    var filePath = $("#up_File_Path");
    fileupload.change(function () {
            var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName);
        });
                   
      $.each($('#up_mat1_file').prop("files"), function(k,v){
          var filename = v['name'];    
          var ext = filename.split('.').pop().toLowerCase();
          if($.inArray(ext, ['pdf','doc','docx']) == -1) {
              alert('Please upload only pdf,doc,docx format files.');
              return false;
          }
      });        

//alert(filePath);

}
</script>