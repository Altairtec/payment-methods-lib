<?php

namespace Payment\Paypal;

use Zend\Server\Reflection\ReflectionClass;

class PayPalConstants 
{
	private static $payPalClientId;
	private static $payPalSecret;
	const PAYMENT_METHOD = 'paypal';
	const PAYPAL_CURRENCY = 'BRL';
	const TRANSACTION_DESCRIPTION = 'Compra Online';
	const RETURN_URL = 'http://%1$s/user/login/buyPlanPayPal?success=true';
	const CANCEL_URL = 'http://%1$s/user/login/buyPlanPayPal?success=false';
	const INTENT = 'sale';
	const ITEM_CURRENCY = 'BRL';
	const ITEM_QUANTITY =  1;
		
	public static function prepare()
	{
		if (basename(PP_CONFIG_PATH, '.ini') == 'sdk_config') {
			self::$payPalClientId = 'UUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU';
			self::$payPalSecret = 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW'; 
		} else {
			self::$payPalClientId = 'UUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU'; 
			self::$payPalSecret = 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW'; 
		}
	}
	
	public static function getPayPalClientId()
	{
		return self::$payPalClientId;
	}
	
	public static function getPayPalSecret()
	{
		return self::$payPalSecret;
	}
	
	public static function getAllConsts() {
		return (new \ReflectionClass(get_class()))->getConstants();
	}

}