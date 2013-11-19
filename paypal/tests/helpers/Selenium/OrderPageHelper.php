<?php 

use \SeleniumGuy;

class OrderPageHelper
{
	static public $I;
	static public function setSeleniumGuy(SeleniumGuy $I)
    {
        self::$I = $I;
    }

    static public function goToPage()
    {
    	self::$I->click('#shopping_cart a');
    }

    static public function createAccount()
    {

    }

    static public function login($user_name = 'johndoe')
    {
    	$user = new PrestaShopUserConfiguration($user_name);


    	self::$I->click('#openLoginFormBlock');
    	self::$I->wait(1000);
    	self::$I->fillField('#login_email', $user->get('login_email'));
    	self::$I->fillField('#login_passwd', $user->get('login_passwd'));
    	self::$I->click('#SubmitLogin');
    	self::$I->wait(500);
    }

    static public function chooseCarrier()
    {

    }

    static public function agreeCGV()
    {
    	self::$I->click('#cgv');
        self::$I->wait(1000); //Wait for payment method to load
    }
}