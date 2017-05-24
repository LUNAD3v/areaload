<?php
$connect = new PDO('sqlite:./db/db.sqlite');
$addcoursename = $_POST['addcoursename'];
$addcourseid = $_POST['addcourseid'];
$addcourseinfo = $_POST['addcourseinfo'];
$addcoursedemand = $_POST['addcoursedemand'];

if($addcoursename && $addcourseid && $addcourseinfo && $addcoursedemand)
$connect->exec("INSERT INTO 'course' ('name','id','info','demand') VALUES ('$addcoursename', '$addcourseid','$addcourseinfo','$addcoursedemand');");

header("Location: ./admin.php");
exit();
 ?>
