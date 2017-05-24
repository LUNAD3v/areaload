<?php
$connect = new PDO('sqlite:./db/db.sqlite');
$addcoursename = $_POST['addcoursename'];
$addcourseid = $_POST['addcourseid'];
$addcourseinfo = $_POST['addcourseinfo'];
$addcoursedemand = $_POST['addcoursedemand'];

//Begin ADD trustlist
$addtrustlist = $_POST['addtrustlist'];
if($addtrustlist)
{
$connect->exec("INSERT INTO 'trustlist' ('number') VALUES ('$addtrustlist');");
}
//End ADD trustlist
//Begin DEL trustlist
$deltrustlist = $_POST['deltrustlist'];
if($deltrustlist)
{
$connect->exec("DELETE FROM 'trustlist' WHERE number='$deltrustlist';");
}
//End DEL trustlist

//Begin ADD course
if($addcoursename && $addcourseid && $addcourseinfo && $addcoursedemand)
{
$connect->exec("INSERT INTO 'course' ('name','id','info','demand') VALUES ('$addcoursename','$addcourseid','$addcourseinfo','$addcoursedemand');");
}
//End ADD course
//Begin DEL course
$delcourseid = $_POST['delcourseid'];
if($delcourseid)
{
$connect->exec("DELETE FROM 'course' WHERE id='$delcourseid';");
}

header("Location: ./admin.php");
exit();
 ?>
