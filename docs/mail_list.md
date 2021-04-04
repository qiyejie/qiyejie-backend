# 通讯录api

## IN:

| 参数    | 说明     | 格式 |
| ------- | -------- | ---- |
| user_id | 用户的id | json |

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