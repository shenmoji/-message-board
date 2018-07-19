<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="telephone=no, address=no" name="format-detection">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <title>微留言演示案例</title>
    <link rel="stylesheet" type="text/css" href="/Public/message./msg.css" media="all" />
	<script language="javascript" type="text/javascript" src="/Public/My97DatePicker/WdatePicker.js"></script>
</head>
<body id="message" onselectstart="return true;" ondragstart="return false;">
	<div class="container">
	  	<div class="qiandaobanner">
		  	<a href="/Public/message">
		  		<img src="/Public/message/wall.jpg" style="width:100%;" />
		  	</a>
	  	</div>
		<div class="cardexplain">
			<div class="window" id="windowcenter">
				<div id="title" class="wtitle">操作提示<span class="close" id="alertclose"></span></div>
				<div class="content">
					<div id="txt"></div>
				</div>
			</div>
			<input type="text" class="time1" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})">
			<input type="text" class="time2" onClick="WdatePicker({el:this,dateFmt:'yyyy-MM-dd HH:mm:ss'})">
			<a href="javascript:;" id="java">搜索</a>
  			<div class="history">
				<div class="history-date">
					<ul>
						<a><h2 class="first first1" style="position: relative;">点击留言</h2></a>
						<li class="nob  mb">
							<div class="beizhu">留言审核通过后才会显示在留言墙上！</div>
						</li>
<div id="content_mes">
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="green bounceInDown javasec" >
							<h3>
								<img src='/Public/message/logo100x100.jpg'> 
								<?php echo ($list["uname"]); ?>
								
								<span><?php echo date('Y-m-d',$list['created_at']);?></span>
								<div class="clr"></div>
							</h3>
							<dl>
								<dt class="hfinfo"><?php echo ($list["content"]); ?></dt>
							</dl>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
						<li class="green bounceInDown nob ly2" style="display:none;">
							<form action="<?php echo U('msg/add');?>" method="post" class="form1">
							<dl>
								<dt>
									<input name="uname" type="text" class="px" id="uname" value="" placeholder="请输入您的昵称">
									</dt>
								<dt>
									<textarea name="content" class="pxtextarea" style=" height:60px;" id="content" placeholder="请输入留言内容"></textarea>
								</dt>
								<dt>
									<a class="submit" href="javascript:void(0);">提交留言</a>
								</dt>
							</dl>
							</form>
						</li>
						<a><h2 class="first first2" style="position: relative;">点击留言</h2></a>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/Public/message/jquery.js"></script>
	<script type="text/javascript"> 
		$(function(){
			//留言表单显示切换
			$(".first1").click(function(){
				$(".ly1").slideToggle();
			});
			$(".first2").click(function(){
				$(".ly2").slideToggle();
			});

			//点击提交留言a标签，则提交表单
			$('.submit').click(function(){
				//判断用户名和密码不能为空
				var uname = $('#uname').val();
				var content = $('#content').val();
				if (uname == '' || content == '') {
					alert('请输入昵称或留言内容');
					return;
				}
				//提交表单
				$('.form1').submit();
			});
		});
	</script> 
</body>
<script>
	// $("#java").click(function(){
 //        var time1 = $(".time1").val();
 //        var time2 = $(".time2").val();
 //        $.get("<?php echo U('msg/seo');?>",{"time1":time1,"time2":time2},function(json){
 //            console(json);
	// 		if(json.status == 200){
 //                alert(1);
	// 		}else{
	// 		    alert("未找到相关记录");
	// 		}
	// 	},'json');
	// });
</script>
<script>
  
         $("#java").click(function(){
            $.ajax({
                type: "post",
                url:"<?php echo U('msg/seo');?>",
                data: {
                    time1:  $(".time1").val(),
                    time2:  $(".time2").val()
                },
                dataType:'json',
                beforeSend:function(msgs){
                	alert("搜索成功!");
                },
                success:function(msgs){
                	
                	console.log(msgs);
					// var json = [
					//     {"id":"1","tagName":"apple"},
					//     {"id":"2","tagName":"orange"},
					//     {"id":"3","tagName":"banana"},
					//     {"id":"4","tagName":"watermelon"},
					//     {"id":"5","tagName":"pineapple"}
					// ];
					//  申明变量
 						var id = '';
 						var uname = '';
 						var content = '';
 						var created_at = '';
 						var updated_at = '';
 						//循环拼接数据,并在每个数据后面加上/  --  xx/xx/
						$.each(msgs, function(idx, obj) {
						     id+= obj.id+"/";
						     uname+= obj.uname+"/";
						     content+= obj.content+"/";
						     created_at+= obj.created_at+"/";
						     updated_at+= obj.updated_at+"/";
						});
							console.log(id);
							//将上面拼接好的字符串转为数组
						    var aid = id.split("/"); 
						    var acontent = content.split("/"); 
						    var auname = uname.split("/"); 
						    var acreated_at = created_at.split("/"); 
						    var aupdated_at = updated_at.split("/"); 
						    //去除数组中最后一个/
						    aid.pop(); 
						    auname.pop(); 
						    acontent.pop(); 
						    acreated_at.pop(); 
						    aupdated_at.pop(); 
						    console.log(aid);
						    console.log(auname);
						    //var arr = new Array(
						   	//	[aid],[auname],[acontent],[acreated_at],[aupdated_at]
						   //	);
						   //	console.log(arr);
						   //	开始拼接内容
					var content_as = '';
					for(var i = 0,l=aid.length-1;i<l;i++){
						content_as += "<li class='green bounceInDown ' ><h3><img src='/Public/message/logo100x100.jpg'> "+auname[i]+"<span style='background-color: yellow'>"+timestampToTime(acreated_at[i])+"</span><div class='clr'></div></h3><dl><dt class='hfinfo'>"+acontent[i]+"</dt></dl></li>";
					} 
						//将拼接好的内容传给上面的div
					$("#content_mes").html(content_as);	 
					//完成...  	
                },
                complete:function(msgs){
                	
                	alert(1);
                },
               
            });
            return false;
        });
  
         //将时间戳转为时间
  function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        Y = date.getFullYear() + '-';
        M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        D = date.getDate() + ' ';
        h = date.getHours() + ':';
        m = date.getMinutes() + ':';
        s = date.getSeconds();
        return Y+M+D+h+m+s;
    }
</script>
</html>