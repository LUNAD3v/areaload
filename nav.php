<nav class="navbar navbar-default" style="opacity: 0.8">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <a class="navbar-brand"><b>AreaLoad</b></a>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
              <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'?>><a href="./index.php">首页</a></li>
              <li <?php if (basename($_SERVER['PHP_SELF']) == 'problem.php') echo 'class="active"'?>><a href="./problem.php">申请重新上传</a></li>
              <li <?php if (basename($_SERVER['PHP_SELF']) == 'uploaded.php') echo 'class="active"'?>><a href="./uploaded.php">已经上传的学生列表</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
