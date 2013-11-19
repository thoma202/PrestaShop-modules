
<?php

use \SeleniumGuy;

class PrestaShopGlobalHelper
{
    public static $I; // Selenium Guy

    static public function setSeleniumGuy(SeleniumGuy $I)
    {
        self::$I = $I;
    }

	static $pagesURL = array(
		'modules' => '/bb/index.php?controller=AdminModules',
        'orderPreferences' => '/bb/index.php?controller=AdminOrderPreferences'
	);	

    static public function goToModulesPageToBeginTest()
    {
        self::loginBackOffice();
        PrestaShopGlobalHelper::goToPage('modules');
    }

    // tests
    static public function loginBackOffice() {
    	
    	self::$I->amOnPage('/bb');
    	PrestaShopGlobalHelper::login();
    }

    static public function login($login = 'acceptance@test.fr', $pass = 'acceptancetests')
    {
    	self::$I->fillField('#email',$login);
    	self::$I->fillField('#passwd',$pass);
    	self::$I->click('Connexion');
        self::$I->wait(1000);
    }

    static public function goToPage($page)
    {
        self::$I->amOnPage(self::$pagesURL[$page]);
        self::$I->click('Je comprends les risques et je veux afficher la page');    	
    }

    /**
     * Install a module once on the module Page
     * @param  string $name name of the module 
     * @return void       
     */
    static public function installModule($name)
    {
        self::$I->click('.install_'.$name);
    }

    static public function goToConfigurePage($name)
    {
        self::$I->click('.configure_'.$name);
    }
    
    static public function setOPC($true = true)
    {
        self::goToPage('orderPreferences');
        self::$I->SelectOption('form select[name=PS_ORDER_PROCESS_TYPE]', '1');
        self::$I->click('#desc-configuration-save');
    }

}