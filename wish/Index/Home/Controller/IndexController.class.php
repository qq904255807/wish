<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function Index(){
      $this->assign('wish', M('wish')->select())->display();
       

    }
    
    public function  handle(){
        
       
       if (!IS_AJAX)
       redirect(U('index') ,2 ,'正在跳转，请稍候......' );
        
      $data=array(
           'username' => I('username'),
           'content' => I('content'),
           'time' => time(),
       );
     
       // M('wish')链接到数据库wish表，  data($data)创建数据对象，也可以用create， add()添加方法。
      if (M('wish')->data($data)->add()){
          $data['id']= $id;
          $data['content']=replace_phiz($data['content']);
          $data['statues']=1;
          $data['time']=date('y-m-d H:i', $data['time']);
          $this->ajaxReturn($data,'json');
      }else {
          $this->ajaxReturn(array('statues'=>0),'json');
      } 
     
    }      
}
?>