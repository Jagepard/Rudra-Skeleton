<?php 

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function testLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'admin@admin.com');
        $I->fillField('password', 'password');
        $I->click('Авторизация');
        $I->see('Rudra Framework');
    }

    // tests
    public function wrongLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'admin@admin.com');
        $I->fillField('password', 'false');
        $I->click('Авторизация');
        $I->see('Укажите верные данные');
    }
}
