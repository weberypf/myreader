<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        div{ padding: 4px 48px;}
        body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px}
        h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; }
        p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}
    </style>
</head>
<body>
<div style="padding: 24px 48px;">
    <?php if(is_array($adminlist)): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["username"]); ?> : <?php echo ($vo["password"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>
</html>