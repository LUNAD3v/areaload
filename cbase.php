<?php
  $number1 = rand(0,30);
  $number2 = rand(0,10);
  $result = $number1 + $number2;
 ?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AreaLoad文件上传系统</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb-p.min.css" rel="stylesheet">


</head>

<body>


  <div class="container">
    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills pull-right">
          <li role="presentation"><a href="./index.php">首页</a></li>
          <li role="presentation"><a href="./problem.php">申请重新上传</a></li>
          <li role="presentation"><a href="./uploaded.php">已经上传的学生列表</a></li>
        </ul>
      </nav>
      <h3 class="text-muted">AreaLoad</h3>
    </div>

	<div class="jumbotron" style="opacity: 0.8">
		<h2>大学计算机基础</h2>
        <ul>
        <li>1.请根据自己的学习情况编写程序</li>
        <li>2.总共需要提交五个大实验要求的程序</li>
        <li>3.每个程序虽然都有参考代码，但你提交的程序一定是你自己编写的！</li>
        <li>4.只提交.c源文件，并压缩为Zip包或7z压缩后提交（其他格式不予接受）</li>
        <li>5.每周的实验作业提交时间截止到下周实验前即周四</li>
        <li><b>6.请以自己的学号作为文件名。（例631607040101.zip）</b></li>
		</ul>
	</div>
  <div class="jumbotron" style="opacity: 0.8">
    <h1>上传文件</h1>
    <form action="upload_cbase.php" method="post" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <input type="text" name="number" class="form-control" placeholder="学号" required autofocus>
          <input type="text" name="name" class="form-control" placeholder="姓名" required>
          <b>请算出答案：</b><input type="text" name="captcha" placeholder="<?php echo $number1?>+ <?php echo $number2?> = ?" required>
          文件名<input type="text" id="na" placeholder="当前未选择文件...">
          <label class="btn btn-primary" for="fileSelect">
                选择文件&hellip;
            </label><input type="file" id="fileSelect" name="userfile" style="visibility:hidden;" onchange="cli()">
            <input type="hidden" name="num1" value="<?php echo $number1?>"></input>
            <input type="hidden" name="num2" value="<?php echo $number2?>"></input>
            <button class="btn btn-lg btn-danger btn-block" input type="submit">上传</button>
        </div><!--<div class="col-lg-6 col-sm-6 col-xs-12">-->

        <div class="col-lg-6 col-sm-6 col-xs-12">
          <h4>上传课程</h4>
          <div class="list-group">
            <a href="./web.php" class="list-group-item">Web技术基础</a>
            <a href="./c.php" class="list-group-item">C语言程序设计</a>
            <a href="./sec.php" class="list-group-item">网络安全</a>
            <a href="" class="list-group-item active">大学计算机基础</a>
            <a href="./network.php" class="list-group-item">计算机网络</a>
          </div>
        </div><!--<div class="col-lg-6 col-sm-6 col-xs-12">-->

      </div><!--<div class="row">-->

</form>

</div>

  </div> <!-- /container -->
  <?php include('footer.php') ?>
  <aside id="aside" class="sidebar col-sm-3 col-md-2 hidden-print small">
    <div class="sidebar-content">
        <div class="sidebar-body collapse in">
            <p>
                <img src="./img/cbase.jpg" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.6; z-index: -100" alt="">
            </p>
        </div>
    </div>
</aside>
    <!-- SCRIPTS -->
<script>
function cli(){
	var na=document.getElementById("fileSelect").files[0].name;
	if(na!=''){
	document.getElementById("na").value=na;}
	else
		document.getElementById("na").value="当前未选择文件";
	}
</script>
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
