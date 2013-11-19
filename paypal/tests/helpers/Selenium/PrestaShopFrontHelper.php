<?php 

use \SeleniumGuy;

class PrestaShopFrontHelper
{
	static public $I;
	static public function setSeleniumGuy(SeleniumGuy $I)
    {
        self::$I = $I;
    }
}