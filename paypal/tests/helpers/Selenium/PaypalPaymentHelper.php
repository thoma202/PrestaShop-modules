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

	static public function payIntegralWithWrongInformations10486()
	{
		$buyer = new PayPalUserConfiguration('buyer_fr_10486');

		self::$I->click('#paypal_process_payment');
		self::$I->wait(5000);

		self::$I->fillField('#login_email', $buyer->get('login_email'));
		self::$I->fillField('#login_password', $buyer->get('login_password'));
		self::$I->click('#submitLogin');

		self::$I->click('#funding_select');
		self::$I->click('#Card_2');
		self::$I->click('#continue');

		self::$I->click('#continue_abovefold');
		self::$I->click('input[name=confirmation]');
	}

}