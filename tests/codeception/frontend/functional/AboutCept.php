<?php

namespace tests\codeception\api\functional;

use tests\codeception\api\FunctionalTester;
use tests\codeception\api\_pages\AboutPage;

/* @var $scenario \Codeception\Scenario */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that about works');
AboutPage::openBy($I);
$I->see('About', 'h1');
