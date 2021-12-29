
## 进入到主体目录
```
cd /e/BETASITE/zixuehu/wp-content/themes/q1
```

q1_api

q1_field

q1_cookie


## 异常
1. 当新增或删除category和tag时, 出现"Something went wrong"提示, 检查发现操作成功, 但是回调显示有问题.
原因: functions.php中引入的文件在"<?php" 前面有空格
解决: 逐个排查functions.php中引入的文件