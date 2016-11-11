<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.css',
        'fonts/font-awesome/css/font-awesome.css',
        'css/animations.css',
        'css/style.css',
        'css/custom.css',
    ];
    public $js = [
        'plugins/modernizr.js',
        'plugins/isotope/isotope.pkgd.min.js',
        'plugins/jquery.backstretch.min.js',
        'plugins/jquery.appear.js',
        'js/template.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}