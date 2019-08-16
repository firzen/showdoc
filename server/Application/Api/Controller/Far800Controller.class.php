<?php
namespace Api\Controller;
use Think\Controller;
class Far800Controller extends BaseController {
    const OAURL='http://oa.far800.com';
	const APIKEY='doc-center';
    //登录
    public function login(){

        if (I('ticket')){
            $data=file_get_contents(self::OAURL.'/api/checkTicket?ticket='.I('ticket'));
            
            $data=json_decode($data,true);
			if ($data['code'] >0 || !is_array($data)){
                echo '验证失败','无法验证您的帐号，请重新登录.  http://oa.far800.com';
				exit;
			}else {
                //登录
                $ret=D("User")->where("( username='%s' ) ",$data['data']['username'])->find();
                if (!$ret){
                    // 新建用户
                    D("User")->add(array('username'=>$data['data']['username'],'name'=>$data['data']['name'] ,'password'=>'no password' , 'reg_time'=>time()));
                    $ret=D("User")->where("( username='%s' ) ",$data['data']['username'])->find();
                }
                
                unset($ret['password']);
                session("login_user" , $ret );
                D("User")->setLastTime($ret['uid']);
                $token = D("UserToken")->createToken($ret['uid']);
                cookie('cookie_token',$token,array('expire'=>60*60*24*90,'httponly'=>'httponly'));//此处由服务端控制token是否过期，所以cookies过期时间设置多久都无所谓
                
                header("Location: ../web/#/item/index");
			}
		}else {
			exit('Error');
        }
        exit;
        
    }
    
    public function api(){
        exit;
    }

}
