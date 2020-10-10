<?php
session_start();
require_once 'config.php';
$doc1 = date("Y-m-d-H-i-s");
$doc='course_';
$eid="";
$year= $_POST['ac_year']; 
$semester= $_POST['semester']; 
$id=$_SESSION['username'];
$fpid=$_SESSION['fpid'];
$name=$_SESSION['sname'];
$department=$_SESSION['department'];
$course_code = $_POST['course_code']; 
$course_name = $_POST['course_name'];
$course_id = $_POST['course_id'];
$_SESSION['year']=$year;
$_SESSION['semester']=$semester;
$_SESSION['course_code']=$course_code;
$_SESSION['course_name']=$course_name;
$_SESSION['course_id']=$course_id;
$d=time();
 $psubmit=date("Y-m-d",$d);

 // Getting school id 
 $query="SELECT * from alldepartment where name ='$department' ";
 $result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{ 
   $scl_id=$row['school_id']; // echo $scl_id;
}

// Getting school name +shortform
$token=$_SESSION['token'];
//$name="MBICSE";
//$schools_url="http://172.16.7.163/api/schools/all";
function jwt_requesttt($token,$post,$url) {

       //header('Content-Type: application/json'); // Specify the type of data
       $ch = curl_init($url); // Initialise cURL
       $post = json_encode($post); // Encode the data array into a JSON string
       $authorization = "Authorization: Bearer ".$token; // Prepare the authorisation token
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
       curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
       $result1 = curl_exec($ch); // Execute the cURL statement
       curl_close($ch); // Close the cURL connection
       return json_decode($result1); // Return the received data
}
// Get your token from a cookie or database
$post = array(); // Array of data with a trigger

$url="http://172.19.0.5/api/schools/$scl_id";
$request = jwt_requesttt($token,$post,$url); // Send or retrieve data
//print_r($request);
foreach ($request as $row)
{
  $shortform=$row->short_form; //echo $shortform;
  $school=$row->school_name; // echo $school;
}

if(isset($_POST['course_plan_sub']))
 {
 
 $files=$_FILES['course_plan_file'];
 //$course_plan_org_proof_name=$files['name'];
 $filename=$id.$doc.$doc1."_".$files['name'];
 $fileerror=$files['error'];
 $filetmp=$files['tmp_name'];
 $fileext=explode('.',$filename);
 $filecheck=strtolower(end($fileext));
 $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
 if ($_FILES["course_plan_file"]["size"] > 2000) {
     echo "Sorry, your file is too large.";
 }
 if(in_array($filecheck,$fileextstored))
 {
   // $department=$_SESSION['department'];
    $course_plan_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
    // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
     move_uploaded_file($filetmp,$course_plan_destinationfile);
 }
 $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
 $result=mysqli_query($conn,$query);  
 while($row=mysqli_fetch_assoc($result))
                        {   
                            $path=$row['course_plan_path']; }
 if (mysqli_num_rows($result) != 0)
 {
     unlink($path);
    $update="UPDATE course_details SET course_plan_proof='$filename',course_plan_path='$course_plan_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
   $query=mysqli_query($conn,$update);
    if(mysqli_affected_rows($conn)>0)
{
    echo "<script>alert('successfully Updated');</script>";
   header('Location:testing.php');
}
 }

 else{
      $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,course_plan_proof,course_plan_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$course_plan_destinationfile','$psubmit')";
$result=mysqli_query($conn,$query);
if(mysqli_affected_rows($conn)>0)
{
    header('Location:testing.php');

}
 }
}
 if(isset($_POST['ebook1_sub']))
 {
    $files=$_FILES['ebook1_file'];
    //$ebook1_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $ebook1_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$ebook1_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
                        {   
                            $path=$row['ebook1_path']; }
    if (mysqli_num_rows($result) != 0)
    {
       unlink($path);
       $update="UPDATE course_details SET ebook1_proof='$filename',ebook1_path='$ebook1_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,ebook1_proof,ebook1_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$ebook1_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['ebook2_sub']))
 {
    $files=$_FILES['ebook2_file'];
   // $ebook2_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $ebook2_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$ebook2_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['ebook2_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET ebook2_proof='$filename',ebook2_path='$ebook2_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,ebook2_proof,ebook2_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$ebook2_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['se1_sub']))
 {
    $files=$_FILES['se1_file'];
  //  $se1_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $se1_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$se1_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['se1_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET se1_proof='$filename',se1_path='$se1_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,se1_proof,se1_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$se1_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['se1_ans_sub']))
 {
    $files=$_FILES['se1_ans_file'];
   // $se1_ans_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $se1_ans_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$se1_ans_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['se1_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET se1_sam_proof='$filename',se1_sam_path='$se1_ans_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,se1_sam_proof,se1_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$se1_ans_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['se2_sub']))
 {
    $files=$_FILES['se2_file'];
   // $se2_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $se2_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$se2_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['se2_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET se2_proof='$filename',se2_path='$se2_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,se2_proof,se2_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$se2_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['se2_ans_sub']))
 {
    $files=$_FILES['se2_ans_file'];
    //$se2_ans_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $se2_ans_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$se2_ans_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['se2_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET se2_sam_proof='$filename',se2_sam_path='$se2_ans_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,se2_sam_proof,se2_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$se2_ans_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['assign1_sub']))
 {
    $files=$_FILES['assign1_file'];
   // $assign1_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $assign1_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$assign1_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['assign1_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET assign1_proof='$filename',assign1_path='$assign1_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,assign1_proof,assign1_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$assign1_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['assign1_sam_sub']))
 {
    $files=$_FILES['assign1_sam_file'];
  //  $assign1_sam_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $assign1_sam_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$assign1_sam_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['assign1_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET assign1_sam_proof='$filename',assign1_sam_path='$assign1_sam_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,assign1_sam_proof,assign1_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$assign1_sam_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['assign2_sub']))
 {
    $files=$_FILES['assign2_file'];
   // $assign2_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $assign2_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$assign2_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['assign2_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET assign2_proof='$filename',assign2_path='$assign2_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,assign2_proof,assign2_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$assign2_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['assign2_sam_sub']))
 {
    $files=$_FILES['assign2_sam_file'];
    //$assign2_sam_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $assign2_sam_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$assign2_sam_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['assign2_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET assign2_sam_proof='$filename',assign2_sam_path='$assign2_sam_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,assign2_sam_proof,assign2_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$assign2_sam_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['assign3_sub']))
 {
    $files=$_FILES['assign3_file'];
    //$assign3_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $assign3_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$assign3_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['assign3_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET assign3_proof='$filename',assign3_path='$assign3_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,assign3_proof,assign3_path,proof_submitted_date) VALUES ('$eid','$year','semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$assign3_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['assign3_sam_sub']))
 {
    $files=$_FILES['assign3_sam_file'];
   // $assign3_sam_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $assign3_sam_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$assign3_sam_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['assign3_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET assign3_sam_proof='$filename',assign3_sam_path='$assign3_sam_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,assign3_sam_proof,assign3_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$assign3_sam_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['quiz1_sub']))
 {
    $files=$_FILES['quiz1_file'];
    //$quiz1_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $quiz1_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$quiz1_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['quiz1_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET quiz1_proof='$filename',quiz1_path='$quiz1_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,quiz1_proof,quiz1_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$quiz1_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['quiz1_sam_sub']))
 {
    $files=$_FILES['quiz1_sam_file'];
    //$quiz1_sam_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $quiz1_sam_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$quiz1_sam_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['quiz1_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET quiz1_sam_proof='$filename',quiz1_sam_path='$quiz1_sam_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,quiz1_sam_proof,quiz1_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$quiz1_sam_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['quiz2_sub']))
 {
    $files=$_FILES['quiz2_file'];
    //$quiz2_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $quiz2_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$quiz2_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['quiz2_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET quiz2_proof='$filename',quiz2_path='$quiz2_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,quiz2_proof,quiz2_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$quiz2_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['quiz2_sam_sub']))
 {
    $files=$_FILES['quiz2_sam_file'];
    //$quiz2_sam_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $quiz2_sam_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$quiz2_sam_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['quiz2_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET quiz2_sam_proof='$filename',quiz2_sam_path='$quiz2_sam_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,quiz2_sam_proof,quiz2_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$quiz2_sam_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['quiz3_sub']))
 {
    $files=$_FILES['quiz3_file'];
    //$quiz3_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $quiz3_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$quiz3_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['quiz3_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET quiz3_proof='$filename',quiz3_path='$quiz3_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,quiz3_proof,quiz3_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$quiz3_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['quiz3_sam_sub']))
 {
    $files=$_FILES['quiz3_sam_file'];
   // $quiz3_sam_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $quiz3_sam_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$quiz3_sam_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['quiz3_sam_path']; }
    if (mysqli_num_rows($result) != 0)
    {
        unlink($path);
       $update="UPDATE course_details SET quiz3_sam_proof='$filename',quiz3_sam_path='$quiz3_sam_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,quiz2_sam_proof,quiz2_sam_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$quiz2_sam_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 if(isset($_POST['model_sub']))
 {
    $files=$_FILES['model_file'];
   // $model_org_proof_name=$files['name'];
    $filename=$id.$doc.$doc1."_".$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));
    $fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
    if ($_FILES["course_plan_file"]["size"] > 2000) {
        echo "Sorry, your file is too large.";
    }
    if(in_array($filecheck,$fileextstored))
    {
      // $department=$_SESSION['department'];
       $model_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
       // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
        move_uploaded_file($filetmp,$model_destinationfile);
    }
    $query="SELECT * from course_details where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result))
    {   
        $path=$row['model_que_path']; }
    if (mysqli_num_rows($result) != 0)
    {
      unlink($path);
       $update="UPDATE course_details SET model_que_proof='$filename',model_que_path='$model_destinationfile' WHERE staff_id='$id' AND course_code='$course_code' AND course_name='$course_name' ";
       $query=mysqli_query($conn,$update);
       if(mysqli_affected_rows($conn)>0)
   {
       echo "<script>alert('successfully Updated');</script>";
       header('Location:testing.php');
   }
    }
    else{
         $query="INSERT INTO course_details (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,model_que_proof,model_que_path,proof_submitted_date) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$filename','$model_destinationfile','$psubmit')";
   $result=mysqli_query($conn,$query);
   if(mysqli_affected_rows($conn)>0)
   {
       header('Location:testing.php');
   
   }
    }
 }
 ?>
