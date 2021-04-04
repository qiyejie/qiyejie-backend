# 通讯录api

## IN:
GET /api/oa/mail_list.php
## OUT：

```
{
  "department":[
    {
      "name":"John",
      "is_leave":"0",
      "is_login":"1"
    },
    {
      "name":"Anna",
      "is_leave":"0",
      "is_login":"1"
    },
    {
      "name":"Peter",
      "is_leave":"1",
      "is_login":"0"
    }
  ]
}

```

**说明 ： **

is_leave状态(1:请假，0:未请假)

is_login状态(1:未登录，0:登录)