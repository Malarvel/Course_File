<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <title> KARE </title>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <style>
  .rotate {
  animation: rotation 12s infinite linear;
}
#text1 {
  border-radius: 25px;
}
#text2 {
  border-radius: 25px;
}
#text3 {
  border-radius: 25px;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
   </style>
    <?php include('header.php');?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3>Search Course Page</h3>
               </div>
             </div>
             <div class="title_right">
                <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search Course Name...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
  				    <div class="x_content">
                        <br /><br>
                          
                         <form Method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" action="">
                          <table style="" class="table table-bordered "  id="datatable_buttons">
                      <thead>
  <tr class="header">
  <th>S.No</th>
  <th>Academic Year</th>
  <th>Semester</th>
  <th>Course Code</th>
    <th>Course Name</th>
    <th>Faculty Name</th>
    <th>Department</th>
    <th>Materials</th>
  </tr>
</thead>
<!--<tfoot>
<th search="1"><input type="text" class="form-control" id="text1" onkeyup="myFunction1()" placeholder=" Course Code..."></th>
<th search="1"><input type="text" class="form-control" id="text2" onkeyup="myFunction2()" placeholder=" Course Name..."></th>
<th search="1"><input type="text" class="form-control" id="text3" onkeyup="myFunction3()" placeholder=" Faculty Name..."></th>
<th></th>
</tr>
</tfoot> -->

  <tr>
  <?php 
    $count=1;
   // $staff_id=$_SESSION['username'];
     require_once 'config.php'; 
     $query="SELECT * from course_details where staff_id IS NOT NULL ORDER BY Academic_Year Desc";
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
                                <td><?= $row['staff_name'];?></td>
                                <td><?= $row['department_name'];?></td>
                                  <td><a class="btn btn-warning btn-xs btn-round" id="lecture_submit" href="archive_my_course_page.php?ac_year=<?php echo $row['academic_year'];?>&semester=<?php echo $row['semester'];?>&course_code=<?php echo $row['course_code'];?>&course_name=<?php echo $row['course_name'];?>&staff_id=<?php echo $row['staff_fid'];?>&staff_name=<?php echo $row['staff_name'];?>" name="lecture_submit"> <strong>View</strong> </a></td>
                                      </tr>
                                <?php
                  $count++;    }  
                      ?>
    </tr>
</table>
<div class="row">
                            <div class="col-md-2 col-sm-3 col-xs-3 ">
                        </div>
                      <!--  <div class="w3-animate-zoom">
                           <img id="image" class="#rotate" src="slide.webp" ><br><br><br><br><br><br><br>
                           </div> -->
                           <div class="col-md-3 col-sm-3 col-xs-3 "></div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

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
<script>
function myFunction() {
  $("#image").hide();
  $("#datatable_buttons").show();
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable_buttons");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

