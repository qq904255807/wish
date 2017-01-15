<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户列表</title>
<link rel='stylesheet' href='/wish/Public/Admin/Css/public.css'>
</head>
<body>
<table class='table'>
	<tr>
		<th>ID</th>
		<th>用户名</th>
		<th>上次登录时间</th>
		<th>上次登录IP</th>
		<th>锁定状态</th>
		<th>用户所属组别</th>
		<th>操作</th>
	</tr>
	
	<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["username"]); ?></td>
		<td><?php echo (date('Y-m-d H:i',$v["logintime"])); ?></td>
		<td><?php echo ($v["loginip"]); ?></td>
		<td>
			<?php if($v[locke]): ?>锁定<?php else: ?>未锁定<?php endif; ?>
		</td>
		<td>
			<?php if(C("RBAC_SUPPERADMIN") == $v["username"]): ?>超级管理员<?php else: ?>
			<ul>
				<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$value): ?><li><?php echo ($value["name"]); ?>(<?php echo ($value["remark"]); ?>)</li><?php endforeach; endif; ?>			
			</ul><?php endif; ?>
		</td>
		<td><a href="">锁定</a></td>
	</tr><?php endforeach; endif; ?>
</table>
</body>
</html>