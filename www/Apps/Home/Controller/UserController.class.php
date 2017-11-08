<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class UserController extends CommonController {
    public function user(){
        $info = M('user')->where(['u_id'=>session('3146_uid')])->find();
        $this->assign('info',$info);
        $pr = C('DB_PREFIX');

        $type = isset($_GET['type']) ? $_GET['type'] : 1;
        if($type == 1){
            $goods = M('exchange')->join($pr.'goods a on '.$pr.'exchange.e_gid = a.g_id')->order('e_id desc')->where(['e_price'=>['neq',0],'e_uid'=>session('3146_uid')])->select();
        }elseif($type == 2){
            $goods = M('exchange')->join($pr.'goods a on '.$pr.'exchange.e_gid = a.g_id')->order('e_id desc')->where(['e_price'=>['eq',0],'e_uid'=>session('3146_uid')])->select();
        }else{
            $goods = M('weinner')->join($pr.'goods a on '.$pr.'weinner.gid = a.g_id')->order('id desc')->where(['uid'=>session('3146_uid')])->select();
        }

        $this->assign('goods',$goods);
        $this->display();
    }
 /*   public function my_goods(){

        $this->display();
    }*/
    public function goods_info(){
        if($_GET['type'] == 3){
            $data = M('weinner')->field('e_code,e_password,e_link,gid e_gid')->where(['id' => $_GET['eid']])->find();
        }else{
            $data = M('exchange')->where(['e_id' => $_GET['eid']])->find();
        }
        $info = M('goods')->where(['g_id'=>$data['e_gid']])->find();
        $this->assign('info',$info);
        $this->assign('data',$data);
        $this->display();
    }
    public function help(){
        $info = file_get_contents('help.txt');
        $this->assign('info',$info);
        $this->display();
    }
   /* public function use_goods(){
        $check = M('exchange')->where(['e_id'=>$_POST['eid']])->getField('e_uid');
        if($check != session('3146_uid')){
            $this->ajaxReturn(['msg'=>'非法操作!','res'=>-1,'data'=>false]);
        }
        $res = M('exchange')->where(['e_id'=>$_POST['eid']])->save(['e_use'=>1,'e_usetime'=>time()]);
        if(!$res){
            $this->ajaxReturn(['msg'=>'网络超时!','res'=>-1,'data'=>false]);
        }
        $this->ajaxReturn(['msg'=>'使用成功','res'=>1,'data'=>true]);
    }*/
}
