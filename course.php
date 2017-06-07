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
$addcategory = $_POST['addcategory'];
$addcategoryid = $_POST['addcategoryid'];
$delcategoryid = $_POST['delcategoryid'];

//Begin ADD trustlist
$addtrustlist = strip_tags($_POST['addtrustlist']);
$addtrustlist = substr($addtrustlist,12);//Overflow prevention
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
if($addcoursename && $addcourseid && $addcourseinfo && $addcoursedemand && $addcategory && $addcategoryid)
{
$addcoursedir = "./upload/" . $addcategory . "/" . $addcourseid;
mkdir($addcoursedir);
$connect->exec("INSERT INTO 'course' ('name','id','info','demand','category','categoryid') VALUES ('$addcoursename','$addcourseid','$addcourseinfo','$addcoursedemand','$addcategory','$addcategoryid');");
}
//End ADD course

//Begin DEL course
$delcourseid = strip_tags($_POST['delcourseid']);
if($delcourseid)
{
$delcoursedir = "./upload/" . $delcoursecategory . $delcourseid;
deleteDirectory($delcoursedir);
$connect->exec("DELETE FROM 'course' WHERE id='$delcourseid';");
}
//End DEL course

//Begin DEL category
$delcategoryid = strip_tags($_POST['delcategoryid']);
if($delcategoryid)
{
$delcategorydir = "./upload/" . $delcategoryid ;
deleteDirectory($delcategorydir);
$connect->exec("DELETE FROM 'course' WHERE categoryid='$delcategoryid';");
}
//End DEL category

//Begin DEL ticket
$delticket = $_POST['delticket'];
if($delticket)
{
$connect->exec("DELETE FROM 'problem' WHERE number='$delticket';");
}
//End DEL ticket

//Begin Reset course
$rstcourseid = $_POST['rstcourseid'];
$rstcoursecategoryid = $_POST['rstcoursecategoryid'];
if($rstcourseid)
{
$rstcoursedir = "./upload/" . $rstcoursecategoryid . "/" . $rstcourseid;
deleteDirectory($rstcoursedir);//Purge files
mkdir($rstcoursedir);
$connect->exec("DELETE FROM 'uploaded' WHERE course='$rstcourseid';");//Purge DB
}

header("Location: ./admin.php");
exit();
 ?>
