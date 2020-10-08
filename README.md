# What is Predator

Predator是一个web渗透测试演练平台，包含了常见但危害巨大的Web漏洞，使用了前端框架layui。可通搭建建Docker容器，快速部署测试。




# How to use

ps:在本地使用环境，请将文件夹放在服务器根目录，并命名为predators，方便测试ssrf漏洞。
利用Docker搭建起来的步骤：

1.下载测试环境所有文件

```Bash
git clone https://github.com/zalcat/predator
```

2.使用 Dockerfile 创建镜像
```Bash
docker build -t predator .
```
使用当前目录Dkerfile 创建镜像，命为 predator。（要和Dockerfile在同一目录，注意命令后面还有一个点）

3.查看docker容器是否创建成功
```Bash
docker images
```

4.启动容器predator
```Bash
docker run -it -d -p 8082:80 imageID
```

5.可能需要将数据库连接密码置为空(还在探索原因...)
进入容器修改配置文件连接mysql数据库
```Bash
docker exec -it containID /bin/bash
cd app/inc/ && vim config.inc.php
```


-- 至此就完成了~

# Live Demo

项目展示地址(个人服务器，不保证能访问，访问不了就是在测试)

http://47.100.93.180:8082/





