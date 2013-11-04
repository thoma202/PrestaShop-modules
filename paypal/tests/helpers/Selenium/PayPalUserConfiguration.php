<?php 
use \SeleniumGuy;

class PayPalUserConfiguration
{
	public $key;

	private $userData = array(
		'seller_integral_fr' => array(
			'api_username' => 'tbigueres-evolution_api1.202-ecommerce.com',
			'api_password' => '1383063758',
			'api_signature' => 'AgJxT61-DNS3IbzUsw-w.TpKmowUAzB5Y6ZKm4Rc9ps-HPAO7P67ULPa',
		),
		'seller_evolution_fr' => array(
			'api_business_account' => 'tbigueres-pro@202-ecommerce.com'
		)
	);

	public function __construct($key)
	{
		$this->key = $key;
	}

	public function get($data)
	{
		return $this->userData[$this->key][$data];
	}
}