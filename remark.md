
## 进入到主体目录
```
cd /e/BETASITE/zixuehu/wp-content/themes/q1
```

q1_api

q1_field

q1_cookie


## 要点

1. get_template_directory_uri 和 get_template_directory 的区别.
解答: get_template_directory_uri是网络请求的主题路径, 例如 http://localhost/zixuehu/wp-content/themes/hedao
而get_template_directory是本地的主题真实路径 例如 E:\BETASITE\zixuehu\wp-content\themes


## 异常
1. 当新增或删除category和tag时, 出现"Something went wrong"提示, 检查发现操作成功, 但是回调显示有问题.
原因: functions.php中引入的文件在"<?php" 前面有空格
解决: 逐个排查functions.php中引入的文件

2. syntax error, unexpected 'class' (T_CLASS), expecting identifier (T_STRING)
原因: php版本号太低
解决: 更换一个高版本php

3. git bash找不到composer命令
原因：git bash必须识别全名称，也就是composer.bat无效
解决：新建composer文件，把执行composer.bat的脚本写进去