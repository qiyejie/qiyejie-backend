# 企业捷-backend项目文档

本项目用来服务企业捷项目的后端业务（通过webhook.js部署到backend环境）
## 自动化部署流程
**GitHub webhook部署**
**webhook.js**
**deploy.sh**
**pm2守护进程**
**详见: https://segmentfault.com/a/1190000016071010**

## 基本信息

**部署环境：**

Linux + Nginx + MySql + PHP

**版本信息**

PHP：7.3a

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

### users表

| 列名            | 数据类型  | 长度  | 主键 | 空   | 说明             |
| -------------- | -------- | ---- | ---- | ---- | ----------------|
| qyj_id         | varchar  | 64   | 是   | 否   | 用户ID           |
| nickname       | varchar  | 64   | 否   | 否   | 用户昵称          |
| password       | varchar  | 128   | 否   | 否   | 用户密码          |
| session_id     | varchar  | 128   | 否   | 否   | 用户的会话id      |
| email          | varchar  | 128   | 否   | 否   | 用户邮箱          |
| name           | varchar  | 16   | 否   | 否   | 用户姓名          |
| gender         | int      | 2    | 否   | 否   | 用户性别（0:'女',1:'男'）|
| nationality    | varchar  | 64   | 否   | 否   | 用户国籍          |
| id_type        | varchar  | 128  | 否   | 否   | 证件类型          |
| id_number      | int      | 32   | 否   | 否   | 证件号码          |
| id_address     | varchar  | 128  | 否   | 否   | 用户证件地址       |
| contact_address| varchar  | 128  | 否   | 否   | 用户通信地址       |
| company_id     | varchar      | 64   | 否   | 否   | 用户的企业id       |
| device_id      | varchar  | 128   | 否   | 否   | 用户绑定的设备id   |
| online |  |  |  |  | 用户在线状态(0:不在线，1:在线) |

### companies表
| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| -------------- | -------- | ---- | ---- | ---- | ---------------- |
| company_id |  |  | 是 |  | 企业ID |
| creater_id | | | 否 | | 创建者的qyj_id |
| name           | varchar  | 256  | 否   | 否   | 企业名称       |
| profile |  |  |  |  | 企业简介 |
| logo |  |  |  |  | 企业logo |
| wifi           | varchar  | 256  | 否   | 否   | 企业WiFi   |
| position       | varchar  | 128  | 否   | 否   | 企业位置   |
| ip             | varchar  | 128  | 否   | 否   | 企业ip地址 |

### departments表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| -------------- | -------- | ---- | ---- | ---- | ---------------- |
| department_id |  |  | 是 |  | 部门ID |
| company_id | | |  | | 所属企业id |
| department_name | | | | | 部门名称 |
### department_ members表
| 列名          | 数据类型 | 长度 | 主键 | 空   | 说明                   |
| ------------- | -------- | ---- | ---- | ---- | ---------------------- |
| m_id          |          |      |      |      | 自增id                 |
| qyj_id        |          |      |      |      | 用户id                 |
| department_id |          |      |      |      | 部门id                 |
| identity      |          |      |      |      | 身份（普通员工，领导） |





### chat_message表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| mid |  |  |  |  | 消息id |
| from_userid | varchar | 128 | 否 | 否 | 发送的用户 |
| to_userid   | varchar | 128 | 否 | 否 | 接收的用户 |
| message     | varchar | 128 | 否 | 否 | 消息内容 |
| is_push | varchar | 128 | 否 | 否 | 是否已推送到客户 |
| send_time   | varchar | 128 | 否 | 否 | 发送时间 |

### chat_group表
| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| group_id | varchar | 128 | 是 | 否 | 群组ID |
| group_logo |  |  |  |  | logo |
| group_name | varchar | 128 | 否 | 否 | 群组名称 |

### chat_group_member

| 列名     | 说明 |
| -------- | ---- |
| mid      |      |
| group_id |      |
| qyj_id   |      |

### chat_group_message表

| 列名      | 说明       |
| --------- | ---------- |
| mid       |            |
| group_id  | 群组id     |
| from_user | 发送用户id |
| content   | 消息内容   |
| time      | 时间       |

### chat_message_without_read

| 列名     | 说明            |
| -------- | --------------- |
| mid      | 消息id          |
| from_id  | 发送者id        |
| to_id    | 接受者id        |
| content  | 消息内容        |
| is_group | 0:非群组 1:群组 |
| group_id | 群组id          |
| time     | 发送时间        |





### attendance表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| sign_id |  |  | 是 |  | 自增id |
|sign_date|DATE|32|否|否|日期|
|qyj_id|varchar||否|否|签到人员|
|sign_time|||||签到时间|

### makeup表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
|makeup_id|||||补卡id|
|qyj_id|||||申请人的id|
|approvel_id|||||审批人员|
|status|||||处理结果(0:正在审批，1:通过,2:拒绝)|

### leave_work表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| apply_id |  |  | 是 |  | 申请id |
| qyj_id |      |      |      |      | 申请人 |
| send_to |      |      |      |      | 下一步处理人 |
| content | | | | | 请假详情 |
| is_apply |      |      |      |      | 是否已经通过 (0:审核中，1:通过,2:拒绝|
| leave_date |      |      |      |      | 请假离开日期 |
| back_date |      |      |      |      | 请假结束日期 |



### file表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| file_id |  |  | 是 |  | 文件id |
| filename |      |      |      |      | 文件名 |
| path |      |      |      |      | 存放路径 |
| group_id |      |      |      |      | 所属群组 |
| from_id |      |      |      |      | 上传者 |
| upload_time |      |      |      |      | 上传时间 |
### need_deal表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| deal_id |  |  | 是 |  | 待办的id |
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
| notice_id |  |  | 是 |  | 公告id(自增) |
| title |      |      |      |      | 公告标题 |
| content | | | | | 公告内容 |
| send_user | | | | | 发送人 |
| group_id | | | | | 群组id |
| send_time | DATE |      |      |  | 发送时间                       |

### schedule表
| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| schedule_id |  |  | 是 |  | 日程id(自增) |
| creater_id |  |  | 是 |  | 创建者id |
| title | | |  | | 日程标题 |
| content | | |  | | 日程详情 |
| start_time | | |  | | 日程开始时间 |
| end_time | | |  | | 日程结束时间 |
| level | | |  | | 重要等级 |

### schedule_member表

| 列名        | 说明   |
| ----------- | ------ |
| mid         | 自增id |
| schedule_id | 日程id |
| qyj_id      | 用户id |



### memo表

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| ----------- | ---- | ---- | ---- | ---- | ---- |
| memo_id |  |  | 是 |  | 便签id(自增) |
| qyj_id | | |  | | 标记便签所属用户 |
| title | | |  | | 便签标题 |
| content | | |  | | 便签内容 |
| time | | |  | | 最后一次编辑时间 |