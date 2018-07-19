<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msg extends CI_Controller 
{
	//列表
	public function index()
	{
		#1.获取数据
		$this->load->model('MsgModel');
		$msgs = $this->MsgModel->all();
		#2.加载视图并传递数据
		$this->load->view('msg/index', compact('msgs'));
	}

	//添加
	public function add()
	{
		#1.判断提交方式
		if (IS_POST) {
			#2.接受数据
			$uname = $this->input->post('uname');
			$content = $this->input->post('content');
			#3.插入数据库
			$this->load->model('MsgModel');
			$rs = $this->MsgModel->add([
				'uname' => $uname,
				'content' => $content,
				'created_at' => time(),
			]);
			#4.判断跳转
			if ($rs) {
				echo "<script>alert('插入成功'); location.href='".site_url('msg/index')."';</script>";
			} else {
				echo "<script>alert('插入失败'); location.href='".site_url('msg/index')."';</script>";
			}
		}
	}
}