<?php
session_start();
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
<img src="./img/success.jpg" style="position: fixed;width: 100%; opacity: 0.6; z-index: -100" alt="">
<?php include('./partial/nav.php') ?>

    <div class="container">

      <div class="page-header">
          <h1>上传信息</h1>
      </div><!--/ header -->
      <div class="jumbotron">
        <?php
          if($_SESSION['error']=='duplicate')
          echo "<p>你输入的学号已经上传过一次文件了，不能重复上传，如需再次上传，请填写“申请重新上传”页面并等待人工处理。</p>";
          elseif ($_SESSION['error']=='captcha')
          echo "<p>验证码不正确</p>";
          elseif ($_SESSION['error']=='injection')
          echo "<p>检测到潜在的攻击，若您发现了漏洞，欢迎向我们上报！邮箱：lunaluna@riseup.net。</p>";
         ?>
      </div>
        </div>


        <?php include('./partial/footer.php') ?>
      </div> <!-- /container -->
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
