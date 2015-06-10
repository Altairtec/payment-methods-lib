<?php

namespace Payment\Aptilo\Constants;

use Payment\Util\AbstractEnum;

class OpaqueResultCode extends AbstractEnum
{
	public static $_198;
	public static $_200;
	public static $TOPUP;
	public static $WRONG_PASSWORD;
	public static $USER_NOT_FOUND;
	public static $EXPIRED_USER_ACCOUNT;
	public static $MAX_NUMBER_SESSIONS;
	public static $_199;
	
	public static function _init()
	{
		self::$_198 = self::enum(198, '198');
		self::$_200 = self::enum(200, '200');
		self::$TOPUP = self::enum(201, 'topup');
		self::$WRONG_PASSWORD = self::enum(202, 'Wrong password');
		self::$USER_NOT_FOUND = self::enum(203, 'User not found');
		self::$EXPIRED_USER_ACCOUNT = self::enum(204, 'Expired user account');
		self::$MAX_NUMBER_SESSIONS = self::enum(205, 'Maximum number of simultaneous sessions');
		self::$_199 = self::enum(199, '199');		
	}
}

OpaqueResultCode::_init();