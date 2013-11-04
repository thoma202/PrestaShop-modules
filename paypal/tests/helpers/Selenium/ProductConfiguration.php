<?php 

use \SeleniumGuy

class ProductConfiguration
{
	public $key;

	private $productData = array(
		'ipodnano' => array(
			'id' => 1,
		),
		'ipodshuffle' => array(
			'id' => 2,		
		),
		'ipodtouch' => array(
			'id' => 5,
		),
		'ecouteurs' => array(
			'id' => 7,
		), 
		'housse' => array(
			'id' => 6,
		), 
		'macbookair' => array(
			'id' => 3,
		), 
		'macbookpro' => array(
			'id' => 4,
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