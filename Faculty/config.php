<?php
$conn=mysqli_connect('localhost','root','','academic_course');
if(!$conn)
{
die("Could not connect to the database:".mysqli_connect_error());
}
?>