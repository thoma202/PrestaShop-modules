<?php

/*
 * 2007-2013 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2013 PrestaShop SA
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

class EbayProfile extends ObjectModel
{
	public $id_lang;
	public $id_shop;
	public $ebay_user_identifier;
	public $ebay_site_id;
	public $id_ebay_returns_policy_configuration;
	
	private $returns_policy;
	
	private $configurations;
	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'ebay_profile',
		'primary' => 'id_ebay_profile',
		'fields' => array(
			'id_lang' =>		array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'id_shop' =>		array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			'ebay_user_identifier' => array('type' => self::TYPE_STRING, 'size' => 32),
			'ebay_site_id' => array('type' => self::TYPE_STRING, 'size' => 32),
			'id_ebay_returns_policy_configuration' => array('type' => self::TYPE_INT, 'validate' => 'isInt')
		),
	);
	
	public function getReturnsPolicyConfiguration()
	{
		if ($this->id_ebay_returns_policy_configuration)
			$returns_policy_configuration = new EbayReturnsPolicyConfiguration($this->id_ebay_returns_policy_configuration);
		else
			$returns_policy_configuration = new EbayReturnsPolicyConfiguration();
		
		return $returns_policy_configuration;
	}
	
	public function setReturnsPolicyConfiguration($within, $who_pays, $description, $accepted_option)
	{
		$returns_policy_configuration = $this->getReturnsPolicyConfiguration();
		if ($returns_policy_configuration->ebay_returns_within != $within)
			$returns_policy_configuration->ebay_returns_within = $within;
		if ($returns_policy_configuration->ebay_returns_who_pays != $who_pays)
		$returns_policy_configuration->ebay_returns_who_pays = $who_pays;
		if ($returns_policy_configuration->ebay_returns_description != $description)
			$returns_policy_configuration->ebay_returns_description = $description;
		if ($returns_policy_configuration->ebay_returns_accepted_option != $accepted_option)
			$returns_policy_configuration->ebay_returns_accepted_option = $accepted_option;
		return $returns_policy_configuration->save();
	}	

	/*
	private function _loadFromDb()
	{
		$sql = 'SELECT ecc.`id_category`, ec.`id_category_ref`, ec.`is_multi_sku`, ecc.`percent` FROM `'._DB_PREFIX_.'ebay_category` ec
			LEFT JOIN `'._DB_PREFIX_.'ebay_category_configuration` ecc
			ON (ecc.`id_ebay_category` = ec.`id_ebay_category`)
			WHERE ';

		if ($this->id_category_ref)
			$sql .= 'ec.`id_category_ref` = '.(int)$this->id_category_ref;
		else
			$sql .= 'ecc.`id_category` = '.(int)$this->id_category;

		$res = Db::getInstance()->getRow($sql);

		foreach ($res as $attribute => $value)
			$this->$attribute = $value;
	}
	*/
	
	private function _loadConfiguration()
	{
		$sql = 'SELECT ec.`name`, ec.`value`
				FROM `'._DB_PREFIX_.'ebay_configuration` ec
				WHERE ec.`id_ebay_profile`= '.(int)$this->id;
		$configurations = Db::getInstance()->executeS($sql);

		foreach ($configurations as $configuration)
			$this->configurations[$configuration['name']] = $configuration['value'];
	}

	public function setConfiguration($name, $value, $html = false)
	{
		$data = array(
			'id_ebay_profile' => $this->id,
			'name' 			 		  => pSQL($name),
			'value' 		 			=> pSQL($value, $html)
		);
		$res = Db::getInstance()->insert('ebay_configuration', $data, false, true, Db::REPLACE);
		if ($res)
			$this->configurations[$name] = $value;
		return $res;
	}

	public function getConfiguration($name)
	{
		if ($this->configurations === null)
			$this->_loadConfiguration();

		return isset($this->configurations[$name]) ? $this->configurations[$name] : null;
	}
	
	public function deleteConfigurationByName($name)
	{
		return Db::getInstance()->execute('
		DELETE FROM `'._DB_PREFIX_.'ebay_configuration`
		WHERE `id_ebay_profile` = '.(int)$this->id.'
		AND `name` = "'.pSQL($name).'"');		
	}
	
	/**
	  * Get several configuration values
	  *
	  * @param array $keys Keys wanted
	  * @return array Values
	  */
	public function getMultiple($keys)
	{
	 	if (!is_array($keys))
	 		throw new PrestaShopException('keys var is not an array');

		if ($this->configurations === null)
			_loadConfiguration();

	 	$results = array();
	 	foreach ($keys as $key)
	 		$results[$key] = $this->getConfiguration($key);
		return $results;
	}
	
	public function getCarriers($id_lang, $active = false, $delete = false, $id_zone = false, $ids_group = null, $modules_filters = Carrier::PS_CARRIERS_ONLY)
	{
		$carriers = Carrier::getCarriers($id_lang, $active, $delete, $id_zone, $ids_group, $modules_filters);

		$sql = 'SELECT `id_carrier`
			FROM `'._DB_PREFIX_.'carrier_shop`
			WHERE `id_shop` = '.(int)$this->id_shop;
		$res = Db::getInstance()->executeS($sql);
		$id_carriers = array();
		foreach($res as $row)
			$id_carriers[] = $row['id_carrier'];
		
		$final_carriers = array();
		foreach($carriers as $carrier)
			if (in_array($carrier['id_carrier'], $id_carriers))
					$final_carriers[] = $carrier;
		
		return $final_carriers;
	}
	
	/**
	  * Is the profile configured
	  *
	  * @return boolean true if configured, false otherwise
	  */
	public function isConfigured()
	{	
		if ($this->configurations === null)
			$this->_loadConfiguration();
		return (count($this->configurations) > 0);
	}
	
	public static function getOneByIdShop($id_shop)
	{
		// check if one profile exists otherwise creates it
		$sql = 'SELECT `id_ebay_profile`
			FROM `'._DB_PREFIX_.'ebay_profile` ep
			WHERE ep.`id_shop` = '.(int)$id_shop;
		if ($profile_data = Db::getInstance()->getRow($sql)) // one row exists
			return new EbayProfile($profile_data['id_ebay_profile']);
	}
	
	public static function getCurrent()
	{
		$id_shop = Shop::getContextShopID();
		if (!$id_shop)
			$id_shop = Configuration::get('PS_SHOP_DEFAULT');
		return self::getOneByIdShop($id_shop);
	}
	
	public static function getByShopIds()
	{
		
	}

}