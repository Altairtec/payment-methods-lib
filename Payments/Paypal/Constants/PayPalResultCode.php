<?php

namespace Payment\PayPal\Constants;

use Payment\Util\AbstractEnum;

class PayPalResultCode extends AbstractEnum
{
	public static $PAYPAL_ERRO; 
	public static $TRANSACAO_NEGADA;
	
	public static function _init()
	{
		self::$PAYPAL_ERRO = self::enum(142, 'O pagamento não pode ser realizado pelo PayPal'); 
		self::$TRANSACAO_NEGADA  = self::enum(177, 'A transação de confirmação foi negada pelo PayPal');
	}
}

PayPalResultCode::_init();