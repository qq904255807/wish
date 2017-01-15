<?php
namespace Admin\Controller;
use Think\Controller;
class MsgManagController extends CommonController{
    public function Index() {
                
        $count      = M('wish')->count();// 查询满足要求的总记录数
        $Page       = getpage($count, 4);// 实例化分页类 
        $limit=$Page->firstRow. ',' .$Page->listRows;
        
        $wish=M('wish')->order('time DESC')->limit($limit)->select();
        
        $this->assign('wish',$wish);// 赋值数据集
        $this->assign('page',$Page->show());// 赋值分页输出
/*      $this->page=$Page->show();
        $this->wish=$wish;  等价于上面两句*/
        $this->display();
    }
    
    public function delete() {
        $id=I('id','','intval');
        if (M('wish')->delete($id)){
            $this->success('删除成功！',U('Admin/MsgManag/Index'));
        }else {
            $this->error('删除失败');
        }
        
    }
}