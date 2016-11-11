<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
	<body huaban_collector_injected="true">

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

		<div class="logo">
 			<img src="http://oss-imgs.thinkpower.top/wechat/connect/images/logo.png" alt="">
 		</div>
 		
		<div class="container">
			<div class="register-container">
				<img class="pick" src="http://oss-imgs.thinkpower.top/wechat/connect/images/pick.png" alt="">
				<hr class="nice-split">
				<p class="info">请准确输入您的基本信息，便于及时收到我们的颁奖通知</p>
				<hr class="nice-split">
				<?php  $form = ActiveForm::begin([
        					'options' => ['class' => 'form-horizontal regist-form','role' => 'form'],
    					]); ?>

						<?= $form->field($model, 'real_name')->textInput(['maxlength' => true]) ?>

						<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
				<!--<form class="form-horizontal regist-form" action="" method="POST" role="form">
					
					<label>姓名：<input type="text" name="name" value=""></label>
					<label>电话：<input type="text" name="phone" value=""></label>
					<br/>
					<button type="submit" class="btn btn-primary regist"></button>
				</form>-->
				<?= Html::submitButton('', ['class' => 'btn btn-primary regist']) ?>
				<?php ActiveForm::end(); ?>
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
		<script type="text/javascript" src="http://tajs.qq.com/stats?sId=58268004" charset="UTF-8"></script>

	</body>
</html>
