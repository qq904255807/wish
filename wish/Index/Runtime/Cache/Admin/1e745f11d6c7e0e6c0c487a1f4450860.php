<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>查看所有帖子！</title>
<link rel='stylesheet' href='/wish/Public/Admin/Css/public.css'>
</head>
<body>
<table class='table1' border='1'>
<tr>
		<th>id</th>
		<th>用户</th>
		<th>内容</th>
		<th>发布时间</th>
		<th>操作</th>
</tr>
	<?php if(is_array($wish)): foreach($wish as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["username"]); ?></td>
			<td><?php echo (replace_phiz($v["content"])); ?></td>
			<td><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
			<td>
			<a href="<?php echo U('Admin/MsgManag/delete',array('id'=>$v['id']));?>">删除</a>
			</td>
		</tr><?php endforeach; endif; ?>
	<tr>
	<td colspan='5' align='center'>
	<div class='page'>
	<?php echo ($page); ?>
	</div>
	</td>
	</tr>
</table>
</body>
</html>