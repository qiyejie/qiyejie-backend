# 企业捷-backend项目文档

本项目用来服务企业捷项目的后端业务（通过webhook.js部署到backend环境）
## 自动化部署流程
GitHub webhook部署
webhook.js
deploy.sh
pm2守护进程
详见: https://segmentfault.com/a/1190000016071010
## 基本信息

**部署环境：**

Linux + Nginx + MySql + PHP

**版本信息**

PHP：7.3

**图床：**

七牛云存储
icon:  http://icon.tanyang.asia

**GitHub:**

https://github.com/qiyejie/backend

## 域名信息

根域名：        tanyang.asia

测试：            http://develop.tanyang.asia

后端：            https://backend.tanyang.asia

官网：            https://www.tanyang.asia

文件云存储：file.tanyang.asia

## 数据库信息

**数据库管理**(adminer)：https://backend.tanyang.asia/adminer.php

**username**: backend

**password:** qiyejie

## 表信息

### user表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| -------------- | -------- | ---- | ---- | ---- | ---------------- |
| qyj_id         | varchar  | 16   | 是   | 否   | 用户ID           |
| email          | varchar  | 16   | 否   | 否   | 用户邮箱         |
| password       | varchar  | 16   | 否   | 否   | 用户密码         |
| name           | varchar  | 16   | 否   | 否   | 用户姓名         |
| gender         | number   | 2    | 否   | 否   | 用户性别         |
| nationality    | varchar  | 64   | 否   | 否   | 用户国籍         |
| id_type        | number   | 16   | 否   | 否   | 证件类型         |
| id_number      | number   | 32   | 否   | 否   | 证件号码         |
| address        | varchar  | 128  | 否   | 否   | 用户通信地址     |
| number         | varchar  | 16   | 否   | 否   | 用户的企业工号   |
| title          | varchar  | 64   | 否   | 否   | 用户的职位       |
| device_id      | varchar  | 256  | 否   | 否   | 用户绑定的设备id |
| department     | varchar  | 128  | 否   | 否   | 用户所属部门    |
| entry_time     | DATE     | 3    | 否   | 否   | 入职时间         |
| departure_time | DATE     | 3    | 否   | 是   | 离职时间         |


### company表
| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| -------------- | -------- | ---- | ---- | ---- | ---------------- |
| name           | varchar  | 256  | 否   | 否   | 公司名称       |
| wifi           | varchar  | 256  | 否   | 否   | 企业WiFi   |
| position       | varchar  | 128  | 否   | 否   | 企业位置   |
| ip             | varchar  | 128  | 否   | 否   | 企业ip地址 |

### chat_message表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| from_userid | varchar | 128 | 否 | 否 | 发送的用户 |
| to_userid   | varchar | 128 | 否 | 否 | 接收的用户 |
| message     | varchar | 128 | 否 | 否 | 消息内容 |
| is_read     | varchar | 128 | 否 | 否 | 是否已读 |
| send_time   | varchar | 128 | 否 | 否 | 发送时间 |

### chat_group表
| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| group_id | varchar | 128 | 是 | 否 | 群组ID |
| group_name | varchar | 128 | 否 | 否 | 群组名称 |
| member | varchar | 128 | 否 | 否 | 成员列表 |



### attendance表
| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
|signed_date|DATE|32|否|否|日期|
|signed_id|varchar||否|否|签到人员|
|signed_time|||||签到时间|

### worklog表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| user_id |      |      |      |      | 日志编写人 |
| log_name |      |      |      |      | 日志标题 |
| log_file |      |      |      |      | 文件位置 |

### leave_work表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| apply_id |  |  | 是 |  | 申请id |
| qyj_id |      |      |      |      | 申请人 |
| send_to |      |      |      |      | 下一步处理人 |
| is_apply |      |      |      |      | 是否已经通过 (0:审核中，1:通过,2:拒绝|
| leave_date |      |      |      |      | 请假离开日期 |
| back_date |      |      |      |      | 请假结束日期 |

### file表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| file_id |  |  | 是 |  | 文件id |
| filename |      |      |      |      | 文件名 |
| path |      |      |      |      | 存放路径 |
| from_id |      |      |      |      | 上传者 |
| upload_time |      |      |      |      | 上传时间 |
| file_group |      |      |      |      | 分类 |
|download_auth|||||下载权限|

### need_deal表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| qyj_id |      |      |      |      | 用于标识属于哪一个用户 |
| title | | | | | 待办的标题 |
| content |      |      |      |      | 待办的内容 |
| is_done |      |      |      |      | 是否已完成(0：未完成，1：完成) |
| deadline | DATE |      |      |      | 截止日期 |
| classify |      |      |      |      | 待办的分类 |
|address|     | |||事件的地址|
### notice表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| title |      |      |      |      | 公告标题 |
| content | | | | | 公告内容 |
| send_time | DATE |      |      |  | 发送时间                       |
