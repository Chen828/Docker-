现在有一台CentOS服务器，需要采用容器方式面向多租户提供web虚拟服务，并为用户开发基于web的远程容器启停管理功能。
（1）安装：安装最新版本的Docker，并开启远程管理接口。
（2）构造镜像：下载最新的httpd和mysql镜像；在httpd镜像基础上采用dockerfile构造自己的镜像myweb，增加ssh远程登录服务和php引擎，使容器用户能够远程登录到自己的myweb容器内，开发基于php的web应用。
（3）基于myweb镜像建立一个管理web容器，在里面用php开发对docker的镜像和容器管理服务：允许用户通过web界面实现镜像列表、活动容器列表、清除已停止容器、基于某个镜像创建容器、停止容器、重亲启动容器、通过exec在运行中容器内执行命令。
（4）如果对python、Java等语言熟悉，可以用其它语言实现任务（3）。
完成上述实验和开发后，编写项目实施报告，并现场演示和报告。



文件以.txt方便windows查看内容。

容器均以挂载workspace方式建立，方便更改同步：docker run -dit -p 32777;80 -p 32778:22 -v /root/login_workspace/ 
login_image:v0.0.0

构造镜像的文件Dockerfile与工作区文件分开存放。

四个容器：login，manager，user，mysql。
	login负责登录、注册验证。
	manager管理员界面、功能实现。
	user带开放。
	mysql存放账户密码数据。






待完善内容：
	注册验证码无法显示，注册不能返回作为账号的端口号，服务器不能为用户开启一个容器。
	容器start无效，镜像的remove、remove all、create a container无效
	界面左侧选择栏图标无法显示，原因是相应的css或js未加载。
	all选项框无效，若有效，则无需弹窗获取id，直接选项框勾选，按钮实现命令。