# 请假请求接口

## 提交请假申请

POST `/api/oa/leave_work/leave_work.php`



|参数|说明|
|---|---|
|qyj_id|用户的id|
|send_to_id|处理人|
|leave_date|请假开始离开日期|
|back_date|请假结束返回日期|
### 返回值
返回 `1` 则为申请请假成功

## 获取当前请假申请

POST `/api/oa/leave_work/get_apply_info.php`
|参数|说明|
|---|---|
|qyj_id|用户的id|
### 返回值
返回 json格式，参考数据库字段文档

## 获取当前待审批假期

POST `/api/oa/leave_work/get_approval.php`
|参数|说明|
|---|---|
|qyj_id|用户的id|

### 返回值

返回json格式数据，参考数据库字段

## 对请假申请进行审核

POST `/api/oa/leave_work/set_approval.php`

|参数|说明|
|---|---|
|apply_id|申请的id，数据库自增|
|is_apply|同意/拒绝(1/2)|
### 返回值
审批成功返回1，失败返回0
