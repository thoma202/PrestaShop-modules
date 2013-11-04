<?php
use \SeleniumGuy;

class PrestaShopModuleListCest	
{
    // tests
    protected function install_the_module(SeleniumGuy $I) {
    	$I->wantTo('Install the module');
    	$this->setBegin($I);
    	PayPalConfigurationHelper::installTheModule();
    	$I->seeElement('.configure_paypal');
    }

    protected function go_on_configuration(SeleniumGuy $I)
    {//Module is installed
    	$I->wantTo('Go to the configuration page');
    	$this->setBegin($I);
    	PrestaShopGlobalHelper::goToModulesPageToBeginTest();
    	PayPalConfigurationHelper::goToConfigurePage();
    	$I->wait(5);
    	$I->see('LEADER DES PAIEMENTS EN LIGNE');
    }

    public function configure_the_module_as_paypal_integral(SeleniumGuy $I)
    {
    	$I->wantTo('Configure module to use paypal integral');
    	$this->setBegin($I);
    	PrestaShopGlobalHelper::goToModulesPageToBeginTest();
    	PayPalConfigurationHelper::goToConfigurePage();
    	PaypalConfigurationHelper::configureAsPayPalIntegral();
    	$I->see('BRAVO');
    }

    protected function setBegin(SeleniumGuy $I)
    {
    	PrestaShopGlobalHelper::setSeleniumGuy($I);
    	PayPalConfigurationHelper::setSeleniumGuy($I);
    }

    public function _cleanup()
    {
    	
    }
}