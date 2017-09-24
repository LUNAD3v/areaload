<?php
  session_start();

  $connect = new PDO('sqlite:./db/db.sqlite');
  $array = $connect->query("SELECT * FROM course;");

 ?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AreaLoad | 申请重新上传</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="./css/mdb.min.css" rel="stylesheet">
    <style media="screen">
    select {
        width: 100%;
        height: 30px;
        background: none;
        border: none;
        font-size: 1.2em;
        margin-top: 7px;
        appearance:none;/*将默认的select选择框样式清除*/
        -moz-appearance:none;
        -webkit-appearance:none;
        -ms-appearance:none;
        border-bottom: 0.5px solid rgba(200,200,200,0.8);
    }
    select optgroup{
        background: #B3A5B4;
    }
    select option {
        padding: 2px;
        padding-left: 20px;
    }
    </style>
</head>

<body>
  <img src="./img/problem.jpg" style="position: fixed;width: 100%; opacity: 0.4; z-index: -100" alt="">

<?php include('./partial/nav.php') ?>

    <div class="container">


      <div class="page-header">
          <h1>申请重新上传</h1>
      </div><!--/ header -->

        <form action="request.php" method="post">
              <div class="row">
                <div class="col-md-4 col-xs-4">
                <select name="courseid" required>
                    <option hidden>▼&nbsp&nbsp点击选择课程</option>
                    <?php
                    $titlearray = $connect->query("SELECT DISTINCT category,categoryid FROM course;");
                    foreach ($titlearray as $title)
                    {
                        echo "<optgroup label=\"".$title['category']."\" class=\"choice\">";
                        $tmpcategoryid = $title['categoryid'];
                        $coursearray = $connect->query("SELECT * FROM course WHERE categoryid = '$tmpcategoryid';");
                        foreach($coursearray as $row){
                            echo "<option value=\"".$row['id']."\">".$row['name']."</option>";
                        }
                        echo "</optgroup>";
                    }
                    ?>
                </select>
                </div>
                <div class="col-md-4 col-xs-4">
                  <input type="text" name="number" placeholder="学号" required>
                </div><!-- col-md-6 col-xs-6-->
                <div class="col-md-4 col-xs-4">
                  <input type="text" name="phone" placeholder="手机号码" required>
                </div><!-- col-md-6 col-xs-6-->
              </div><!--row -->
              <textarea input type="text" class="form-control" rows="5" name="problem" placeholder="你遇到了什么问题需要重新上传？请简要说明" required></textarea>
              <img id="captcha" src="./captcha/securimage_show.php" alt="CAPTCHA Image" />
              <a href="#" onclick="document.getElementById('captcha').src = './captcha/securimage_show.php?' + Math.random(); return false">看不清，换一张</a>
              <input type="text" name="captcha" size="10" maxlength="6" placeholder="请输入验证码" required />
              <button class="btn btn-lg btn-danger btn-block" input type="submit">提交申请</button>
        </form>
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
