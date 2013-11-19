<?php 

use \SeleniumGuy;

class ProductConfiguration
{
	public $key;

	private $productData = array(
		'ipodnano' => array(
			'id' => 1,
			'color' => array(
				'pink' => '5',
				'cyan' => '4', 
				'grey' => '3',
				'green' => '5',
				'orange' => '6', 
				'black' => '14', 
				'lila' => '18', 
				'yellow' => '19',
			),
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

	public function getPageUrl()
	{
		return '/'.$this->get('id'). '-'.$this->key.'.html';
	}

	public function get($data)
	{
		return $this->productData[$this->key][$data];
	}
}