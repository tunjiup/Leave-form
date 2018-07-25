<?php

class Currency {
	
	function __construct() {

	}

	/**
	* Can return Currency Symbol
	* @return Currency Symbol
	*/
	public function get_currency_symbol($symbol) {

	    $cc = strtoupper($symbol);

	    $currency = array(
			"USD" => "&#36;" , //U.S. Dollar
			"AUD" => "&#36;" , //Australian Dollar
			"BRL" => "R&#36;" , //Brazilian Real
			"CAD" => "C&#36;" , //Canadian Dollar
			"CZK" => "K&#269;" , //Czech Koruna
			"DKK" => "kr" , //Danish Krone
			"EUR" => "&euro;" , //Euro
			"HKD" => "&#36" , //Hong Kong Dollar
			"HUF" => "Ft" , //Hungarian Forint
			"ILS" => "&#x20aa;" , //Israeli New Sheqel
			"INR" => "&#8377;", //Indian Rupee
			"JPY" => "&yen;" , //Japanese Yen 
			"MYR" => "RM" , //Malaysian Ringgit 
			"MXN" => "&#36" , //Mexican Peso
			"NOK" => "kr" , //Norwegian Krone
			"NZD" => "&#36" , //New Zealand Dollar
			"PHP" => "&#x20b1;" , //Philippine Peso
			"PLN" => "&#122;&#322;" ,//Polish Zloty
			"GBP" => "&pound;" , //Pound Sterling
			"SEK" => "kr" , //Swedish Krona
			"CHF" => "Fr" , //Swiss Franc
			"TWD" => "&#36;" , //Taiwan New Dollar 
			"THB" => "&#3647;" , //Thai Baht
			"TRY" => "&#8378;", //Turkish Lira
			"PHP" => "&#x20B1" //Philippine Peso
		);

		if(array_key_exists($cc, $currency)){
			return $currency[$cc];
		}
	}

	/**
	* Block Disposal Email
	* @return Bool
	*/
	public function disposalEmail($email) {

		$disposable_list = array(
			'drdrb.net', 'upliftnow.com', 'uplipht.com', 'venompen.com', 'veryrealemail.com', 'viditag.com', 'viewcastmedia.com', 'viewcastmedia.net',
			'viewcastmedia.org', 'gustr.com', 'webm4il.in', 'wegwerfadresse.de', 'wegwerfemail.de', 'wetrainbayarea.com', 'wetrainbayarea.org', 'wh4f.org',
			'whyspam.me', 'willselfdestruct.com', 'winemaven.in', 'wronghead.com', 'wuzup.net', 'wuzupmail.net', 'www.e4ward.com', 'www.gishpuppy.com',
			'www.mailinator.com', 'wwwnew.eu', 'xagloo.com', 'xemaps.com', 'xents.com', 'xmaily.com', 'xoxy.net', 'yep.it', 'yogamaven.com', 'yopmail.fr',
			'yopmail.net', 'ypmail.webarnak.fr.eu.org', 'yuurok.com', 'zehnminutenmail.de', 'zippymail.in', 'zoaxe.com', 'zoemail.org', 'inboxalias.com',
			'koszmail.pl', 'tagyourself.com', 'whatpaas.com', 'emeil.in', 'azmeil.tk', 'mailfa.tk', 'inbax.tk', 'emeil.ir', 'crazymailing.com', 'mailimate.com'
		);

		$domain = substr(strrchr($email, "@"), 1);

		if(in_array($domain, $disposable_list)){
			return false;
		} else {
			return true;
		}
	}

	/**
	* Convert plain url to clickable Url
	* @return Bool
	*/
	public function plainUrl($string) {
		return preg_replace('%(https?|ftp)://([-A-Z0-9./_*?&;=#]+)%i','<a target="blank" href="$0" target="_blank">$0</a>', $string);
	}
}
?>