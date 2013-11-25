<?php 

use \SeleniumGuy;

class PaypalPaymentHelper
{
	static public $I;
	static public function setSeleniumGuy($I)
	{
		self::$I = $I;
	}

	static public function payIntegralWithGoodInformations()
	{
		$buyer = new PayPalUserConfiguration('buyer_fr');

		self::$I->click('#paypal_process_payment');
		self::$I->wait(5000);

		self::$I->fillField('#login_email', $buyer->get('login_email'));
		self::$I->fillField('#login_password', $buyer->get('login_password'));
		self::$I->click('#submitLogin');

		self::$I->click('#continue_abovefold');
		self::$I->click('input[name=confirmation]');
	}

	static public function payIntegralExpressWithGoodInformations()
	{
		$buyer = new PayPalUserConfiguration('buyer_fr');

		self::$I->click('#paypal_process_payment');
		self::$I->wait(5000);

		self::$I->fillField('#login_email', $buyer->get('login_email'));
		self::$I->fillField('#login_password', $buyer->get('login_password'));
		self::$I->click('#submitLogin');

		self::$I->click('#continue_abovefold');
		self::$I->click('input[name=confirmation]');

	}

}