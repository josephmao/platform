<?php 
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>中国一汽约你来找茬</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="http://oss-imgs.thinkpower.top/wechat/connect/css/main.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script>
			var _hmt = _hmt || [];
			(function() {
  				var hm = document.createElement("script");
  				hm.src = "//hm.baidu.com/hm.js?5746104a64acb9454b1c70fc97af822b";
  				var s = document.getElementsByTagName("script")[0]; 
  				s.parentNode.insertBefore(hm, s);
			})();
		</script>
</head>
<body>

	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

	<!-- 分享朋友圈遮罩层，点击后消失 -->
	<div class="share">
		<img src="http://oss-imgs.thinkpower.top/wechat/connect/images/share.png" alt="">
	</div>

	<div class="logo">
		<img src="http://oss-imgs.thinkpower.top/wechat/connect/images/logo.png" alt="">
	</div>

	<div class="container">
		<div class="rank-container">
			<img class="pick" src="http://oss-imgs.thinkpower.top/wechat/connect/images/pick.png" alt="">
			<hr class="nice-split">

			<div class="row about-me">
				<div class="col-xs-7 col-sm-7">
					<div class="media">
						<div class="media-left">
							<a href="#" class="avatar-link">
								<img alt="64x64" class="media-object" data-src="holder.js/64x64" style="width: 40px; height: 40px;" src="<?=$userInfo->headimgurl?>" data-holder-rendered="true"></a>
						</div>
						<div class="media-body">
							<h4 class="media-heading"><?=base64_decode($userInfo->nickname)?></h4>
							<span class="rank-about">第<?=$rank?>名</span>
						</div>
					</div>
				</div>

				<div class="col-xs-5 col-sm-3 rank-text">
					<span class=""><?=$score?></span>
				</div>
			</div>

			<hr class="nice-split">

			<a class="go" href="<?=Url::to(['play','identifier'=>$identifier])?>"><img src="http://oss-imgs.thinkpower.top/wechat/connect/images/go.png" alt=""></a>
			
			<hr class="nice-split">

			<ul id="rank-list-tab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#day-rank-panel" class="day-rank-tab" aria-controls="day-rank" role="tab" data-toggle="tab">日榜</a></li>
			  <li role="presentation"><a href="#total-rank-panel" class="total-rank-tab" aria-controls="total-rank" role="tab" data-toggle="tab">总榜</a></li>
			</ul>


			<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="day-rank-panel">
					<?php if(!empty($dateList)):?>
			    	<form class="">
			    		<div class="row">
			    			<div class="col-xs-2 no-pad"></div>
				    		<div class="col-xs-5 no-pad">
				    			<div class="form-group">
								
				    			  <select class="form-control" id="day-pick" placeholder="">
									  <?php foreach($dateList as $k => $v):?>
									   <?php if($k == $date)
									   			$select = ' selected="selected"';
											 else 
											 	$select = '';
									   ?>
				    			  		<option <?=$select?> value="<?=$k?>"><?=$v?></option>
				    			  	  <?php endforeach;?>
				    			  </select>
				    			</div>
				    		</div>
				    		<div class="col-xs-3 no-pad">
				    			<button type="button" class="btn btn-default check"></button>
				    		</div>
				    		<div class="col-xs-2 no-pad"></div>
			    		</div>
			    	</form>
					<?php endif;?>
					<?php if(!empty($dailyRank)):?>
			    	<ul class="rank-list list-unstyled">
						<?php $dailyOrder = 1;?>
						<?php foreach($dailyRank as $info => $score):?>
						<?php $user = json_decode($info,true);?>
			    		<li class="rank-item">
			    			<span class="index"><?=$dailyOrder?></span>
			    			<span class="avatar">
			    				<a href="#" class="avatar-link">
								<img alt="64x64" class="media-object" data-src="holder.js/64x64" style="width: 40px; height: 40px;" src="<?=$user['headimgurl']?>" data-holder-rendered="true"></a>
			    			</span>
			    			<span class="name"><?=$user['nickname']?></span>
			    			<span class="rank-text"><?=$score?></span>
			    		</li>
						<?php $dailyOrder++;?>
						<?php endforeach;?>
			    	</ul>
					<?php else:?>
						暂无数据
					<?php endif;?>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="total-rank-panel">
					<?php if(!empty($totalRank)):?>
			    	<ul class="rank-list list-unstyled">
						<?php $order = 1;?>
						<?php foreach($totalRank as $info => $score):?>
						<?php $user = json_decode($info,true);?>
			    		<li class="rank-item">
			    			<span class="index"><?=$order?></span>
			    			<span class="avatar">
			    				<a href="#" class="avatar-link">
								<img alt="64x64" class="media-object" data-src="holder.js/64x64" style="width: 40px; height: 40px;" src="<?=$user['headimgurl']?>" data-holder-rendered="true"></a>
			    			</span>
			    			<span class="name"><?=$user['nickname']?></span>
			    			<span class="rank-text"><?=$score?></span>
			    		</li>
						<?php $order++;?>
						<?php endforeach;?>
			    	</ul>
					<?php else:?>
					暂无数据
					<?php endif;?>
			    </div>
			  </div>
		</div>

		<h5>积分规则</h5>
                        <p>每局起始分为100分，每局游戏时间60秒，分数为满分100减耗费秒数（如：15秒完成游戏，分数则为100分-15秒=85分），参与但未完成者赠送鼓励分数10分；</p>
                        <p>积分榜得分：用户在颁奖前可以无限制参与游戏，每局的得分总和为积分榜得分（日榜和总榜）；</p>
                        <p>日榜积分时间为每日00:00至当日23:59，记录一天游戏的总积分；</p>
                        <p>总榜积分时间为2016年9月2日00:00 - 2016年9月11日23:59，记录所有时间的总积分；</p>

                        <h5>活动时间</h5>
                        <p>2016年9月2日00:00 - 2016年9月11日23:59</p>

                        <h5>奖品设置</h5>

                        <p>日榜前五名：获得中国一汽<span class="gift">汽车生活大礼包</span>一套；</p>
                        <p>总榜前三名：获得中国一汽<span class="gift">官方精美车模</span>一个；</p>

                        <h5>颁奖方式</h5>
                        <p>9月14日前，中国一汽工作人员将联系获奖人员；</p>
                        <p>成都地区：请您持身份证等有效证件至电话通知地点领奖；</p>
                        <p>非成都地区：我们会为您快递至电话通知地点；</p>
                        <br>
                        <p>在法律允许的范围内中国一汽保留对本活动的最终解释权。</p>

	</div>

	<script type="text/javascript">

		$(function(){
			if(navigator.userAgent.match(/MicroMessenger/i)){
				var weixinShareLogo = 'http://oss-imgs.thinkpower.top/wechat/connect/images/logox400.jpg';
				$('body').prepend('<div style=" overflow:hidden; width:0px; height:0; margin:0 auto; position:absolute; top:-800px;"><img src="'+ weixinShareLogo +'"></div>');
			}
		});
		
		$('#rank-list-tab a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});

		$('.check').click(function(e){
			var date = $("#day-pick").find("option:selected").val();
			window.location = '/wechat/connect/rank?date='+date;
		});

		$('.share').click(function(e){
			$(this).hide();
		});

	</script>
	<script type="text/javascript" src="http://tajs.qq.com/stats?sId=58268004" charset="UTF-8"></script>

</body>
</html>
