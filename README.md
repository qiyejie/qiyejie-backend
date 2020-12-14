# backend

本项目用来服务企业捷项目的后端业务

# 后端项目文档

## 基本信息

**部署环境：**

Linux + Nginx + MySql + PHP

**图床：**

七牛云存储

**GitHub:**

https://github.com/qiyejie/backend

## 域名信息

根域名：        tanyang.asia

后端：            backend.tanyang.asia

官网：            www.tanyang.asia

文件云存储：file.tanyang.asia

## 数据库信息

数据库adminer：https://backend.tanyang.asia/adminer.php（backend:qiyejie）

### user

| 列名           | 数据类型 | 长度 | 主键 | 空   | 说明             |
| -------------- | -------- | ---- | ---- | ---- | ---------------- |
| qyj_id         | varchar  | 16   | 是   | 否   | 用户ID           |
| email          | varchar  | 16   | 否   | 否   | 用户邮箱         |
| password       | varchar  | 16   | 否   | 否   | 用户密码         |
| nickname       | varchar  | 16   | 否   | 否   | 用户昵称         |
| name           | varchar  | 16   | 否   | 否   | 用户姓名         |
| gender         | number   | 2    | 否   | 否   | 用户性别         |
| nationality    | varchar  | 64   | 否   | 否   | 用户国籍         |
| id_type        | number   | 16   | 否   | 否   | 证件类型         |
| id_number      | number   | 32   | 否   | 否   | 证件号码         |
| address        | varchar  | 128  | 否   | 否   | 用户通信地址     |
| enterprise_id  | varchar  | 16   | 否   | 否   | 用户的企业ID     |
| number         | varchar  | 16   | 否   | 否   | 用户的企业工号   |
| title          | varchar  | 64   | 否   | 否   | 用户的职位       |
| device_id      | varchar  | 256  | 否   | 否   | 用户绑定的设备id |
| wifi           | varchar  | 256  | 否   | 否   | 用户的企业WiFi   |
| position       | varchar  | 128  | 否   | 否   | 用户的企业位置   |
| ip             | varchar  | 128  | 否   | 否   | 用户的企业ip地址 |
| entry_time     | DATE     | 3    | 否   | 否   | 入职时间         |
| departure_time | DATE     | 3    | 否   | 是   | 离职时间         |









