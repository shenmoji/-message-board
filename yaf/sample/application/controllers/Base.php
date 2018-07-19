<?php
/**
 * @name BaseController
 * @author itcast
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class BaseController extends Yaf_Controller_Abstract 
{
	
	/**
     * 跳转成功页面
     * @param string $url      跳转地址
     * @param string $message  提示信息
     * @param int    $time     跳转时间（秒）
     */
    protected function success($url, $message, $time = 3)
    {
        $this->jump($url, $message, $time, 'success');
    }
    /**
     * 跳转失败页面
     * @param string $url      跳转地址
     * @param string $message  提示信息
     * @param int    $time     跳转时间（秒）
     */
    protected function error($url, $message, $time = 3)
    {
        $this->jump($url, $message, $time, 'error');
    }
    
    /**
     * 跳转页面
     * @param string $url      跳转地址
     * @param string $message  提示信息
     * @param int    $time     跳转时间（秒）
     * @param string $state    状态
     */
     private function jump($url, $message = '操作成功，3秒后跳转', $time = 3, $state = 'success')
    {
        echo <<<STR
        <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="{$time};URL={$url}">
<title>提示页面</title>
<style type="text/css">
#img{text-align:center;margin-top:50px;margin-bottom:20px;}
.info{text-align:center;font-size:24px;font-family:'微软雅黑';font-weight:bold;}
#success{color:#060;}
#error{color:#F00;}
</style>
</head> 
<body>
    <div id="img"><img src="/public/{$state}.png" width="160" height="200" /></div>
    <div id='{$state}' class="info">{$message}</div>
</body>
</html>
STR;
        exit;
    }
	
}