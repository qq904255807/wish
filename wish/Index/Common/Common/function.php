<?php 
  
function p($array){
        dump($array,true,'<pre>',0);
    }
    //替换表情函数
    function replace_phiz ($content){
        //preg_match_all以正则表达式'/\[.*?\]/is'，匹配$content，返回$arr。
        preg_match_all('/\[.*?\]/is',$content,$arr);
        
        if ($arr[0]) {
            //查询phiz.php生成数组 $arr的内容是[表情汉字]，$phiz数组的值只有汉字。
            $phiz=F('phiz','','./Data/');
            foreach($arr[0] as $v){
                foreach($phiz as $key=>$value){
                    if ($v=='['.$value.']') {
                        $content=str_replace($v,
                        '<img src="'.__ROOT__.'/Public/Home/Images/phiz/'.$key.'.gif"/>',$content);
                        break;
                    }
                }
            }
        }
        return $content;
    }
    
    function verify_check($code){
        $verify = new \Think\Verify();
        return $verify->check($code);
        }

        
    function getpage($count, $pagesize) {
        $p = new Think\Page($count, $pagesize);
        $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '末页');
        $p->setConfig('first', '首页');
        $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
} 

?>