<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="互动,多媒体,展览展示,数据,H5,app，云计算,interactive">
    <meta name="author" content="thinkpower.top">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | 思源智力</title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="images/favicon.ico">
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
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<footer id="footer">
        <div class="footer section">
            <div class="container">
                <h1 class="title text-center" id="contact">联系我们</h1>
                <div class="space"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="footer-content">
                            <p class="large">多想一步，多做一点；通过无限想象来挑战极限，为客户打造超乎想像的数字创意体验；为逐梦者提供实现理想的平台。</p>
                            <ul class="list-icons">
                                <li><i class="fa fa-map-marker pr-10"></i> 北京市丰台区银海星月1号楼2门501, 100071</li>
                                <li><i class="fa fa-phone pr-10"></i> +86 13501223360 / 18518223352</li>
                                <li><i class="fa fa-fax pr-10"></i> +86 010 63861582 </li>
                                <li><i class="fa fa-envelope-o pr-10"></i> wangsibo@thinkpower.top</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">&copy; Thinkpower <?= date('Y') ?>  京ICP备16036846号-1</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>

<?php $this->endBody() ?>
<script type="text/javascript" src="http://tajs.qq.com/stats?sId=58268004" charset="UTF-8"></script>
</body>
</html>
<?php $this->endPage() ?>
