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
 *  @license	http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

$sql[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'ebay_user_identifier_token` (
    `ebay_user_identifier` varchar(255) NOT NULL,
    `token` text NOT NULL,
    PRIMARY KEY (`ebay_user_identifier`)
	) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
    
$sql[] = 'ALTER TABLE `'._DB_PREFIX_.'_ebay_category` DROP INDEX `id_category_ref`';

$sql[] = 'ALTER TABLE  `ebay`.`ps_ebay_category` ADD UNIQUE (`id_category_ref`,`id_country`)';