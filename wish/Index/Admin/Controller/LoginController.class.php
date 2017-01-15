<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class LoginController extends Controller {
    public function index(){
        $this->display();
     }
     
     
     public function Login(){
         if (!IS_POST) redirect(U('index'),'3','请先登录,3秒后跳转!');
         
          $code=I('code'); 
         if (!verify_check($code)){   
             $this->error('验证码错误!');
         }
         

         $username=I('username');
         $password=I('password','','md5');
         
         $user=M('user')->where(array(username=> $username))->find();
         
         if (!$user || $password != $user[password]){
             $this->error('用户名或密码错误!');
         }
         
         if ($user['locke']) $this->error('用户被锁定!');
         
            $data=array(
                'id' => $user['id'],
                'logintime' =>  time(),
                'loginip' => get_client_ip(),
            );
            M('user')->save($data);
            
            session(C('USER_AUTH_KEY'),$user['id']);
            session('username',$user['username']);
            session('logintime',date('Y-m-d H:i:s',$user['logintime']));
            session('loginip',$user['loginip']);
            
            if ($user['username'] == C('RBAC_SUPPERADMIN')){
                session(C('ADMIN_AUTH_KEY'),true);
            }
            
            
            $Rbac=new Rbac();
            $Rbac::saveAccessList();
            $this->redirect('Admin/Index/index');     
     }
     

     
     public function verify(){
     //清楚缓冲区数据,否则验证码可能生成不了.    
    ob_clean();
    $Verify = new \Think\Verify();  
    $Verify->fontSize = 18;  
    $Verify->length   = 4;  
    $Verify->useNoise = false;  
    $Verify->codeSet = '0123456789';  
    $Verify->imageW = 130;  
    $Verify->imageH = 50;  
    //$Verify->expire = 600;  
    $Verify->entry();
   
     }
}