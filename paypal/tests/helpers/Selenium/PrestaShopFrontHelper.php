<?php 

use \SeleniumGuy;

class PrestaShopFrontHelper
{
	static public $I;
	static public function setSeleniumGuy(SeleniumGuy $I)
    {
        self::$I = $I;
    }


	static public function addProductToCart($product)
	{
		$productPage = new ProductPageHelper($product, 'rose', self::$I);
		$productPage->goToPage();
		$productPage->addToCart();
	}


}