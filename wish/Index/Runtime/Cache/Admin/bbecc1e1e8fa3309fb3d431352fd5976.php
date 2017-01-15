<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>Rbac</title>
<link rel='stylesheet' href='/wish/Public/Admin/Css/public.css'>
</head>
<body>
<form action="<?php echo U('Admin/Rbac/addRolehandle');?>" method='post'>
	<table class="table">
		<tr>
			<th colspan='2' align="center">添加角色</th>
		</tr>
		<tr>
			<td align="right">角色名：</td>
			<td><input type='text' name='name'></td>
		</tr>
		
		<tr>
			<td align="right">角色描述：</td>
			<td><input type='text' name='remark'></td>
		</tr>
		
		<tr>
			<td align="right">是否开启：</td>
			<td>
			<input type='radio' name='status' value='1' checked="checked"/>&nbsp;开启&nbsp;
			<input type='radio' name='status' value='0'/>&nbsp;关闭&nbsp;
			</td>
		</tr>
		
		<tr>
			<td colspan='2' align='center'>
			 <input type='submit'  value='提交'>
			</td>
		</tr>
		
	</table>
</form>
</body>
</html>