# Nokali Vuln #

nokali靶场是一款基于ThinkPHP5开发，内置了各项漏洞的靶场项目，适合新手入门渗透技术或者作为代码审计教学等用途，当然，由于它故意设计了大量的安全漏洞，它极其易受攻击，因此您不应该在任何情况下将其部署在真实的环境中，也不应该将其暴露在公网，**您应该在可控情况下将其部署在虚拟机中练习**（参考DVWA等）。

它的特点是并不把各种漏洞孤立出来并单独展示，而是综合在一起形成一个可用的站点，相比于DVWA等靶场，更贴近真实环境。
它存在各种容易发现的和不容易发现的安全问题，有些是故意的，有些可能是隐藏的（甚至我作为开发者也不一定知道），您可以多加尝试。
可能出现的安全问题：SQL注入，弱口令，任意文件上传，越权访问等……

由于刚刚发布，可能存在各种问题，欢迎提交各种issues，**也可以在issues提交你渗透的过程和payload，以及，也欢迎在issues提交其他任何内容~**

**如果觉得学到了一些东西，可以在右上角点一个免费的Star来支持作者，如果Star够多的话作者会持续更新的~**

### 关于部署 ###

作者使用的环境：**Windows虚拟机＋PHPstudy（Apache-php7）**
由于开发使用的是ThinkPHP，通常需要编辑`.htaccess文件`来省去路由入口，当然，如果你的环境和作者类似（**Apache**），**一般将不需要再做任何配置（因为我已经帮你配置好了）**，将文件解压放入WWW文件夹，**将网站根目录指定为网站根目录下的public目录即可**
例如作者的环境中网站根目录为：`C:/phpstudy_pro/WWW/dev/tp5/public`

**然后导入数据库文件（nokali.sql），就可以开始使用了**

### 如果部署出错 ###

一般来说如果只是Windows＋phpstudy（apache）的环境，部署不太可能出问题

**如果是Linux系的系统（或者mac），需要确保runtime目录有可写权限**

其他最常见的情况是路径错误（因为thinkphp的路径比较繁琐）
根据ThinkPHP官方开发文档给出的修复方案
如果使用的是Apache：
需要在入口文件的同级添加.htaccess文件（官方默认自带了该文件），内容如下：
```
<IfModule mod_rewrite.c>
Options +FollowSymlinks -Multiviews
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
</IfModule>
```
或者如果无效的话就设置为下面这种（本靶场开发时使用的）：
```
<IfModule mod_rewrite.c>
Options +FollowSymlinks -Multiviews
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php?/$1 [QSA,PT,L]
</IfModule>
```
如果是PHPstudy：
```
<IfModule mod_rewrite.c> 
Options +FollowSymlinks -Multiviews 
RewriteEngine on 
RewriteCond %{REQUEST_FILENAME} !-d 
RewriteCond %{REQUEST_FILENAME} !-f 
RewriteRule ^(.*)$ index.php [L,E=PATH_INFO:$1] 
</IfModule>
```
如果是Nginx：
```
location / { // …..省略部分代码
    if (!-e $request_filename) {
        rewrite  ^(.*)$  /index.php?s=/$1  last;
        break;
    }
}
```