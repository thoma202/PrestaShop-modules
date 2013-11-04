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
    public function i_buy_an_ipod_and_pay_without_opc_express_checkout(SeleniumGuy $I) {
    	PrestaShopFrontHelper::AddProductToCart('ipodnano');
    	
    }

}