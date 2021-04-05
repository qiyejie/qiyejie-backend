# 待办接口
## 接口信息
### 用于待办的增加操作

POST /api/oa/need_deal/new_deal.php

|参数|说明|
|---|---|
|qyj_id|用户id|
|title|待办标题|
|content|待办详情|
|dead_line|截止时间|
|classify|待办分类|

返回0:失败，1:成功

### 用于删除待办

POST /api/oa/need_deal/delete_deal.php
|参数|说明|
|---|---|
|qyj_id|用户id|
|title|待办标题|

返回0:失败，1:成功

### 用于完成待办

POST  /api/oa/need_deal/deal_complete.php
|参数|说明|
|---|---|
|qyj_id|用户id|
|title|待办标题|

返回0:失败，1:成功

### 用于获取待办

POST /api/oa/need_deal/get_need_deal.php
|参数|说明|
|---|---|
|qyj_id|用户id|

返回json列表

### 获取分类列表
POST /api/oa/need_deal/get_classify.php
|参数|说明|
|---|---|
|qyj_id|用户id|
