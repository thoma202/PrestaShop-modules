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
    public function i_buy_an_ipod_and_pay_with_opc_integral_and_login_in_order_process(SeleniumGuy $I) {
        
        $I->wantTo('Test to buy an Ipod and pay through an OPC with paypal Integral');
        PrestaShopGlobalHelper::setSeleniumGuy($I);
        PaypalConfigurationHelper::setSeleniumGuy($I);
        PrestaShopFrontHelper::setSeleniumGuy($I);
        ProductPageHelper::setSeleniumGuy($I);
        OrderPageHelper::setSeleniumGuy($I);
        PaypalPaymentHelper::setSeleniumGuy($I);
        
        //Set configuration AS OP and Express Checkout
        // PrestaShopGlobalHelper::loginBackOffice();
        // PrestaShopGlobalHelper::setOPC();
        // PrestaShopGlobalHelper::goToPage('modules');
        // PaypalConfigurationHelper::installModule();
        // PaypalConfigurationHelper::setPayPal('integral');
        //Configuration has been set, go to front office and make payment

        ProductPageHelper::addProductToCart('ipodnano', 'pink');

        OrderPageHelper::goToPage();
        OrderPageHelper::login();
        OrderPageHelper::chooseCarrier();
        OrderPageHelper::agreeCGV();


        PaypalPaymentHelper::payIntegralWithGoodInformations();
        
        //    $I->wait(3000); //Loading of Iframe
        //    $I->click('.cclogo.visa');
        //    $buyerPaypal = new PayPalUserConfiguration('buyer_fr');
        //    $I->fillField('#cc_number', $buyerPaypal->get('cc_number'));
        //    $I->fillField('#expdate_month', $buyerPaypal->get('expdate_month'));
        //    $I->fillField('#expdate_year', $buyerPaypal->get('expdate_year'));
        //    $I->fillField('#cvv2_number', $buyerPaypal->get('cvv2_number'));
    }

}