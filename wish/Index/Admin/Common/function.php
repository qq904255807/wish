<?php

/**
 * 
 */

function node_merge($node,$access=null,$id=0){
    $arr=array();
    
    foreach ($node as $v){
/*         if (is_array($access)){
            $v['access']=in_array($v['id'], $access) ? 1:0;
            } */
        
        if ($v['pid']==$id){
            $v['child'] = node_merge($node,$access,$v['id']);
            $arr[]=$v;
        }
    }
    return $arr;
}


?>