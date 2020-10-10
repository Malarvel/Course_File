<?php 
session_start(); 
 $student_id=$_SESSION['student_id']; echo $student_id;
 $register_no=$_SESSION['register_no']; echo $register_no;
	$aadhar_no=$_SESSION['aadhar_no']; echo $aadhar_no;
	$stu_name=$_SESSION['stu_name']; echo $stu_name;
	$specialization=$_SESSION['specialization']; echo $specialization;
	$batch=$_SESSION['batch']; echo $batch;
	$sec=$_SESSION['sec']; echo $sec;
	$nad_id=$_SESSION['nad_id']; echo $nad_id;
	$date_of_birth=$_SESSION['date_of_birth']; echo $date_of_birth;
 ?>