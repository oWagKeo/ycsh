<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");

/**
 * Class IndexController
 * @package Home\Controller
 * 程序首页
 */
class IndexController extends CommonController {
	/**
	 * 首页信息
	 */
	public function index(){
		$map = [
			'g_start' => ['elt',time()],
			'g_end' => ['gt',time()],
			'g_show' => 1,
		];
		$info = M('goods')->where($map)->limit('0,50')->select();
		$this->assign('info',$info);
		$this->display();
	}

	/**
	 * 分类信息奖券列表
	 */
	public function goods_list(){
		$map = [
			'g_start' => ['elt',time()],
			'g_end' => ['gt',time()],
			'g_show' => 1,
		];

		if( $_GET['type'] ){
			$map['g_type'] = $_GET['type'];
		}

	    $info = M('goods')->where($map)->limit('0,50')->select();
		$this->assign('info',$info);
		$this->assign('mark','list');
		$this->display('list');
	}
	/**
	 * 搜索
	 */
	public function search(){
		$map = [
			'g_start' => ['elt',time()],
			'g_end' => ['gt',time()],
			'g_show' => 1,
		];
		$map['g_name'] = ['exp','like "%'.$_GET['name'].'%"'];
		$info = M('goods')->where($map)->limit('0,50')->select();
		$this->assign('mark','search');
		$this->assign('info',$info);
		$this->display('list');
	}
	/**
	 * ajax请求
	 * 按分类返回劵信息
	 */
	public function get_goods(){
		$top = isset($_POST['top']) ? $_POST['top'] : 0;
		$num = isset($_POST['num']) ? $_POST['num'] : 50;
		$map = [
			'g_start' => ['elt',time()],
			'g_end' => ['gt',time()],
			'g_show' => 1,
		];
		if($_POST['type'] != 0){
			if($_POST['type'] == 'free'){
				$map['g_free'] = ['neq',0];
			}else{
				$map['g_type'] = $_GET['type'];
			}
		}

		$info = M('goods')->where($map)->limit($top.','.$num)->select();
		$this->ajaxReturn(['msg'=>'请求成功','res'=>1,'data'=>$info]);
	}
	/**
	 * 获取优惠劵详情
	 */
	public function info(){

		$info = M('goods')->where(['g_id' => $_GET['gid']])->find();

		$this->assign('info',$info);
		$this->display('details');
	}
	/**
	 * ajax请求
	 * 兑换劵
	 */
	public function buy(){
		//读取用户积分
		$uid = session('3146_uid');

		if( !$uid ){
			$this->redirect('Logreg/register');
		}
		$user = M('user')->where(['u_id' => $uid])->find();
		//读取劵价格
		$goods = M('goods')->where(['g_id' => $_POST['gid']])->find();

		if($goods['g_claim'] != -1){
			//计算已经兑换的数量
			$exchange = M('exchange')->where(['e_uid'=>$uid,'e_gid'=>$goods['g_id']])->count('e_id');
			$lottery = M('weinner')->where(['uId'=>$uid,'gid'=>$goods['g_id']])->count('id');
			if($exchange + $lottery + $_POST['num'] > $goods['g_claim']){
				$this->ajaxReturn(['msg'=>'该劵最多只能兑奖'.$goods['g_claim'].'张哦!','res'=>7,'data'=>false]);
			}
		}

		if($_POST['num'] <= 0){
			$this->ajaxReturn(['msg'=>'最少兑换一张劵哟!','res'=>5,'data'=>false]);
		}
		if($goods['g_start'] > time() || $goods['g_end'] < time()){
			$this->ajaxReturn(['msg'=>'该劵已经下架啦!','res'=>4,'data'=>false]);
		}

		$mark = 'g_count';
		$price = $goods['g_price'];
		if($goods['g_count'] < $_POST['num']){
			$this->ajaxReturn(['msg'=>'优惠劵已经抢光啦!','res'=>3,'data'=>false]);
		}

		$ma = 1;
		//扣除劵库存
		$res = M('goods')->where(['g_id' => $_POST['gid']])->setDec($mark,$_POST['num']);
		if(!$res){
			$this->ajaxReturn(['msg'=>'网络超时!','res'=>-1,'data'=>false]);
		}
		//写入记录
		//拉取劵的详细信息
		$grab = A('Admin/Api','Event');
		for($i = 0;$i<$_POST['num'];$i++){
			$code = $grab->getCouponCode($goods['g_couponid']);
			if(!$code){
				$this->ajaxReturn(['msg'=>'劵不足!','res'=>3,'data'=>false]);
			}
			$data[$i] = [
				'e_uid' => $uid,
				'e_gid' => $_POST['gid'],
				'e_price' => $price,
				'e_use' => 0,
				'e_create' => time(),
				'e_usetime' => 0,
				'e_password' => $code['password'],
				'e_link' => $code['link'],
				'e_code' => $code['code'],
			];
		}
		$res = M('exchange')->addAll($data);

		if(!$res){
			$this->ajaxReturn(['msg'=>'网络超时!','res'=>-1,'data'=>false]);
		}
		$this->ajaxReturn(['msg'=>'兑换成功','res'=>1,'data'=>true,'ma'=>$ma]);
	}
	public function award(){
		$user = M('user')->where(['u_id'=>session('3146_uid')])->find();
		$this->assign('user',$user);
		$this->display();
	}
	public function lottery(){
		$uid = session('3146_uid');
		$user = M('user')->where('u_id = '.$uid)->find();
		if($user['u_lottery'] <= 0){
			$this->ajaxReturn(['msg'=>'没有抽奖机会啦!','res'=>1,'data'=>false]);
		}
		M('user')->where('u_id = '.$uid)->setDec('u_lottery');
		//抽奖
		M('log')->add(['l_gId'=>3146,'l_uId'=>$uid,'eventId'=>99,'l_updated'=>time()]);
		$lotteryConfig = M('lottery')->find();
		$lc = json_decode($lotteryConfig['lottery'],true);
		$rand = rand(1,10000);
		if($rand > end($lc)['max']){
			$this->ajaxReturn(['msg'=>'未中奖!','res'=>1,'data'=>true,'awardid'=>0]);
		}
		foreach($lc as $k => $v){
			if($rand > $v['min'] && $rand <= $v['max']){
				$map['awardid'] = $v['a'];
				break;
			}
		}
		$map['got'] = 0;
		$award = M('award')->where($map)->order('id asc')->find();

		if(!$award){
			$this->ajaxReturn(['msg'=>'未中奖!','res'=>1,'data'=>true,'awardid'=>0]);
		}

		$goods = M('goods')->where(['g_id' => $award['gid']])->find();
		if($goods['g_claim'] != -1){
			//计算已经兑换的数量
			$exchange = M('exchange')->where(['e_uid'=>$uid,'e_gid'=>$goods['g_id']])->count('e_id');
			$lottery = M('weinner')->where(['uId'=>$uid,'gid'=>$goods['g_id']])->count('id');
			if($exchange + $lottery >= $goods['g_claim']){
				$this->ajaxReturn(['msg'=>'未中奖!','res'=>1,'data'=>true,'awardid'=>0]);
			}
		}
		M('award')->where(['id'=>$award['id']])->save(['got'=>1]);
		$grab = A('Admin/Api','Event');
		$code = $grab->getCouponCode($goods['g_couponid']);
		if(!$code){
			$this->ajaxReturn(['msg'=>'未中奖!','res'=>1,'data'=>true,'awardid'=>0]);
		}
		$data = [
			'uId' => $uid,
			'awardid' => $award['awardid'],
			'awardname' => $award['awardname'],
			'got' => 0,
			'onlyKey' => $award['onlykey'],
			'updated' => time(),
			'gid' => $award['gid'],
			'e_password' => $code['password'],
			'e_link' => $code['link'],
			'e_code' => $code['code'],
		];
		$res = M('weinner')->add($data);
		if($res){
			$this->ajaxReturn(['msg'=>'恭喜!','res'=>1,'data'=>true,'desc'=>$goods['g_desc'],'awardid'=>$award['awardid'],'awardname'=>$award['awardname']]);
		}else{
			$this->ajaxReturn(['msg'=>'未中奖!','res'=>1,'data'=>true,'awardid'=>0]);
		}
	}
}