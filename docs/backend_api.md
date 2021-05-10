# 企业捷后端接口文档

## 全局参数

### code

| 参数 | 解释     |
| ---- | -------- |
| 0    | 执行失败 |
| 1    | 执行成功 |

## /user/user_register.php

**用户注册**

需要传入参数

| 参数     | 说明     |
| -------- | -------- |
| email    | 用户邮箱 |
| password | 用户密码 |

返回参数

| 参数   | 说明             |
| ------ | ---------------- |
| code   | 返回值           |
| qyj_id | 用户注册获得的id |

同时会返回给用户cookies

## /user/user_login.php

**用户登录**

需要参数

| 参数     | 说明     |
| -------- | -------- |
| qyj_id   | 用户id   |
| password | 用户密码 |

返回参数

| 参数 | 说明   |
| ---- | ------ |
| code | 返回值 |

同时会返回给用户cookies

## /user/user_join_company.php

**用户加入公司**

需要参数

| 参数       | 说明   |
| ---------- | ------ |
| qyj_id     | 用户id |
| company_id | 企业id |

返回参数

| 参数 | 说明   |
| ---- | ------ |
| code | 返回值 |

## /user/user_get_info.php

**获取用户信息**

需要参数

| 参数   | 说明   |
| ------ | ------ |
| qyj_id | 用户id |

返回参数

除用户密码外所有信息

## /user/user_change_pass.php

**用户修改密码**

需要参数

| 参数     | 说明       |
| -------- | ---------- |
| qyj_id   | 用户id     |
| old_pass | 用户原密码 |
| new_pass | 用户新密码 |

返回参数

| 参数 | 说明   |
| ---- | ------ |
| code | 返回值 |

## /user/user_change_info.php

**用户修改信息**

| 参数            | 说明       |
| --------------- | ---------- |
| nickname        | 用户昵称   |
| email           | 用户邮箱   |
| name            | 用户姓名   |
| gender          | 用户性别   |
| nationality     | 用户国籍   |
| id_type         | 证件类型   |
| id_number       | 证件号码   |
| id_address      | 证件居住地 |
| contact_address | 通信地址   |
返回参数

| 参数 | 说明   |
| ---- | ------ |
| code | 返回值 |

## /user/user_logout.php

需要参数

| 参数   | 说明   |
| ------ | ------ |
| qyj_id | 用户id |

返回参数

| 参数 | 说明   |
| ---- | ------ |
| code | 返回值 |

