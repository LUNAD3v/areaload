<?php
session_start();
if(!$_SESSION['valid'])
{
	header("Location:./index.php");
	exit();
}

function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

$connect = new PDO('sqlite:./db/db.sqlite');
$addcoursename = $_POST['addcoursename'];
$addcourseid = $_POST['addcourseid'];
$addcourseinfo = $_POST['addcourseinfo'];
$addcoursedemand = $_POST['addcoursedemand'];

//Begin ADD trustlist
$addtrustlist = strip_tags($_POST['addtrustlist']);
if($addtrustlist)
{
$connect->exec("INSERT INTO 'trustlist' ('number') VALUES ('$addtrustlist');");
}
//End ADD trustlist
//Begin DEL trustlist
$deltrustlist = strip_tags($_POST['deltrustlist']);
if($deltrustlist)
{
$connect->exec("DELETE FROM 'trustlist' WHERE number='$deltrustlist';");
}
//End DEL trustlist

//Begin ADD course
if($addcoursename && $addcourseid && $addcourseinfo && $addcoursedemand)
{
$addcoursedir = "./upload/" . $addcourseid;
mkdir($addcoursedir);
$connect->exec("INSERT INTO 'course' ('name','id','info','demand') VALUES ('$addcoursename','$addcourseid','$addcourseinfo','$addcoursedemand');");
}
//End ADD course

//Begin DEL course
$delcourseid = strip_tags($_POST['delcourseid']);
if($delcourseid)
{
$delcoursedir = "./upload/" . $delcourseid;
deleteDirectory($delcoursedir);
$connect->exec("DELETE FROM 'course' WHERE id='$delcourseid';");
}
//End DEL course

//Begin DEL ticket
$delticket = $_POST['delticket'];
if($delticket)
{
$connect->exec("DELETE FROM 'problem' WHERE number='$delticket';");
}
//End DEL ticket

//Begin Reset course
$rstcourseid = $_POST['rstcourseid'];
if($rstcourseid)
{
$rstcoursedir = "./upload/" . $rstcourseid;
deleteDirectory($rstcoursedir);//Purge files
mkdir($rstcoursedir);
$connect->exec("DELETE FROM 'uploaded' WHERE course='$rstcourseid';");//Purge DB
}

header("Location: ./admin.php");
exit();
 ?>
