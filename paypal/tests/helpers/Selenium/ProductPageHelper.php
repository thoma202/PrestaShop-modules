<?php 

use \SeleniumGuy;

class ProductPageHelper
{
	static public $I;
	static public function setSeleniumGuy(SeleniumGuy $I)
    {
        self::$I = $I;
    }


	static public function addProductToCart($product, $color = false)
	{
		$productConfiguration = new ProductConfiguration($product, 'rose');
		self::goToPage($productConfiguration->get('id'));
		if($color != false)
		{
			$colors = $productConfiguration->get('color');
			self::$I->click('#color_'.$colors[$color]);
		}
		self::$I->click('#add_to_cart input');
		self::$I->wait(500);
	}

	static public function goToPage($id)
	{
		self::$I->amOnPage('/index.php?id_product='.$id.'&controller=product');
	}

}