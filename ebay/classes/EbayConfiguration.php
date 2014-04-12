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

if (file_exists(dirname(__FILE__).'/EbayRequest.php'))
	require_once(dirname(__FILE__).'/EbayRequest.php');

class EbayConfiguration
{
	
	
	
	/**
	 * Updates Ebay API Token and stores it
	 *
	 * Returns true is sucessful, false otherwise
	 *
	 * @return boolean
	 */
	public static function updateAPIToken()
	{
		$request = new EbayRequest();
		$ebay_profile = EbayProfile::getCurrent();

		if ($token = $request->fetchToken(Configuration::getGlobalValue('EBAY_API_USERNAME'), Configuration::getGlobalValue('EBAY_API_SESSION')))
		{
			Configuration::updateGlobalValue('EBAY_API_TOKEN', $token);
			Configuration::updateGlobalValue('EBAY_TOKEN_REGENERATE', false);

			return true;
		}

		return false;
	}
	
	public static function get($id_ebay_profile, $name)
	{
		return Db::getInstance()->getValue('SELECT `value` 
			FROM `'._DB_PREFIX_.'ebay_configuration` 
			WHERE `id_ebay_profile` = '.$id_ebay_profile.'
			AND `name` = "'.pSQL($name).'"');
	}
	
	public static function set($id_ebay_profile, $name, $value)
	{
		return Db::getInstance()->insert('ebay_configuration', array(
			'id_ebay_profile' => $id_ebay_profile,
			'name'						=> pSQL($name),
			'value'						=> pSQL($value)
		), false, true, Db::REPLACE);
	}	
	
	/**
	 * For upgrade: takes the values in PS Configurations and stores them in Ebay Configurations
	 *
	 * Returns true is sucessful, false otherwise
	 *
	 * @return boolean
	 */	
	public static function PSConfigurationsToEbayConfigurations($id_ebay_profile, $attributes)
	{
		foreach($attributes as $name)
		{
			$ps_value = Configuration::get($name);
			$ebay_value = EbayConfiguration::get($id_ebay_profile, $name);
			if ($ps_value && !$ebay_value)
				EbayConfiguration::set($id_ebay_profile, $name, $ps_value);
		}
	}
}