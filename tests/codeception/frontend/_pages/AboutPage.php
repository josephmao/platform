<?php

namespace tests\codeception\api\_pages;

use yii\codeception\BasePage;

/**
 * Represents about page
 * @property \tests\codeception\api\AcceptanceTester|\tests\codeception\api\FunctionalTester $actor
 */
class AboutPage extends BasePage
{
    public $route = 'site/about';
}
