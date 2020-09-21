# predator

ps:在本地使用环境，请将文件夹放在服务器根目录，并命名为predators，方便测试ssrf漏洞。


方便测试中损坏系统，重新搭建。利用Docker搭建起来的步骤：

1.下载测试环境所有文件

```Bash
git clone https://github.com/zalcat/predator
```

2.使用 Dockerfile 创建镜像
```Bas
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

