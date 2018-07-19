<?php
/**
 * @name IndexController
 * @author lenovo-pc\tao
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf_Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/sample/index/index/index/name/lenovo-pc\tao 的时候, 你就会发现不同
     */
	public function indexAction() {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new SampleModel();
		$haha = "What is (ÒωÓױ)！";
		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("haha", $haha);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}
}
