<?php
namespace Admin\Controller;
use Think\Controller;

class RbacController extends CommonController{
    
    //用户列表
    public function index(){
        $data=$this->user=D('UserRelation')->field('password',true)->relation(true)->select();
        $this->display();
    }
    //角色列表
    public function role(){
        $role=M('role')->select();
        $this->assign('role',$role)->display();
    }
    
    //节点列表
    public function node() {
        $m=M('node');
       $field=array('id','name','title','pid');
       $node=$m->field($field)->order('sort')->select();
     // p($node);
      
     
     
      $node=node_merge($node);
   // p($node); die();
       $this->assign('node',$node)->display();
      
    }
    //添加用户
    public function addUser(){
        $this->role=M('role')->select();
        $this->display();
    }
    
    //添加用户实现
    public function addUserhandle(){
        $user=array(
            'username'=>I('username'),
            'password'=>I('password','','md5'),
            'logintime'=>time(),
            'loginip'=>get_client_ip(),
        );
       //p($user);die();
        $role=array();
        
        $uid=M('user')->add($user);
       
        if ($uid){
           // p($_POST);die();
            foreach ($_POST['role_id'] as $v){
                $role[]=array(
                    'role_id' => $v,
                    'user_id' => $uid,
                );
            }
           
            M('role_user')->addAll($role);
            
            $this->success('添加成功！',U('Admin/Rbac/index'));
        }else {
            $this->error('添加失败！');
        }
    }
    
    //添加角色
    public function addRole(){
        $this->display();
    }
    
    //添加角色操作
    public  function addRolehandle(){
        if (M('role')->add($_POST)){
            $this->success('添加成功！',U('Admin/Rbac/role'));
        }else {
            $this->error('添加失败！');
        }
    }
    
    //添加节点 
    public function addNode() {
        
       $this->pid=I('pid',0,'intval');
       $this->level=I('level',1,'intval');
       $this->name=I('name');
       $this->title=I('title');
       
       switch ($this->level){
           case 1:
               $this->type='应用';
               break;
               
            case 2:
                $this->type='控制器';
                break;
                
            case 3:
                $this->type='动作方法';
                break;    
       }
        $this->display();
    }
    
    public function addNodehandle(){
        if (M('node')->add($_POST)){
            $this->success('添加成功！',U('Admin/Rbac/node'));
        }else {
            $this->error('添加失败！');
        }
    }
    
    //删除节点
    
    public function deleteNode(){
        $id=I('pid');
        if (M('node')->delete($id)){
            $this->success('删除成功！',U('Admin/Rbac/node'));
        }else 
        {
            $this->error('删除失败！');
        }
    }
    
    public function access(){
        $rid=I('rid',0,'intval');
        
        $field=array('id','name','title','pid');
        $node=M('node')->order('sort')->field($field)->select();
        $access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
        
        $this->node=node_merge($node,$access);
       $this->rid=$rid;
       $this->display();    
    }
    
    public function setAccess(){
       
        $rid=I('rid',0,'intval');
        $db=M('access');
        $db->where(array('role_id'=>$rid))->delete();
        
        $data=array();
        foreach ($_POST[access] as $v){
            $tmp=explode('_', $v);
            $data[]=array(
              'role_id' => $rid,
              'node_id' => $tmp[0],
              'level' => $tmp[1],
            );
        }
        if ($db->addAll($data)){
            $this->success('修改成功',U('Admin/Rbac/role'));
        }else {
            $this->error('修改失败！');
        }
        
    }
    
}








