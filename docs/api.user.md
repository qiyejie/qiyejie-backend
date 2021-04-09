# api/user

## user_register.php

必要参数

| 参数     | 说明                     |
| -------- | ------------------------ |
| username | 用户名（用户的真实姓名） |
| password | 密码                     |

返回参数
| 参数     | 说明                     |
| -------- | ------------------------ |
| result | 0:成功，1:失败 |
| qyj_id |qyj_id用于登录                    |

```
{
"result":0 (1)
"qyj_id":3333
}
```
## user_login.php
必要参数

| 参数     | 说明       |
| -------- | ---------- |
| qyj_id   | 用户qyj_id |
| password | 密码       |

返回参数

| 参数     | 说明                     |
| -------- | ------------------------ |
| 0| 失败 |
| 1| 成功  |
## user_logout.php
必要参数

| 参数     | 说明                     |
| -------- | ------------------------ |
| qyj_id   | 用户qyj_id|

返回参数

| 参数     | 说明                     |
| -------- | ------------------------ |
| 0| 失败 |
| 1| 成功  |
## user_get_info.php
必要参数

| 参数     | 说明       |
| -------- | ---------- |
| qyj_id   | 用户qyj_id |

返回参数(json)

```
{
    "qyj_id": "1",
    "email": "dsad@qq.com",
    "name": "王大锤",
    "gender": "男",
    "nationality": "中国",
    "id_type": "身份证",
    "id_number": "76218736812376",
    "id_address": "地球村",
    "device_id": "",
    "company_id": "",
    "contact_address": "地球小区",
    "session_id": "None"
}
```



## user_change_info.php

必要参数

| 参数            | 说明       |
| --------------- | ---------- |
| qyj_id          | 用户qyj_id |
| email           | 邮箱       |
| gender          | 性别       |
| nationality     | 国籍       |
| id_type         | 证件类型   |
| id_number       | 证件号     |
| id_address      | 证件地址   |
| contact_address | 通信地址   |

返回参数

| 参数     | 说明                     |
| -------- | ------------------------ |
| 0| 失败 |
| 1| 成功  |