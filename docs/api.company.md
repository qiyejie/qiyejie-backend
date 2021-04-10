# api.company

## company_create.php

必要参数

| 参数   | 说明     |
| ------ | -------- |
| qyj_id | 创建者id |
| name   | 公司名称 |

返回参数

| 参数       | 说明           |
| ---------- | -------------- |
| result     | 0:成功，1:失败 |
| company_id | 企业id         |

```
{
"result":0 (1)
"company_id":3333
}
```

## company_add_manager.php

必要参数

| 参数       |                |
| ---------- | -------------- |
| company_id | 公司id         |
| qyj_id     | 管理员的qyj_id |

返回参数

0:失败，1:成功

## company_change_info.php

必要参数

| 参数       |        |
| ---------- | ------ |
| company_id | 公司id |
| name       | 名称   |
| wifi       | wifi   |
| position   | 位置   |
| ip         | ip     |

返回参数

0:失败，1:成功

## company_get_info.php

必要参数

| 参数       |        |
| ---------- | ------ |
| company_id | 公司id |

返回参数参考数据库