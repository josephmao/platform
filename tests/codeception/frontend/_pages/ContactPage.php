<?php

namespace tests\codeception\api\_pages;

use yii\codeception\BasePage;
use api\models\ContactForm;

/**
 * Represents contact page
 * @property \tests\codeception\api\AcceptanceTester|\tests\codeception\api\FunctionalTester $actor
 */
class ContactPage extends BasePage
{
    public $route = 'site/contact';

    /**
     * @param array $contactData
     */
    public function submit(array $contactData)
    {
        $contactForm = new ContactForm;
 
        foreach ($contactData as $field => $value) {
            $inputType = $field === 'body' ? 'textarea' : 'input';
            $this->actor->fillField($inputType . '[name="' . $contactForm->formName() . '[' . $field . ']"]', $value);
        }
        $this->actor->click('contact-button');
    }
}
