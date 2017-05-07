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
        <h2>网络安全</h2>
        <ul>
        <li>1.自选主题（如读书、人权、时政、学校、科技、人物等），做一个不少于5个页面的网站</li>
        <li>2.撰写结业报告，封面包含如下内容：题目（《Web技术基础》课程结业报告）、班级学号、专业、姓名、指导教师，正文必须包含建站思路、遇到的问题、如何解决、遗留问题、总结这些部分，其它任意</li>
        <li>3.网站建设可借鉴，结业报告严禁抄袭（抄与被抄者皆为0分）</li>
        <li>4.网站提交整个文件夹，并压缩为Zip包或7z压缩后提交（其他格式不予接受）</li>
        <li>5.纸质结业报告提交给各班班长，统一收取后交给任课教师</li>
        <li>6.提交截止时间为14周周四下午3点</li>
        <li><b>7.请以自己的学号作为文件名。（例631607040101.zip）</b></li>
		</ul>
    </div>

  <div class="jumbotron" style="opacity: 0.8">
    <h1>上传文件</h1>
    <form action="upload_sec.php" method="post" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12">
          <input type="text" name="number" class="form-control" placeholder="学号" required autofocus>
          <input type="text" name="name" class="form-control" placeholder="姓名" required>
          <b>请算出答案：</b><input type="text" name="captcha" placeholder="<?php echo $number1?>+ <?php echo $number2?> = ?" required>
          文件名<input type="text" id="na" placeholder="当前未选择文件...">
          <label class="btn btn-primary" for="fileSelect" >
                选择文件&hellip;
            </label><input type="file" id="fileSelect" name="userfile" style="visibility:hidden;" onchange="cli()">
            <input type="hidden" name="num1" value="<?php echo $number1?>"></input>
            <input type="hidden" name="num2" value="<?php echo $number2?>"></input>
            <button class="btn btn-lg btn-danger btn-block" input type="submit">上传</button>
        </div><!--<div class="col-lg-6 col-sm-6 col-xs-12">-->

        <div class="col-lg-6 col-sm-6 col-xs-12">
          <p>本课程将学习网络安全相关的一些基础理论知识，同时在Kali（BackTrack）下，以虚拟机的方式进行各种模拟和实际渗透测试，以加强网络安全方面能力，提升这方面的兴趣。 </p>
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
                <img src="./img/attack.jpg" style="position: fixed; bottom: -180px; left: -230px; opacity: 0.6; z-index: -100" alt="">
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
