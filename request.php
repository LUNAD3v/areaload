<?php
session_start();

include_once './captcha/securimage.php';
$securimage = new Securimage();
if ($securimage->check($_POST['captcha']) == false) {
    $_SESSION['error']='captcha';
    header("Location: ./error.php");
    exit();
}

$stunumber = $_POST['number'];
$courseid = $_POST['courseid'];
$stunumber = substr($stunumber,0,12);
$stunumber = strip_tags($stunumber);
$phone = $_POST['phone'];
$phone = strip_tags($phone);
//SQL injection prevention
if (preg_match('#(DROP|INSERT|UPDATE|TABLE|DETELE|;)#i',$phone))
{
  $_SESSION['error']='injection';
  header("Location: ./error.php");
  exit();
}
//End SQL injection prevention
$problem = $_POST["problem"];
$problem = strip_tags($problem);
//SQL injection prevention
if (preg_match('#(DROP|INSERT|UPDATE|TABLE|DELETE|;)#i',$problem))
{
  $_SESSION['error']='injection';
  header("Location: ./error.php");
  exit();
}
//End SQL injection prevention

if(!isset($_POST['number']) || !isset($_POST['phone']) || !isset($_POST['problem']))
{
    header("Location: ./problem.php");
    exit();
}

  $db = new SQLite3('./db/db.sqlite');

  $db->exec("INSERT INTO 'problem' ('number','content','phone','courseid') VALUES ('$stunumber', '$problem', '$phone','$courseid');");
  ?>

  <!DOCTYPE html>
  <html lang="zh">

  <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">

      <title>提交信息</title>

      <!-- Font Awesome -->
      <link rel="stylesheet" href="./css/font-awesome.min.css">

      <!-- Bootstrap core CSS -->
      <link href="./css/bootstrap.min.css" rel="stylesheet">

      <!-- Material Design Bootstrap -->
      <link href="./css/mdb.min.css" rel="stylesheet">


  </head>

  <body>
<img src="./img/problem.jpg" style="position: fixed;width: 100%; opacity: 0.6; z-index: -100" alt="">
<?php include('./partial/nav.php') ?>

      <div class="container">


        <div class="page-header">
            <h1>提交成功！</h1>
        </div><!--/ header -->
        <div class="jumbotron">
          <p>好的，我们确认后会通知你再次上传的。</p>
        </div>
          </div>
        </div>
        <?php include('./partial/footer.php') ?>
      <!-- SCRIPTS -->

      <!-- JQuery -->
      <script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>

      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="./js/tether.min.js"></script>

      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="./js/bootstrap.min.js"></script>

      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="./js/mdb.min.js"></script>



  </body>

  </html>
