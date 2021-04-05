# 请假请求接口

## 接口信息

接口描述：

用于提交请假申请

接口地址：

POST `/api/oa/leave_work/leave_work.php`

## 需要参数

|参数|说明|
|---|---|
|qyj_id|用户的id|
|send_to_id|处理人|
|leave_date|请假开始离开日期|
|back_date|请假结束返回日期|
## 返回值
返回 `1` 则为申请请假成功
