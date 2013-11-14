<?php
use \SeleniumGuy;

class PayPalIntegralCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function i_buy_an_ipod_and_pay_with_opc_express_checkout(SeleniumGuy $I) {
        
        $I->login();

        PrestaShopFrontHelper::setSeleniumGuy($I);
    	PrestaShopFrontHelper::addProductToCart('ipodnano', 'rose');

        $I->click('#shopping_cart a'); // Go on cart page

        $I->click('#cgv');
        $I->wait(3000); //Loading of Iframe
        $I->click('.cclogo.visa');
        $buyerPaypal = new PayPalUserConfiguration('buyer_fr');
        $I->fillField('#cc_number', $buyerPaypal->get('cc_number'));
        $I->fillField('#expdate_month', $buyerPaypal->get('expdate_month'));
        $I->fillField('#expdate_year', $buyerPaypal->get('expdate_year'));
        $I->fillField('#cvv2_number', $buyerPaypal->get('cvv2_number'));
    }

}