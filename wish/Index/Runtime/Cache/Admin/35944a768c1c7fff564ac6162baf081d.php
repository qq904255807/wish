<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel='stylesheet' href='/wish/Public/Admin/Css/public.css'>
<script type="text/javascript" src="/wish/Public/Admin/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.add-role').click(function(){
			var obj=$(this).parents('tr').clone();
			obj.find('.add-role').remove();
			$('#last').before(obj);
		});
	});
</script>
<title>添加用户</title>
</head>
<body>
	<form action='<?php echo U("Admin/Rbac/addUserhandle");?>' method='post'>
	<table class='table'>
		<tr>
			<th colspan='2'>
				添加用户
			</th>
		</tr>
		
		<tr>
			<td align='right' width='40%'>用户名：</td>
			<td><input type='text' name='username'></td>
		</tr>
		
		<tr>
			<td align='right'>密码：</td>
			<td><input type='text' name='password'></td>
		</tr>
		
		<tr>
			<td align='right'>所属角色：</td>
			<td>
				<select name='role_id[]'>
					<option>请选择角色</option>
					<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value='<?php echo ($v["id"]); ?>'><?php echo ($v["name"]); ?>(<?php echo ($v["remark"]); ?>)</option><?php endforeach; endif; ?>
				</select>
				<span class='add-role'>添加一个角色</span>
			</td>
		</tr>
		
		<tr id='last'>
			<td colspan='2' align='center'>
				<input type='submit' value='保存添加'>
			</td>
		</tr>
		
	</table>
	</form>
</body>
</html>