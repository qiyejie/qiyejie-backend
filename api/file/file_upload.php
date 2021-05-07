<?php
// 引入七牛云SDK
require 'vendor/autoload.php';
// 鉴权
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
// 用于签名的公钥和私钥
$accessKey = 'Access_Key';
$secretKey = 'Secret_Key';
// 初始化签权对象
$auth = new Auth($accessKey, $secretKey);

?>