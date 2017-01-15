<?php
return array(
     'RBAC_SUPPERADMIN' =>'admin', //制定超级管理员
     'ADMIN_AUTH_KEY' =>'superadmin',
     'USER_AUTH_ON' =>'true',// 是否需要认证
     'USER_AUTH_TYPE' =>'1', //认证类型
     'USER_AUTH_KEY' =>'uid', //认证识别号
     
     'NOT_AUTH_MODULE'  =>'Index',//无需认证模块
     'NOT_AUTH_ACTION'  =>'addUserhandle,addRolehandle,addNodehandle,setAccess', //无需认证的方法
     'RBAC_ROLE_TABLE' =>'hd_role', //角色表名称
     'RBAC_USER_TABLE' =>'hd_role_user', //用户表名称
     'RBAC_ACCESS_TABLE'  =>'hd_access', //权限表名称
     'RBAC_NODE_TABLE'  =>'hd_node', //节点表名称
    
	     'TMPL_PARSE_STRING'=>array(
         '__PUBLIC__' => __ROOT__.'/Public/Admin',
     ),
    
);