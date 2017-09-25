# AreaLoad

![AreaLoad](./img/areaload.png)

一个用PHP编写的作业上传平台。
[演示地址](https://lunaluna.org/areaload)

# 介绍，部署方法，使用方法

请参照我们的[AreaLoad项目页面](https://lunaluna.org/areaload.html)

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
