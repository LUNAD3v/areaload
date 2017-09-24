# AreaLoad

![AreaLoad](./img/areaload.png)

一个用PHP编写的作业上传平台。
[演示地址](https://lunaluna.org/areaload)

# 设计特性

* 限制上传学生的学号范围
* 限制了上传文件的后缀名（7z,rar,zip）
* 使用[Securimage](https://www.phpcaptcha.org/)提供的图形验证码防止脚本攻击
* 文件上传后即重命名，防止出现同学号不同文件名重复上传覆盖掉其他学生的作业
* 上传文件大小限制为1Gib
* 后端管理界面可动态地添加和删除课程和分类
* 记录上传学生IP，用于后期统计

# 部署情况

目前我们仅仅在校内进行了小规模的试验，取得了良好的反馈，同时我们十分感谢以下课程的老师对我们平台的信任和支持！

### 重庆交通大学

* Web技术基础结业报告
* 大数据开发语言课程实验报告
* 面向对象程序设计期末实验操作考试

如果你也在使用我们的平台进行作业提交，欢迎来告诉我们哟，我们会在这个页面予以公示～

# 如何部署

参照我们的[安装教程](https://github.com/LUNAD3v/areaload/wiki/Installation-Guide)

# TODO

这是一个开源项目，如果您有什么建议可以在issue中提出，或者可以直接参与我们的开发！

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
- [ ] 在管理后台修改文件类型限制和登陆密码
- [ ] 页面美化
- [ ] 代码健壮性审计
- [x] 更好的Ticket处理机制

# Authors

Architect and major PHP programming:
[@n0vad3v](https://github.com/n0vad3v)

Major JavaScript，uploaded.php table design and UI design:
[@allenliu](https://github.com/allenliu123)

SQL injection prevention and Student number validation function design:
[@jazoma](https://github.com/jazoma)

# License

GNU General Public License v3.0
