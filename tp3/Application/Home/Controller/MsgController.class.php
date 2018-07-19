<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index()
    { 
        $msgs = M('msg');
        $list = $msgs->select();

        $this->assign("list",$list);
    	$this->display('index');
       
    }
    public function add()
    { 
        if(IS_POST){
            $post['uname'] = I('post.uname');
            $post['content'] = I('post.content');
            $post['created_at'] = $post['updated_at'] = time();
            $rs = M('msg')->add($post);
            if($rs){
                $this->success("添加成功",U("msg/index"));
            }else{
                $this->error("添加失败");
            }
        }

    }
    public function seo()
    {

       if(IS_POST){
           //接收参数
           $time1 = I('post.time1');
           $time2 = I('post.time2');
           //将时间格式转为时间戳
           if(!empty($time1) || !empty($time2)){
               $time1 = strtotime($time1);
               $time2 = strtotime($time2);
           }else{
               //如果没有值或没有选则默认查询所有
               $time1 = 0;
               $time2 = 2147443200;
           }
           $msg = M('msg');
           $rs = $msg->where("created_at+1>{$time1} and created_at-1<{$time2} ")->select();
           if($rs){
                // $ajx = json_decode($rs);
               $this->ajaxReturn($rs);
           }else{
               die();
           }
       }
    }
    
}