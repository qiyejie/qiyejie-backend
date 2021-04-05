# 接口信息

接口描述：

用于用户签到操作

接口用法：

POST ：`/api/oa/attendance/check_attendance.php`
# 需要参数
|参数|说明|
|---|---|
|user_id|用户的qyj_id|
|wifi_ssid|企业WIFI|
|wifi_ip|企业IP|
# 返回参数
|参数|说明|
|---|---|
|1|签到成功|
|2|今天已经签到|
|0|签到失败|
