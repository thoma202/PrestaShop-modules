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
        PrestaShopGlobalHelper::loginBackOffice();
        PrestaShopGlobalHelper::setOPC();
        PrestaShopGlobalHelper::goToPage('modules');
        PaypalConfigurationHelper::installModule();
        PaypalConfigurationHelper::setPayPal('integral');
        //Configuration has been set, go to front office and make payment

        ProductPageHelper::addProductToCart('ipodnano', 'pink');

        OrderPageHelper::goToPage();
        OrderPageHelper::login();
        OrderPageHelper::chooseCarrier();
        OrderPageHelper::agreeCGV();


        PaypalPaymentHelper::payIntegralWithGoodInformations();
    }

    public function i_buy_an_ipod_and_pay_with_opc_integral_to_get_error10482(SeleniumGuy $I)
    {
        $I->wantTo('Test to buy an Ipod and pay through an OPC with paypal Integral');
        PrestaShopGlobalHelper::setSeleniumGuy($I);
        PaypalConfigurationHelper::setSeleniumGuy($I);
        PrestaShopFrontHelper::setSeleniumGuy($I);
        ProductPageHelper::setSeleniumGuy($I);
        OrderPageHelper::setSeleniumGuy($I);
        PaypalPaymentHelper::setSeleniumGuy($I);
        
        //Set configuration AS OP and Express Checkout
        PrestaShopGlobalHelper::loginBackOffice();
        PrestaShopGlobalHelper::setOPC();
        PrestaShopGlobalHelper::goToPage('modules');
        PaypalConfigurationHelper::installModule();
        PaypalConfigurationHelper::setPayPal('integral');
        //Configuration has been set, go to front office and make payment

        ProductPageHelper::addProductToCart('ipodnano', 'pink');

        OrderPageHelper::goToPage();
        OrderPageHelper::login();
        OrderPageHelper::chooseCarrier();
        OrderPageHelper::agreeCGV();


        PaypalPaymentHelper::payIntegralWithWrongInformations10486();   
    }

}