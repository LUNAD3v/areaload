<?php
$usercaptcha=$_POST["captcha"];
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$true=$num1+$num2;

$stunumber = $_POST["number"];
$problem = $_POST["problem"];

//SQL injection prevention
if (preg_match('#(DROP|INSERT|UPDATE|TABLE|;)#i',$problem))
{
  header("Location: ./problem.php");
  exit();
}
//End SQL injection prevention

if($usercaptcha != $true)
{
  header("Location: ./problem.php");
  exit();
}

  $db = new SQLite3('./db/db.sqlite');

  $db->exec("INSERT INTO 'problem' ('number','content') VALUES ('$stunumber', '$problem');");
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
      <link href="./css/mdb-p.min.css" rel="stylesheet">


  </head>

  <body>

    <nav class="navbar navbar-default" style="opacity: 0.8">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <a class="navbar-brand">AreaLoad</a>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                  <li><a href="./index.php">首页</a></li>
                  <li><a href="./problem.php">申请重新上传</a></li>
                  <li><a href="./uploaded.php">已经上传的学生列表</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

      <div class="container">


        <div class="page-header">
            <h1>提交成功！</h1>
        </div><!--/ header -->
        <div class="jumbotron">
          <p>好了，现在可以反省一下之前为什么提交错了文件了。</p>
          <p>我们确认后会通过短信的方式通知你再次上传的。</p>
        </div>
          </div>
        </div>
        <?php include('footer.php') ?>
        <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
          <div class="sidebar-content">
              <div class="sidebar-body collapse in">
                  <p>
                      <img src="./img/problem.jpg" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.3; z-index: -100" alt="">
                  </p>
              </div>
          </div>
      </aside>
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
