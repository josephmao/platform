<?php

namespace tests\codeception\api\acceptance;

use Yii;
use tests\codeception\api\AcceptanceTester;

/* @var $scenario \Codeception\Scenario */

$I = new AcceptanceTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Yii::$app->homeUrl);
$I->see('My Company');
$I->seeLink('About');
$I->click('About');
$I->see('This is the About page.');
