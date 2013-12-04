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

    public function i_install_paypal_module_and_configure_integral(SeleniumGuy $I)
    {
        $I->wantTo('Install Module and configure it as integral for next tests');
        PrestaShopGlobalHelper::setSeleniumGuy($I);
        PaypalConfigurationHelper::setSeleniumGuy($I);
        PrestaShopFrontHelper::setSeleniumGuy($I);
        ProductPageHelper::setSeleniumGuy($I);
        OrderPageHelper::setSeleniumGuy($I);
        PaypalPaymentHelper::setSeleniumGuy($I);

        PrestaShopGlobalHelper::loginBackOffice();
        PrestaShopGlobalHelper::goToPage('modules');
        PaypalConfigurationHelper::installModule();

        PrestaShopGlobalHelper::setOPC();
        PaypalConfigurationHelper::setPayPal('integral');
        $I->see('BRAVO');
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
        
        
        //Configuration has been set in first test , go to front office and make payment 
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

        ProductPageHelper::addProductToCart('ipodnano', 'pink');

        OrderPageHelper::goToPage();
        OrderPageHelper::login();
        OrderPageHelper::chooseCarrier();
        OrderPageHelper::agreeCGV();


        PaypalPaymentHelper::payIntegralWithWrongInformations10486();   
        $I->see("Thoma Bigueres's Test Store");
    }

}