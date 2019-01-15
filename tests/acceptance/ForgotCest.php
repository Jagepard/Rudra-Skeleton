<?php 

class ForgotCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function forgotTest(AcceptanceTester $I)
    {
//        $I->amOnPage('/forgot');
//        $I->fillField('email', 'your-email');
//        $I->click('Сбросить пароль');
//        $I->see('Перейдите по ссылке');
    }

    // tests
    public function wrongForgot(AcceptanceTester $I)
    {
        $I->amOnPage('/forgot');
        $I->fillField('email', 'admin@false.com');
        $I->click('Сбросить пароль');
        $I->see('Email не зарегистрирован');
    }
}
