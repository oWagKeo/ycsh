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
            $goods = M('exchange')->join($pr.'goods a on '.$pr.'exchange.e_gid = a.g_id')->order('e_id desc')->where(['e_uid'=>session('3146_uid')])->select();
        }else{
            $goods = M('weinner as a')->field('a.e_link,a.id,b.awardname,b.awardthum3,b.desc')
                    ->join($pr.'award as b on a.awardid = b.id')->order('a.id desc')->where(['a.uId'=>session('3146_uid')])->select();
//            print_r($goods);die();
        }

        $this->assign('goods',$goods);
        $this->display();
    }
 /*   public function my_goods(){

        $this->display();
    }*/
    public function goods_info(){
        $data = M('exchange')->where(['e_id' => $_GET['eid']])->find();
        $info = M('goods')->where(['g_id'=>$data['e_gid']])->find();
        $this->assign('info',$info);
        $this->assign('data',$data);
        $this->display();
    }

    public function award_info(){
        $data = M('weinner')->field('e_code,e_password,e_link,awardid')->where(['id' => $_GET['id']])->find();
        $info = M('award')->where(['id'=>$data['awardid']])->find();
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
