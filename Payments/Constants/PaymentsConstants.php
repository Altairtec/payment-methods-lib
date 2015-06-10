<?php

namespace Payment\Payments\Constants;

use Zend\Server\Reflection\ReflectionClass;

class PaymentsConstants 
{
	const PAYPAL_METHOD = 'PAYPAL'; 
	const REDECARD_METHOD = 'REDECARD';
	
	public static function getAllConsts() {
		return (new \ReflectionClass(get_class()))->getConstants();
	}	
}