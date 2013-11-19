<?php 

use \SeleniumGuy;

class PrestaShopUserConfiguration
{
	public $key;

	private $userData = array(
		'johndoe' => array(
			'login_email' => 'pub@prestashop.com',
			'login_passwd' => '123456789',
		),
	);

	public function __construct($key)
	{
		$this->key = $key;
	}

	public function getPageUrl()
	{
		return '/'.$this->get('id'). '-'.$this->key.'.html';
	}

	public function get($data)
	{
		return $this->userData[$this->key][$data];
	}
}