<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>添加节点</title>
<link rel='stylesheet' href='/wish/Public/Admin/Css/public.css'>
</head>
<body>
  <form action="<?php echo U('Admin/Rbac/addNodehandle');?>" method="post">
  		<table class='table'>
  			<tr>
  				<th colspan='2'>添加节点</th>
  			</tr>
  			
  			<tr>
  				<td align="right"><?php echo ($type); ?>名称：</td>
  				<td><input type='text' name='name' value=<?php echo ($name); ?>></td>
  			</tr>
  			
  			<tr>
  				<td align="right"><?php echo ($type); ?>描述：</td>
  				<td><input type='text' name='title' value=<?php echo ($title); ?>></td>
  			</tr>
  			
	  		<tr>
				<td align="right">是否开启：</td>
				<td>
				<input type='radio' name='status' value='1' checked="checked"/>&nbsp;开启&nbsp;
				<input type='radio' name='status' value='0'/>&nbsp;关闭&nbsp;
				</td>
			</tr>
			
			<tr>
  				<td align="right">排序：</td>
  				<td><input type='text' name='sort' value='1'></td>
  			</tr>
  			
  			<tr>
  				<td colspan='2' align='center'>
  					<input type="hidden" value='<?php echo ($pid); ?>' name='pid'>
  					<input type="hidden" value='<?php echo ($level); ?>' name='level'>
  					<input type="submit" value='提交'>
  				</td>
  			</tr>
  		</table>
  </form>
</body>
</html>