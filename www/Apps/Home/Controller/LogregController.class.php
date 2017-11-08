<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
include('D:\ptdata2945\libs\wx_class_4_client.php');
class LogregController extends Controller {
	public function _initialize(){
		$wx = new \WX_LC('_3146','wx91660942fa7be4c2');
		$wx_config=json_encode($wx->getSharedConfig());
		$this->assign('wx_config',"var wx_config=$wx_config;");
	}
	public function verification(){
		ob_clean();
		$Verify = new \Think\Verify();
		$Verify->fontSize = 18;
		$Verify->length   = 4;
		$Verify->useImgBg  = false;
		$Verify->useNoise = true;
		$Verify->codeSet = '1234567890';
		$Verify->imageW = 154;
		$Verify->imageH = 40;
		$Verify->expire = 600;
		$Verify->entry();
	}
	 public function tips(){
         $this->display("tipsPage");
     }

	public function register(){
		$this->display();
	}
	public function get_code(){
		$code = str_pad(rand(0,999999),6,0);
		session('3146_msg_code',$code);
		session('3146_msg_time',time()+5*60);
		M('log')->add(['l_type'=>2,'l_event'=>1,'l_uId'=>session('3146_uid'),'l_value'=>$code,'l_updated'=>time()]);
		$this->ajaxReturn(['msg'=>$code,'res'=>1,'data'=>true]);
	}
	public function register_save(){
		if($_POST['card'] == '' || $_POST['user'] == '' || $_POST['phone'] == ''){
			$this->ajaxReturn(['msg'=>'请填写必要信息!','res'=>101,'data'=>false]);
		}
		//验证短信
		if(session('3146_msg_code') != $_POST['code'] || session('3146_msg_time') < time()){
			$this->ajaxReturn(['msg'=>'验证码超时或错误!','res'=>3,'data'=>false]);
		}
		//验证唯一
		$map = [
			'u_cardno' => $_POST['card'],
			'_logic' => 'or',
			'u_phone' => $_POST['phone']
		];
		$check = M('user')->where($map)->find();
		if($check){
			$this->ajaxReturn(['msg'=>'重复的银行卡或电话!','res'=>2,'data'=>false]);
		}
		$res = M('user')->where(['u_id'=>session('3146_uid')])->save(['u_cardno'=>$_POST['card'],'u_name'=>$_POST['user'],'u_phone'=>$_POST['phone'],]);
		if(!$res){
			$this->ajaxReturn(['msg'=>'网络超时!','res'=>-1,'data'=>false]);
		}
		$this->ajaxReturn(['msg'=>'注册成功','res'=>1,'data'=>true]);
	}
	public function logout(){
	    session('3146_uid',null);
	}
}