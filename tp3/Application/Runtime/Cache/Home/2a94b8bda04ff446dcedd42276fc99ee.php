<?php if (!defined('THINK_PATH')) exit(); echo ($data); ?>
<br>
 <?php if($data1['sex'] == '男'): ?>强大
    <?php else: ?>
        相对弱小需要保护<?php endif; ?>
<hr />
<?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i; echo ($data2["sex"]); ?>:<?php echo ($data2["name"]); ?>
	<br/><?php endforeach; endif; else: echo "" ;endif; ?>