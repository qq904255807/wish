<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>节点列表</title>
<link rel="stylesheet" href="/wish/Public/Admin/Css/node.css" />
<script type="text/javascript" src="/wish/Public/Admin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	$(function (){
		$('input[level=1]').click(function (){
			var inputs=$(this).parents('.app').find('input');
			$(this).attr('checked') ? inputs.attr('checked', 'checked') :
				inputs.removeAttr('checked');
		});
		
		$('input[level=2]').click(function (){
			var inputs=$(this).parents('dl').find('input');
			$(this).attr('checked') ? inputs.attr('checked', 'checked') :
				inputs.removeAttr('checked');
		});
	});
</script>

</head>
<body>
  <form action='<?php echo U("Admin/Rbac/setAccess");?>' method='post'>
	<div id='wrap'>
		<a href="<?php echo U('Admin/Rbac/role');?>" class='add-app'>返回</a>
		
		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class='app'>
				<p>
				<strong><?php echo ($app["title"]); ?></strong>
				<input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level='1'
				<?php if($app["access"]): ?>checked='checked'<?php endif; ?>/>
				</p>
					
					<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$controller): ?><dl>
							<dt>
								<strong><?php echo ($controller["title"]); ?></strong>
								<input type="checkbox" name="access[]" value="<?php echo ($controller["id"]); ?>_2" level='2'
								<?php if($controller["access"]): ?>checked='checked'<?php endif; ?>/>
								
							</dt>
							<?php if(is_array($controller["child"])): foreach($controller["child"] as $key=>$action): ?><dd>
									<span><?php echo ($action["title"]); ?></span>
									<input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_3" level='3'
									<?php if($action["access"]): ?>checked='checked'<?php endif; ?>/>
								</dd><?php endforeach; endif; ?>
						</dl><?php endforeach; endif; ?>
				</div><?php endforeach; endif; ?>
		</div>
		<input type='hidden' name='rid' value='<?php echo ($rid); ?>'>
		<input type='submit' value='提交' style='display:block;  margin:20px auto' />
	</form>
</body>
</html>