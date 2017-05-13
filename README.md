# AreaLoad

![AreaLoad](./img/areaload.png)
一个用PHP编写的作业上传平台
[演示地址](https://lunaluna.org/areaload)
[English README](./README_en.md)

# 设计特性

* 限制上传学生的学号范围（保存于db/trustlist.asc）
* 限制了上传文件的后缀名（7z,rar,zip）
* 通过随机函数生成一个简单的数学问题防止最基本的机器自动提交
* 文件上传后即锁定，防止出现恶意同名上传覆盖掉其他学生的成绩
* 上传文件大小限制为200M

# 如何部署

首先Clone这个Repo
```
git clone https://github.com/n0vad3v/areaload.git
```

我们喜欢Nginx，如果你用的是Nginx，那么在Nginx的全局（一般为/etc/nginx/nginx.conf）配置中，添加如下行
```
client_max_body_size 200m;
```

由于使用了文件型数据库，为了防止我们的数据库和学生上传的作业被通过HTTP的方式GET下来，记得在Nginx的Server Block中做一些配置。（/c那个由于会导致css被403，暂时无法block）
```
location /db{
    return 403;
}

location /web{
    return 403;
}

#location /c{
#    return 403;
#}

location /sec{
    return 403;
}

location /network{
	return 403;
}
location /cbase{
	return 403;
}
```

在/etc/php.ini中修改如下行：
```
upload_max_filesize = 200M
```

把允许上传的学生学号列表写入db/trustlist.asc中。

把index.php修改成你要的样式。

部署工作到此为止。

# 使用方式

使用crontab生成一个定时任务，用于方便收作业，BASH实现如下：
```
#!/bin/bash
zip -r /var/www/areaload/homework.zip /var/www/areaload/c /var/www/areaload/web /var/www/areaload/cbase /var/www/areaload/sec /var/www/areaload/network
```

# TODO

- [ ] 使用图形验证码防止自动提交脚本
- [ ] 服务端的文件扫描和正确性测试
- [ ] 编写一个Web GUI方便教师用HTTP的方式修改trustlist和清除学生提出的问题
- [ ] 程序的模块化重构，使用统一文件来handle用于的上传操作
- [ ] 使用PHP框架重构

# Author

Architect and major PHP programming:
[@n0vad3v](https://github.com/n0vad3v)

JavaScript and uploaded.php table design:
[@allenliu](https://github.com/allenliu123)
