<?php
namespace frontend\controllers;

use Yii;
use frontend\models\T1;
use yii\web\Controller;

class TestController extends Controller
{
    //创建的index方法（注：每个方法必须假action前缀）
    public function actionIndex()
    {
       #步骤1：查询所有：
        $t1s = T1::find()->all();
        #步骤2：遍历输出
        foreach ($t1s as $t1) {
            echo $t1->id . '__' . $t1->uname . '<br />';
        }
        echo '<pre>';
        print_r($t1s);
        die();
              
        // echo 123;
    }
public $layout = false;
    //创建的add方法（注：每个方法必须假action前缀）
    public function actionAdd()
    {
        
        $arr = 'dawda';
         return $this->render('index',[
            'arr' => $arr
         ]);
    }
}