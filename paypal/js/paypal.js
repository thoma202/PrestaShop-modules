/*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

{literal}

$(document).ready( function() {

	$('#payment_paypal_express_checkout').click(function() {
		$('#paypal_payment_form').submit();
		return false;
	});

	$('#paypal_payment_form').live('submit', function() {
		var nb = $('#quantity_wanted').val();
		var id = $('#idCombination').val();

		$('#paypal_payment_form input[name=quantity]').val(nb);
		$('#paypal_payment_form input[name=id_p_attr]').val(id);
	});

	function displayExpressCheckoutShortcut() {
		var id_product = $('input[name="id_product"]').val();
		var id_product_attribute = $('input[name="id_product_attribute"]').val();
		$.ajax({
			type: "GET",
			url: baseDir+'/modules/paypal/express_checkout/ajax.php',
			data: { get_qty: "1", id_product: id_product, id_product_attribute: id_product_attribute },
			cache: false,
			success: function(result) {
				if (result == '1') {
					$('#container_express_checkout').slideDown();
				} else {
					$('#container_express_checkout').slideUp();
				}
				return true;
			}
		});
	}

	$('select[name^="group_"]').change(function () {
		displayExpressCheckoutShortcut();
	});

	$('.color_pick').click(function () {
		displayExpressCheckoutShortcut();
	});

	if($('body#product').length > 0)
		displayExpressCheckoutShortcut();
	
	{/literal}
	{if isset($paypal_authorization)}
	{literal}
	
		/* 1.5 One page checkout*/
		var qty = $('.qty-field.cart_quantity_input').val();
		$('.qty-field.cart_quantity_input').after(qty);
		$('.qty-field.cart_quantity_input, .cart_total_bar, .cart_quantity_delete, #cart_voucher *').remove();
		
		var br = $('.cart > a').prev();
		br.prev().remove();
		br.remove();
		$('.cart.ui-content > a').remove();
		
		var gift_fieldset = $('#gift_div').prev();
		var gift_title = gift_fieldset.prev();
		$('#gift_div, #gift_mobile_div').remove();
		gift_fieldset.remove();
		gift_title.remove();
		
	{/literal}
	{/if}
	{if isset($paypal_confirmation)}
	{literal}
		
		$('#container_express_checkout').hide();
		
		$('#cgv').live('click', function() {
			if ($('#cgv:checked').length != 0)
				$(location).attr('href', '{/literal}{$paypal_confirmation}{literal}');
		});
		
		// old jQuery compatibility
		$('#cgv').click(function() {
			if ($('#cgv:checked').length != 0)
				$(location).attr('href', '{/literal}{$paypal_confirmation}{literal}');
		});
		
	{/literal}
	{else if isset($paypal_order_opc)}
	{literal}
	
		$('#cgv').live('click', function() {
			if ($('#cgv:checked').length != 0)
				checkOrder();
		});
		
		// old jQuery compatibility
		$('#cgv').click(function() {
			if ($('#cgv:checked').length != 0)
				checkOrder();
		});
		
	{/literal}
	{/if}
	{literal}

	var modulePath = 'modules/paypal';
	var subFolder = '/integral_evolution';
	{/literal}
	{if Configuration::get('PS_SSL_ENABLED')}
		var baseDirPP = baseDir.replace('http', 'https');
	{else}
		var baseDirPP = baseDir;
	{/if}
	{literal}
	var fullPath = baseDirPP + modulePath + subFolder;
	var confirmTimer = false;
		
	if ($('form[target="hss_iframe"]').length == 0) {
		if ($('select[name^="group_"]').length > 0)
			displayExpressCheckoutShortcut();
		return false;
	} else {
		checkOrder();
	}

	function checkOrder() {
		if(confirmTimer == false)
			confirmTimer = setInterval(getOrdersCount, 1000);
	}

	{/literal}{if isset($id_cart)}{literal}
	function getOrdersCount() {


		$.get(
			fullPath + '/confirm.php',
			{ id_cart: '{/literal}{$id_cart}{literal}' },
			function (data) {
				if ((typeof(data) != 'undefined') && (data > 0)) {
					clearInterval(confirmTimer);
					window.location.replace(fullPath + '/submit.php?id_cart={/literal}{$id_cart}{literal}');
					$('p.payment_module, p.cart_navigation').hide();
				}
			}
		);
	}
	{/literal}{/if}{literal}
});

{/literal}
