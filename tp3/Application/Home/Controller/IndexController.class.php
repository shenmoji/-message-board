<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$data = 122;
    	$data1 = ['name'=>1,'sex'=>'男'];
    	$data2 = [
    		['name'=>1,'sex'=>'男'],
    		['name'=>2,'sex'=>'男']
    	];
    	$this->assign("data",$data);
    	$this->assign("data1",$data1);
    	$this->assign("data2",$data2);
    	$this->display('index');
       
    }
    
}