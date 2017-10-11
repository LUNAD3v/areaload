<?php
session_start();
if (!$_SESSION['valid']) {
    header("Location:./index.php");
    exit();
}
// Make sure the script can handle large folders/files
ini_set('max_execution_time', 600);
ini_set('memory_limit', '1024M');

function deleteDirectory($dir)
{
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

function Zip($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if (in_array(substr($file, strrpos($file, '/')+1), array('.', '..'))) {
                continue;
            }

            $file = realpath($file);

            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } elseif (is_file($file) === true) {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    } elseif (is_file($source) === true) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

function random_str($type = 'alphanum', $length = 8)
{
    switch ($type) {
        case 'basic': return mt_rand();
            break;
        case 'alpha':
        case 'alphanum':
        case 'num':
        case 'nozero':
                $seedings             = array();
                $seedings['alpha']    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $seedings['alphanum'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $seedings['num']      = '0123456789';
                $seedings['nozero']   = '123456789';

                $pool = $seedings[$type];

                $str = '';
                for ($i=0; $i < $length; $i++) {
                    $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
                }
                return $str;
            break;
        case 'unique':
        case 'md5':
                    return md5(uniqid(mt_rand()));
            break;
    }
}

$connect = new PDO('sqlite:./db/db.sqlite');
$addcoursename = $_POST['addcoursename'];
$addcourseid = $_POST['addcourseid'];
$addcourseinfo = $_POST['addcourseinfo'];
$addcoursedemand = $_POST['addcoursedemand'];
$addcategory = $_POST['addcategory'];
$addcategoryid = $_POST['addcategoryid'];

$delcategoryid = $_POST['delcategoryid'];

$editcourseid = $_POST['editcourseid'];
$editcoursename = $_POST['editcoursename'];
$editcourseinfo = $_POST['editcourseinfo'];
$editcoursedemand = $_POST['editcoursedemand'];

//Begin ADD trustlist
$addtrustlist = $_POST['addtrustlist'];
if ($addtrustlist) {
    $connect->exec("INSERT INTO 'trustlist'
				('number')
				VALUES ('$addtrustlist');");
}
//End ADD trustlist

//Begin DEL trustlist
$deltrustlist = strip_tags($_POST['deltrustlist']);
if ($deltrustlist) {
    $connect->exec("DELETE FROM 'trustlist'
				WHERE number='$deltrustlist';");
}
//End DEL trustlist

//Begin ADD course
if ($addcoursename && $addcourseid && $addcourseinfo && $addcoursedemand && $addcategory && $addcategoryid) {
    $addcategorydir = "./upload/" . $addcategoryid;
    mkdir($addcategorydir);
    $addcoursedir = "./upload/" . $addcategoryid . "/" . $addcourseid;
    mkdir($addcoursedir);
    $connect->exec("INSERT INTO 'course'
				('name','id','info','demand','category','categoryid')
				VALUES
				('$addcoursename','$addcourseid','$addcourseinfo','$addcoursedemand','$addcategory','$addcategoryid');");
}
//End ADD course

//Begin DEL course
$delcourseid = strip_tags($_POST['delcourseid']);
$delcoursecategory = strip_tags($_POST['delcoursecategory']);
if ($delcourseid) {
    $delcoursedir = "./upload/" . $delcoursecategory . "/" . $delcourseid;
    deleteDirectory($delcoursedir);
    $connect->exec("DELETE FROM 'course'
				WHERE id='$delcourseid';");
    $connect->exec("DELETE FROM 'uploaded'
				WHERE course='$delcourseid';");//Purge DB
}
//End DEL course

//Begin DEL category
$delcategoryid = strip_tags($_POST['delcategoryid']);
if ($delcategoryid) {
    $delcategorydir = "./upload/" . $delcategoryid ;
    deleteDirectory($delcategorydir);
    $connect->exec("DELETE FROM 'course'
				WHERE categoryid='$delcategoryid';");
}
//End DEL category

//Begin DEL ticket
$delticket = $_POST['delticket'];
$delticketcourseid = $_POST['delticketcourseid'];
if ($delticket) {
    $connect->exec("DELETE FROM 'problem'
				WHERE number= '$delticket' AND courseid = '$delticketcourseid';");
    $connect->exec("DELETE FROM 'uploaded'
				WHERE number = '$delticket' AND course = '$delticketcourseid';");
}
//End DEL ticket

//Begin EDIT course
if ($editcourseid && $editcoursename && $editcourseinfo && $editcoursedemand) {
    $connect->exec("UPDATE 'course'
				SET name='$editcoursename',info='$editcourseinfo',demand='$editcoursedemand'
				WHERE id='$editcourseid';");
}
//End EDIT course

//Begin Reset course
$rstcourseid = $_POST['rstcourseid'];
$rstcategoryid = $_POST['rstcategoryid'];
if ($rstcourseid) {
    $rstcoursedir = "./upload/" . $rstcategoryid . "/" . $rstcourseid;
    deleteDirectory($rstcoursedir);//Purge files
    mkdir($rstcoursedir);
    $connect->exec("DELETE FROM 'uploaded'
				WHERE course='$rstcourseid';");//Purge DB
}
//End Reset course

//Begin Download course
$dlcourseid = $_POST['dlcourseid'];
$dlcategoryid = $_POST['dlcategoryid'];
if ($dlcourseid) {
    $zipurl = "./upload/" . $dlcategoryid . "/" . $dlcourseid;
    Zip($zipurl, "./upload/" . $dlcourseid . '.zip');
    $dlurl = "./upload/" . $dlcourseid . '.zip';
    $randfilename = random_str('alphanum', 10);
    $tmpdlurl = "./tmp/" . $randfilename . '.zip';
    rename($dlurl, $tmpdlurl);

    header("Location: $tmpdlurl");
}
//End Download course

//Begin Change Password
$newpasswd = $_POST['passwd'];
$newhash = md5($newpasswd);
$username = $_SESSION['username'];
if ($newhash && $newpasswd){
$connect->exec("UPDATE 'account'
                SET passwd = '$newhash'
                WHERE username = '$username';");
}
if (!$dlcourseid) {
    header("Location: ./admin.php");
    exit();
}
