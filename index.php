<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Predators渗透测试演练系统</title>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
    <script src="layui/layer/layer.js"></script>
    <script src="layui/jquery-3.2.1/jquery-3.2.1.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">渗透测试演练系统</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
<!--         <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul> -->
<ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item"> <button type="button" οnclick="selectRole()" class="layui-btn layui-btn-primary layui-btn-radius"> 学习必备</button>
                <dl class="layui-nav-child">
                    <dd><a href="https://www.baidu.com/" target="_blank">搜索引擎</a></dd>
                     <dd>
                        <a href="https://www.hackjie.com/">黑客街</a>
                    </dd>
                    <dd>
                        <a href="https://www.ctftools.com/down/">工具盒子</a>
                    </dd>
                    <dd>
                        <a href="https://www.shentoushi.top/">安全工程师导航</a>
                    </dd>
<!--                     <dd><a href="">联系作者</a></dd> -->
                </dl> 
                    <img src="layui/font/test.jpg"  class="layui-nav-img">
                    zalcat
               <!--  </a> -->

                
<!--             </li> 
            <li class="layui-nav-item"><a href="">退出</a></li> -->
        </ul>
    </div>
    <!-- 核心列表 -->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="start.php" target="fm_content"><i class="layui-icon layui-icon-find-fill"></i>  系统介绍</a>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-password"></i> 口令破解</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/burteforce/burteforce.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/burteforce/bf_form.php" target="fm_content">基于表单的破解</a></dd>
                        <dd><a href="vul/burteforce/bf_server.php" target="fm_content">验证码绕过(on server)</a></dd>
                        <dd><a href="vul/burteforce/bf_client.php" target="fm_content">验证码绕过(on client)</a></dd>
                        <dd><a href="vul/burteforce/bf_token.php" target="fm_content">token防爆破</a></dd>
                    </dl>
                </li>
                <!-- <li class="layui-nav-item"><a href="javascript:;">Cross-Site Scripting</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/xss/xss.php"  target="fm_content">概述</a></dd>
                        <dd><a href="vul/xss/xss_reflected_get.php" target="fm_content">反射型xss(get)</a></dd>
                        <dd><a href="vul/xss/xsspost/post_login.php"  target="fm_content">反射型xss(post)</a></dd>
                        <dd><a href="vul/xss/xss_stored.php"  target="fm_content">存储型xss</a></dd>
                        <dd><a href="vul/xss/xss_dom.php"  target="fm_content">DOM型xss-x</a></dd>
                        <dd><a href="vul/xss/xss_dom_x.php"  target="fm_content">DOM型xss-x</a></dd>
                        <dd><a href="vul/xss/xssblind/xss_blind.php"  target="fm_content">xss之盲打</a></dd>
                        <dd><a href="vul/xss/xss_01.php"  target="fm_content">xss之过滤</a></dd>
                        <dd><a href="vul/xss/xss_02.php"  target="fm_content">xss之htmlspecialchars</a></dd>
                        <dd><a href="vul/xss/xss_03.php"  target="fm_content">xss之href输出</a></dd>
                        <dd><a href="vul/xss/xss_04.php"  target="fm_content">xss之js输出</a></dd>
                    </dl>
                </li> -->
                 <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-share"></i>  CSRF</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/csrf/csrf.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/csrf/csrfget/csrf_get_login.php" target="fm_content">CSRF(get)</a></dd>
                        <dd><a href="vul/csrf/csrfpost/csrf_post_login.php" target="fm_content">CSRF(post)</a></dd>
                        <dd><a href="vul/csrf/csrftoken/token_get_login.php" target="fm_content">CSRF Token</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-edit"></i>  SQL-Inject</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/sqli/sqli.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/sqli/sqli_id.php" target="fm_content">数字型注入(post)</a></dd>
                        <dd><a href="vul/sqli/sqli_str.php" target="fm_content">字符型注入(get)</a></dd>
                        <dd><a href="vul/sqli/sqli_search.php" target="fm_content">搜索型注入</a></dd>
                        <dd><a href="vul/sqli/sqli_x.php" target="fm_content">xx型注入</a></dd>
                        <dd><a href="vul/sqli/sqli_del.php" target="fm_content">"delete"型注入</a></dd>
                        <dd><a href="vul/sqli/sqli_blind_b.php" target="fm_content">盲注(base on boolian)</a></dd>
                        <dd><a href="vul/sqli/sqli_blind_t.php" target="fm_content">盲注(base on time)</a></dd>
                        <dd><a href="vul/sqli/sqli_widebyte.php" target="fm_content">宽字节注入</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-release"></i>  RCE</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/rce/rce.php" target="fm_content">概述</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/rce/rce_ping.php" target="fm_content">exec "ping"</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/rce/rce_eval.php" target="fm_content">exec "eval"</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-list"></i>  File inclusion</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/fileinclude/fileinclude.php" target="fm_content">概述</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/fileinclude/fi_local.php" target="fm_content">File Inclusio(local)</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/fileinclude/fi_remote.php" target="fm_content">File Inclusion(remote)</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-download-circle"></i>  Unsafe Filedownload</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/unsafedownload/unsafedownload.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/unsafedownload/down_r.php" target="fm_content">Unsafe Filedownload</a></dd>
                    </dl>
                </li>
                <!-- <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-upload"></i>  Unsafe Fileupload</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/unsafeupload/upload.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/unsafeupload/clientcheck.php" target="fm_content">client check</a></dd>
                        <dd><a href="vul/unsafeupload/servercheck.php" target="fm_content">MIME type</a></dd>
                        <dd><a href="vul/unsafeupload/getimagesize.php" target="fm_content">getimagesize</a></dd>
                        
                    </dl>
                </li> -->
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-user"></i>  Over Permission</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/overpermission/op.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/overpermission/op1/op1_login.php" target="fm_content">水平越权</a></dd>
                         <dd><a href="vul/overpermission/op2/op2_login.php" target="fm_content">垂直越权</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-read"></i>  ../../</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/dir/dir.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/dir/dir_list.php" target="fm_content">目录遍历</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-camera-fill"></i>  敏感信息泄露</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/infoleak/infoleak.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/infoleak/findabc.php" target="fm_content">IcanseeyourABC</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-align-left"></i>  PHP反序列化</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/unserilization/unserilization.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/unserilization/unser.php" target="fm_content">PHP反序列化漏洞</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-template"></i>  XXE</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/xxe/xxe.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/xxe/xxe_1.php" target="fm_content">XXE漏洞</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-refresh-3"></i>  URL重定向</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/urlredirect/unsafere.php" target="fm_content">概述</a></dd>
                        <dd><a href="vul/urlredirect/urlredirect.php" target="fm_content">不安全的URL跳转</a></dd>
                    </dl>
                </li>
                
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-layer"></i>SSRF</a>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/ssrf/ssrf.php" target="fm_content">概述</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/ssrf/ssrf_curl.php" target="fm_content">SSRF(curl)</a></dd>
                    </dl>
                    <dl class="layui-nav-child">
                        <dd><a href="vul/ssrf/ssrf_fgc.php" target="fm_content">SSRF(file_get_content)</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->


<!-- 实例页面 -->
        <iframe src="start.php" frameborder="0" name="fm_content" width="100%" height="100%"></iframe>

    </div>

    <div class="layui-footer">
        <center>If you want to go fast, go alone. If you want to go far, go together.</center>
        <!-- 底部固定区域
        © layui.com - 底部固定区域 -->
    </div>
</div>
<script src="layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
