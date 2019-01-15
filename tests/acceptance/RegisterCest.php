<?php 

class RegisterCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function registerTest(AcceptanceTester $I)
    {
//        $I->amOnPage('/register');
//        $I->fillField('name', 'admin');
//        $I->fillField('email', 'your-email');
//        $I->fillField('password', 'password');
//        $I->checkOption('#agree');
//        $I->click('Зарегистрироваться');
//        $I->see('Подтвердите почтовый адрес');
    }

    // tests
    public function wrongRegister(AcceptanceTester $I)
    {
        $I->amOnPage('/register');
        $I->fillField('name', 'admin');
        $I->fillField('email', 'admin@admin.com');
        $I->fillField('password', 'password');
        $I->checkOption('#agree');
        $I->click('Зарегистрироваться');
        $I->see('Пользователь с таким Email уже есть');
    }

    // tests
    public function notAgree(AcceptanceTester $I)
    {
        $I->amOnPage('/register');
        $I->click('Зарегистрироваться');
        $I->see('Вы не согласились с правилами ресурса');
    }
}
