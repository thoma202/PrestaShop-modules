<?php 

use \SeleniumGuy;

class PaypalConfigurationHelper
{
	static public $I;

	static public function setSeleniumGuy($I)
	{
		self::$I = $I;
	}

	static public function installModule()
	{
		PrestaShopGlobalHelper::installModule('paypal');
	}

	static public function goToConfigurePage()
	{
		PrestaShopGlobalHelper::goToConfigurePage('paypal');
	}

	static public function installTheModule()
	{
    	PrestaShopGlobalHelper::goToModulesPageToBeginTest();
    	PaypalConfigurationHelper::installModule();
	}

	static public function configureAsPayPalIntegral()
	{
		
		$sellerPayPal = new PayPalUserConfiguration('seller_integral_fr');
		self::sayThatIHavePayPalAccount();
		self::$I->click('#paypal_payment_wps');
		self::$I->fillField('api_username', $sellerPayPal->get('api_username'));
		self::$I->fillField('#api_password', $sellerPayPal->get('api_password'));
		self::$I->fillField('#api_signature', $sellerPayPal->get('api_signature'));
		self::setToSandbox();
		self::$I->click('#paypal_submit');
	}

	static public function configureAsPayPalIntegralEvolution()
	{

	}

	static public function configureAsPayPalOptionPlus()
	{

	}

	static public function checkSandboxMode()
	{
		
	}

	static public function setToSandbox()
	{
		self::$I->click('#paypal_payment_test_mode');
		self::$I->wait(1000);
		self::$I->click('.fancybox-outer #buttons button[value="1"]');
		self::$I->wait(200);
	}

	static public function sayThatIHavePayPalAccount()
	{
		self::$I->click('#paypal_business_account_yes');
	}
}