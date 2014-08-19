{*
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
*}


<script type="text/javascript">
	regenerate_token_show = false;
	{if $regenerate_token != false}
	regenerate_token_show = true;
	{/if}
</script>
{*
<fieldset>
	{if $img_stats}
		<center><img src="{$path|escape:'htmlall'}{$img_stats|escape:'htmlall'}" alt="eBay stats"/></center><br />
	{/if}
	<u><a href="{l s="http://pages.ebay.fr/professionnels/index.html" mod='ebay'}" target="_blank">{l s='Click here to learn more about business selling on eBay' mod='ebay'}</a></u>
</fieldset>
<br />
*}
<link rel="stylesheet" href="{$css_file}" />
<script>
	var $j = $;
</script>
{if substr($smarty.const._PS_VERSION_, 0, 3) == "1.4" || substr($smarty.const._PS_VERSION_, 0, 5) == "1.5.2"}
	<link rel="stylesheet" href="{$fancyboxCss}" />
	<script src="{$ebayjquery|escape:'htmlall'}"></script>
	<script src="{$noConflicts|escape:'htmlall'}"></script>
	<script>
		if(typeof($j172) != 'undefined')
			$j = $j172;
		else 
			$j = $;
	</script>
	<script src="{$fancybox|escape:'htmlall'}"></script>
{/if}
<script src="{$tooltip|escape:'htmlall'}" type="text/javascript"></script>
<script src="{$tips202|escape:'htmlall'}" type="text/javascript"></script>

{literal}

{/literal}

{if $show_welcome}
<div class="ebay-welcome">
    <img id="ebay-logo" src="{$path}views/img/ebay.png" />
    <div id="ebay-welcome-top" class="ebay-boxes-2-col-table">
        <div class="ebay-boxes-2-col-cell right">
            <div class="ebay-boxes-2-col-cell-content">
                <div id="ebay-welcome-left-content">
                    <p class="title ebay-title">{l s='A PERFECT PARTNER FOR YOUR BUSINESS' mod='ebay'}</p>
                    <p>{{l s='eBay is one of the |b|largest marketplaces in the world that connects buyers and sellers of all sizes around the world|/b|.' mod='ebay'}|replace:'|b|':'<b>'|replace:'|/b|':'</b>'}</p>

                    <p>{l s='eBay represents a great opportunity for you to reach millions of new customers and help you to  grow your business.' mod='ebay'}</p>

                    <p><b>{l s='With the eBay add-on for PrestaShop you can:' mod='ebay'}</b></p>
                    <ul class="ebay-bullet-points">
                        <li>{l s='Export your products from your PrestaShop shop to eBay.' mod='ebay'}</li>
                        <li>{l s='Manage both channels from your back-office.' mod='ebay'}</li>
                        <li>{l s='Develop a profitable additional sales channel.' mod='ebay'}</li>
                    </ul>
                    <p><b>{l s='Start selling now with the PrestaShop FREE add-on for eBay!' mod='ebay'}</b></p>
                </div>
            </div>
        </div>
        <div id="ebay-welcome-right" class="ebay-boxes-2-col-cell">
            <div class="ebay-boxes-2-col-cell-content right">
                <div class="ebay-light-gray-box">
                    <div class="ebay-light-gray-box-content-outer">
                        <div class="ebay-light-gray-box-content">
                            <p class="ebay-light-gray-box-title">{l s='Start selling on eBay with PrestaShop is easy:' mod='ebay'}</p>
                            <ul class="ebay-light-gray-box-ul">
                                <li><span class="ebay-light-gray-box-number">1</span> {l s='Create an eBay business account' mod='ebay'}</li>
                                <li><span class="ebay-light-gray-box-number">2</span> {l s='Open your eBay shop' mod='ebay'}</li>
                                <li><span class="ebay-light-gray-box-number">3</span> {l s='Link your eBay account to the eBay add-on' mod='ebay'}</li>
                                <li><span class="ebay-light-gray-box-number">4</span> {l s='Configure the eBay add-on' mod='ebay'}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
{/if}

<div class="ebay-boxes-2-col-table">
    <div class="ebay-boxes-2-col-cell">
        <div class="ebay-boxes-2-col-cell-content left">
            <fieldset class="new" style="min-height: 165px">
                {if $show_welcome}
                	<legend><img src="{$path|escape:'htmlall'}logo.gif" alt="" />{l s='eBay Module Status' mod='ebay'}</legend>
                	<div style="float: left">
                    	{if empty($alert)}
                    		<img src="../modules/ebay/views/img/valid.png" /><strong>{l s='eBay Module is configured and online!' mod='ebay'}</strong>
                    		{if $is_version_one_dot_five}
                    			{if $is_version_one_dot_five_dot_one}
                    				<br/><img src="../modules/ebay/views/img/warn.png" /><strong>{l s='You\'re using version 1.5.1 of PrestaShop. We invite you to upgrade to version 1.5.2  so you can use the eBay module properly.' mod='ebay'}</strong>
                    				<br/><strong>{l s='Please synchronize your eBay sales in your Prestashop front office' mod='ebay'}</strong>
                    			{/if}
                    		{/if}
                    	{else}
                    		<img src="../modules/ebay/views/img/warn.png" /><strong>{l s='Please complete the following settings to configure the module' mod='ebay'}</strong>
                    		<br />{if in_array('registration', $alert)}<img src="../modules/ebay/views/img/warn.png" />{else}<img src="../modules/ebay/views/img/valid.png" />{/if} 1) {l s='Register the module on eBay' mod='ebay'}
                    		<br />{if in_array('allowurlfopen', $alert)}<img src="../modules/ebay/views/img/warn.png" />{else}<img src="../modules/ebay/views/img/valid.png" />{/if} 2) {l s='Allow url fopen' mod='ebay'}
                    		<br />{if in_array('curl', $alert)}<img src="../modules/ebay/views/img/warn.png" />{else}<img src="../modules/ebay/views/img/valid.png" />{/if} 3) {l s='Enable cURL' mod='ebay'}
                    		<br />{if in_array('SellerBusinessType', $alert)}<img src="../modules/ebay/views/img/warn.png" />{else}<img src="../modules/ebay/views/img/valid.png" />{/if} 4) {l s='Please register an eBay business seller account to configure the application' mod='ebay'}
                    	{/if}
                    </div>
                {else}
                    	<legend>{l s='eBay Profiles' mod='ebay'}</legend>
    
                        <table class="table tableDnD" cellpadding="0" cellspacing="0">
                    		<thead>
                    			<tr class="nodrag nodrop">
                                    <th>{l s='Id' mod='ebay'}</th>
                                    <th>{l s='eBay User Id' mod='ebay'}</th>
                                    <th>{l s='eBay Site' mod='ebay'}</th>
                                    <th>{l s='Prestashop Shop' mod='ebay'}</th>
                                    <th>{l s='Language' mod='ebay'}</th>
                                    <th>{l s='Nb Products Synced' mod='ebay'}</th>
                                    <th>{l s='Action' mod='ebay'}</th>                
                                </tr>
                            </thead>
                            <tbody>
                    			{foreach from=$profiles item=profile}            
                                    {if $id_ebay_profile == $profile.id_ebay_profile}
                                        <tr style="font-weight:bold">
                                    {else}
                                        <form id="ebay_profile_form_{$profile.id_ebay_profile}" method="post">
                                            <input type="hidden" name="ebay_profile" value="{$profile.id_ebay_profile}" />
                                        </form>
                                        <tr onclick="document.getElementById('ebay_profile_form_{$profile.id_ebay_profile}').submit();" style="cursor:pointer">
                                    {/if}
                                        <td>{$profile.id_ebay_profile}</td>
                                        <td>{$profile.ebay_user_identifier}</td>
                                        <td>eBay {$profile.site_name}</td>
                                        <td>{$profile.name}</td>
                                        <td align="center"><img src="/img/l/{$profile.id_lang}.jpg" alt="{$profile.language_name}" title="{$profile.language_name}"></td>
                                        <td align="center">{if isset($nb_products[$profile.id_ebay_profile])}{$nb_products[$profile.id_ebay_profile]}{else}0{/if}</td>
                                        <td align="center"><img src="/img/admin/edit.gif" /></td>                    
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    {/if}
                </fieldset>
            </div>
        </div>
    
        <div class="ebay-boxes-2-col-cell">
            <div class="ebay-boxes-2-col-cell-content right absolute">
                <fieldset class="new">
                    <legend>{l s='How to install the module' mod='ebay'}</legend>
                    {if $show_seller_tips}
                        <a id="ebay-seller-tips-link" href>{l s='Hide seller tips' mod='ebay'}</a>
                    {/if}
                    <img id="ebay-install-pict" src="{$path}views/img/install.jpg" />
                    <p id="ebay-install-title">{l s='Resources' mod='ebay'}</p>
                    <ul id="ebay-install-ul">
                        <li>{l s='Download the add-on installation guide' mod='ebay'}</li>
                        <li>{l s='eBay Seller center' mod='ebay'}</li>
                        <li>{l s='eBay fees for professional sellers' mod='ebay'}</li>
                        <li>{l s='Contact us' mod='ebay'}</li>
                    </ul>
                </fieldset>
            </div>
        </div>
    </div>
<div style="clear:both"></div>

<!-- seller tips -->
{if $show_seller_tips}
    <div id="seller-tips" class="ebay-welcome">
        <div id="ebay-tips" class="ebay-boxes-2-col-table">
            <div class="ebay-boxes-2-col-cell right">
                <div class="ebay-boxes-2-col-cell-content">
                    <div id="ebay-welcome-left-content" style="padding-bottom: 3em">
                        <img src="{$path}views/img/ebay.png" />                    
                        <p class="title ebay-title">{l s='A PERFECT PARTNER FOR YOUR BUSINESS' mod='ebay'}</p>
                        <p>{{l s='eBay is one of the |b|largest marketplaces in the world that connects buyers and sellers of all sizes around the world|/b|.' mod='ebay'}|replace:'|b|':'<b>'|replace:'|/b|':'</b>'}</p>

                        <p>{l s='eBay represents a great opportunity for you to reach millions of new customers and help you to  grow your business.' mod='ebay'}</p>
                    </div>
                </div>
            </div>
            <div id="ebay-welcome-right" class="ebay-boxes-2-col-cell">
                <div class="ebay-boxes-2-col-cell-content right">
                    <div class="ebay-light-gray-box">
                        <div class="ebay-light-gray-box-content-outer">
                            <div class="ebay-light-gray-box-content">
                                <p class="ebay-light-gray-box-title">{l s='Tips to sell more on eBay:' mod='ebay'}</p>
                                <ul class="ebay-light-gray-box-ul">
                                    <li>
                                        {assign var="link" value="<a href=\"{l s='http://pages.ebay.co.uk/help/sell/title_desc_ov.html' mod='ebay'}\" target=\"_blank\">"}
                                        <span class="ebay-light-gray-box-number">1</span> <b>{l s='Help buyers to find your product:' mod='ebay'}</b> {{l s='Write good |a|titles and descriptions|/a|' mod='ebay'}|replace:'|a|':$link|replace:'|/a|':'</a>'}</a>
                                    </li>
                                    <li>
                                        {assign var="link" value="<a href=\"{l s='http://sellercentre.ebay.co.uk/research-items-similar-yours' mod='ebay'}\" target=\"_blank\">"}
                                        <span class="ebay-light-gray-box-number">2</span> <b>{l s='Make your products competitive:' mod='ebay'}</b> {{l s='|a|research on eBay for similar products|/a| to yours and compare with your prices.' mod='ebay'}|replace:'|a|':$link|replace:'|/a|':'</a>'}
    </li>
                                    <li>
                                        {assign var="link" value="<a href=\"{l s='http://sellercentre.ebay.co.uk/new-picture-standards' mod='ebay'}\" target=\"_blank\">"}
                                        <span class="ebay-light-gray-box-number">3</span> {{l s='|b|Take special care of your product pictures,|/b| |a|this will help buyers to buy from you.|/a|' mod='ebay'}|replace:'|b|':'</b>'|replace:'|/b|':'</b>'|replace:'|a|':$link|replace:'|/a|':'</a>'}
                                    </li>    
                                    <li>
                                        {assign var="link" value="<a href=\"{l s='http://pages.ebay.co.uk/help/sell/top-rated.html' mod='ebay'}\" target=\"_blank\">"}
                                        <span class="ebay-light-gray-box-number">4</span> {{l s='|b|Make buyers to come back|/b| by |a|delivering a great service|/a| and offering free shipping.' mod='ebay'}|replace:'|b|':'</b>'|replace:'|/b|':'</b>'|replace:'|a|':$link|replace:'|/a|':'</a>'}                                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#ebay-seller-tips-link').click(function(event) {
              event.preventDefault();
              var sellerTips = $('#seller-tips');
              if (sellerTips.css('display') == 'none') {
                  $(this).html('{l s='Hide seller tips' mod='ebay'}');
                  sellerTips.show();
              } else {
                  $(this).html('{l s='Show seller tips' mod='ebay'}');
                  sellerTips.hide();                  
              }
              return false;
          });
        });
    </script>
{/if}
<!-- after seller tips -->