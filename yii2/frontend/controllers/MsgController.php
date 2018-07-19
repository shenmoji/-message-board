<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Msg;

/**
* 留言控制器
* @author phpopenfather
*/
class MsgController extends Controller
{
    //不加载layout
    public $layout = false;

    //关闭csrf攻击
    public $enableCsrfValidation = false;

    //列表
    public function actionIndex()
    {
        #步骤1：获取留言表数据
        $msgs = Msg::find()->all();
        #步骤2：加载视图
        return $this->render('index', compact('msgs')); 
    }

    //添加
    public function actionAdd()
    {
        #步骤1：判断请求方式
        if (Yii::$app->request->isPost) {
            #步骤2：接受数据
            $uname = Yii::$app->request->post('uname');
            $content = Yii::$app->request->post('content');
            #步骤3：插入数据
            $msg = new Msg;
            $msg->uname = $uname;
            $msg->content = $content;
            $msg->created_at =  $msg->updated_at = time();
            $rs = $msg->save();
            #步骤4：判断跳转
            return $this->redirect(['/msg']);
        }   
    }
}