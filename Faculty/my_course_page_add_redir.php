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
 $date = $_POST['date'];
 $day = $_POST['day'];
 $slot_id = $_POST['slot_id'];
 $day_order = $_POST['day_order'];
 $topic=$_POST['topic'];
 $d=time();
 $psubmit=date("Y-m-d",$d);
 $web_link1=$_POST['web_link'];
 $web_link2=$_POST['web_link2'];
 $_SESSION['year']=$year;
$_SESSION['semester']=$semester;
 $_SESSION['date']=$date;
$_SESSION['slot_id']=$slot_id;
$_SESSION['day_order']=$day_order;
$_SESSION['course_code_add']=$course_code;
$_SESSION['course_name_add']=$course_name;
 // Getting school id 
 $query="SELECT * from alldepartment where name ='$department' ";
 $result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{ 
   $scl_id=$row['school_id']; // echo $scl_id;
}

// Getting school name +shortform
$token=$_SESSION['token'];
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

$files=$_FILES['mat1_file'];
//$mat1_org_proof_name=$files['name'];
$filename=$id.$doc.$doc1."_".$files['name'];
$fileerror=$files['error'];
$filetmp=$files['tmp_name'];
$fileext=explode('.',$filename);
$filecheck1=strtolower(end($fileext));
$fileextstored1=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
if ($_FILES["mat1_file"]["size"] > 2000) {
    echo "Sorry, your file is too large.";
}
if(in_array($filecheck1,$fileextstored1))
{
  // $department=$_SESSION['department'];
   $mat1_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$filename;
   // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
    move_uploaded_file($filetmp,$mat1_destinationfile);
}

$files=$_FILES['mat2_file'];
//$mat2_org_proof_name=$files['name'];
$mat_file2_filename=$id.$doc.$doc1."_".$files['name'];
$fileerror=$files['error'];
$filetmp=$files['tmp_name'];
$fileext=explode('.',$mat_file2_filename);
$filecheck=strtolower(end($fileext));
$fileextstored=array('png','jpg','jpeg','pdf','xls','xlsx','doc','docx');
if ($_FILES["mat2_file"]["size"] > 2000) {
    echo "Sorry, your file is too large.";
}
if(in_array($filecheck,$fileextstored))
{
  // $department=$_SESSION['department'];
   $mat2_destinationfile='../uploads/AY-2020-21/'.$department.'/'.$mat_file2_filename;
   // $mat1_destinationfile='../uploads/AY-2020-21/Aeronautical_Engineering/'.$filename;
    move_uploaded_file($filetmp,$mat2_destinationfile);
}  
 $query="SELECT * from materials_add where academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND date='$date' AND day_order='$day_order' AND slot_id='$slot_id'";
 $result=mysqli_query($conn,$query);
 while($row=mysqli_fetch_assoc($result))
                        {   
                            $path=$row['material1_path']; 
                            $path1=$row['material2_path']; 
                        }
 if (mysqli_num_rows($result) != 0)
 {
    if(isset($_POST['file1_sub']))
    {
        unlink($path);
       $f1_update="UPDATE materials_add SET material1_proof_name='$filename',material1_path='$mat1_destinationfile' WHERE academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND date='$date' AND day_order='$day_order' AND slot_id='$slot_id'";
       $query=mysqli_query($conn,$f1_update);
       if(mysqli_affected_rows($conn)>0)
   {
    header("Location:my_course_page_add.php?ac_year=".$year."&semester=".$semester."&course_code=".$course_code."&course_name=".$course_name."&slot_id=".$slot_id."&date=".$date."&day_order=".$day_order." ") ;
   }
    }
    elseif(isset($_POST['file2_sub']))
 {
    unlink($path1);
    $f2_update="UPDATE materials_add SET material2_proof_name='$mat_file2_filename',material2_path='$mat2_destinationfile' WHERE academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND date='$date' AND day_order='$day_order' AND slot_id='$slot_id'";
    $query=mysqli_query($conn,$f2_update);
    if(mysqli_affected_rows($conn)>0)
{
    header("Location:my_course_page_add.php?ac_year=".$year."&semester=".$semester."&course_code=".$course_code."&course_name=".$course_name."&slot_id=".$slot_id."&date=".$date."&day_order=".$day_order." ") ;
}
 }
// update
else{
$update="UPDATE materials_add SET topic='$topic',proof_submitted_date='$psubmit',web_link1_name='$web_link1',web_link2_name='$web_link2' WHERE academic_year='$year' AND semester='$semester' AND staff_id='$id' AND course_code='$course_code' AND date='$date' AND day_order='$day_order'AND slot_id='$slot_id'";
			$query=mysqli_query($conn,$update);
			if(mysqli_affected_rows($conn)>0)
{
            echo "<script>alert('successfully Updated');</script>";
            header('Location:javascript:history.go(-1)');
}
		
}
 }
 
 else{
//insert

    $query="INSERT INTO materials_add (id,academic_year,semester,staff_id,staff_fid,staff_name,department_name,school_name,short_form,course_code,course_name,date,day,day_order,slot_id,topic,proof_submitted_date,material1_proof_name,material1_path,material2_proof_name,material2_path,web_link1_name,web_link2_name) VALUES ('$eid','$year','$semester','$id','$fpid','$name','$department','$school','$shortform','$course_code','$course_name','$date','$day','$day_order','$slot_id','$topic','$psubmit','$filename','$mat1_destinationfile','$mat_file2_filename','$mat2_destinationfile','$web_link1','$web_link2')";
    $result=mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn)>0)
    {
     
        header("Location:my_course_page_add.php?ac_year=".$year."&semester=".$semester."&course_code=".$course_code."&course_name=".$course_name."&slot_id=".$slot_id."&date=".$date."&day_order=".$day_order." ") ;
 }
}

?>
