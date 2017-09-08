# AreaLoad

![AreaLoad](./img/areaload.png)

一个用PHP编写的作业上传平台。
[演示地址](https://lunaluna.org/areaload)

# 设计特性

* 限制上传学生的学号范围
* 限制了上传文件的后缀名（7z,rar,zip）
* ~~通过随机函数生成一个简单的数学问题防止**最基本**的机器自动提交~~
* 使用[Securimage](https://www.phpcaptcha.org/)提供的图形验证码防止脚本攻击
* 文件上传后即锁定，防止出现同学号不同文件名重复上传覆盖掉其他学生的作业
* 上传文件大小限制为1Gib
* 后端管理界面可动态地添加和删除课程和分类

# 如何部署

首先Clone这个Repo
```
git clone https://github.com/LUNAD3v/areaload.git
```

我们喜欢Nginx，如果你用的是Nginx，那么在Nginx的全局（一般为/etc/nginx/nginx.conf）配置中，添加如下行
```
client_max_body_size 1000m;
```
PHP方面需要安装PDO和GD库。

由于使用了文件型数据库`SQLite`，为了防止数据库和学生上传的作业被通过HTTP的方式GET下来，记得在Nginx的Server Block中做一些配置。
```
location /db{
    return 403;
}

location /upload{
    return 403;
}
```

在/etc/php.ini中修改如下行：
```
upload_max_filesize = 1000M
```

登录后台`login.php`，默认用户名`nginx`密码`apache`，添加可以上传的学生列表。

部署工作到此为止。

# 收作业方式

<del>在我们完成自动化收作业功能前，暂时只能使用crontab生成一个定时任务，用于方便收作业，BASH实现如下：
```
#!/bin/bash
zip -r /var/www/areaload/homework.zip /var/www/areaload/upload
```
</del>
直接使用后台的“收作业”按钮即可！

# TODO

- [x] 使用图形验证码防止自动提交脚本
- [ ] 服务端的文件扫描和正确性测试
- [x] 编写一个Web GUI方便教师用HTTP的方式修改trustlist和清除学生提出的问题
- [x] 程序的模块化重构，使用统一文件来handle用于的上传操作
- [x] 管理页面SQL防注入
- [ ] 多用户管理
- [x] 后台界面添加收作业功能
- [x] request页面防注入
- [x] 解决不同学号上传同名文件覆盖问题
- [x] 改善收作业功能
- [x] 修复修改课程部分无法提交修改的Bug

# Author

Architect and major PHP programming:
[@n0vad3v](https://github.com/n0vad3v)

JavaScript and uploaded.php table design:
[@allenliu](https://github.com/allenliu123)

SQL injection prevention and Student number validation design:
[@jazoma](https://github.com/jazoma)

# License

GNU General Public License v3.0
