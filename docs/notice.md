# 公告接口

## 接口信息

### 用于通知的增加操作

POST /api/oa/notice/send_notice.php

| 参数      | 说明             |
| --------- | ---------------- |
| send_user | 添加公告的用户id |
| title公告 | 标题             |
| content   | 公告详情         |

返回信息(0:失败,1:成功)

### 用于公告的删除操作

POST /api/oa/notice/delete_notice.php

| 参数      | 说明             |
| --------- | ---------------- |
|notice_id|公告的id|

返回信息(0:失败,1:成功)



### 用于 公告的获取操作

GET /api/oa/notice/get_notice.php

无需传入参数，返回json格式数据，详情参考数据库文档