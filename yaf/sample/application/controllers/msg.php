<?php
/**
 * @name MsgController
 * @author itcast
 * @desc 留言控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class MsgController extends Yaf_Controller_Abstract 
{
	//列表
	public function indexAction() 
	{
		#1.获取所有数据
		$msgs = (new MsgModel)->get('select * from msg');
		#2.加载视图并传递数据
		$this->getView()->assign('msgs', $msgs);
	    return $this->getView()->render('msg/index.phtml');
		#默认 return true 自动加载视图
		#通过 return false 禁止加载
		#return true;
	}
}