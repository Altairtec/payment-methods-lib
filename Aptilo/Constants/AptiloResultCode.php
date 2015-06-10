<?php

namespace Payment\Aptilo\Constants;

use Payment\Util\AbstractEnum;

class AptiloResultCode extends AbstractEnum
{
	public static $SUCCESS;
	public static $INTERNAL_ERROR;
	public static $USER_NOT_FOUND;
	public static $BAD_ARB_DATA;
	public static $BAD_BILLING_DATA;
	public static $AUTHENTICATION_FAILED;
	public static $SETTLE_PURCHASE_FAILED;
	public static $BAD_PRODUCT_DATA;
	public static $PREPARE_PURCHASE_FAILED;
	public static $AUTHORIZE_PURCHASE_FAILED;
	public static $PRODUCT_FAILED;
	public static $INVALID_PARAMETER;
	public static $AUTHORIZATION_FAILED;
	public static $FAILED_ACCOUNT_ACTIVE;
	public static $FAILED_ACCOUNT_EXISTS;
	public static $SUCH_PROFILE;
	public static $NO_SUCH_ORGANIZATION;
	public static $ACCOUNT_MODIFY_FAILED;
	public static $NO_SUCH_MASTER_ACCOUNT;
	public static $BAD_INPUT;
	public static $OPERATION_NOT_SUPPORTED;
	public static $BAD_CONFIGURATION;
	public static $REFUND_FAILED;
	public static $SUCCESS_BUT_ADDITIONAL_VALIDATION;
	public static $NO_SUCH_SITE;
	public static $SUCH_TRACK;
	public static $NO_MATCH_ON_USER;
	public static $MULTIPLE_USER_MATCHES;
	public static $PMS_COMMUNICATION_ERROR;
	public static $NO_SUCH_ROOM;
	public static $WRONG_GUEST_NAME;
	
	public static function _init()
	{
		self::$SUCCESS = self::enum(0, 'Success');
		self::$INTERNAL_ERROR = self::enum(100, 'Internal Error'); 
		self::$USER_NOT_FOUND = self::enum(101, 'User Not Found');
		self::$BAD_ARB_DATA = self::enum(102, 'Bad ARB Data'); 
		self::$BAD_BILLING_DATA = self::enum(103, 'Bad Billing Data'); 
		self::$AUTHENTICATION_FAILED = self::enum(104, 'Authentication Failed'); 
		self::$SETTLE_PURCHASE_FAILED = self::enum(105, 'Settle Purchase Failed');
		self::$BAD_PRODUCT_DATA = self::enum(106, 'Bad Product Data');
		self::$PREPARE_PURCHASE_FAILED = self::enum(107, 'Prepare Purchase Failed');
		self::$AUTHORIZE_PURCHASE_FAILED = self::enum(108, 'Authorize Purchase Failed');
		self::$PRODUCT_FAILED = self::enum(109, 'Product Failed');
		self::$INVALID_PARAMETER = self::enum(110, 'Invalid Parameter');
		self::$AUTHORIZATION_FAILED = self::enum(111, 'Authorization Failed');
		self::$FAILED_ACCOUNT_ACTIVE = self::enum(112, 'Failed Account Active');
		self::$FAILED_ACCOUNT_EXISTS = self::enum(114, 'Failed Account Exists');
		self::$SUCH_PROFILE = self::enum(116, 'Such Profile');
		self::$NO_SUCH_ORGANIZATION = self::enum(117, 'No Such Organization');
		self::$ACCOUNT_MODIFY_FAILED = self::enum(118, 'Account Modify Failed');
		self::$NO_SUCH_MASTER_ACCOUNT = self::enum(119, 'No Such Master Account');
		self::$BAD_INPUT = self::enum(120, 'Bad Input');
		self::$OPERATION_NOT_SUPPORTED = self::enum(121, 'Operation Not Supported');
		self::$BAD_CONFIGURATION = self::enum(122, 'Bad Configuration');
		self::$REFUND_FAILED = self::enum(123, 'Refund Failed');
		self::$SUCCESS_BUT_ADDITIONAL_VALIDATION = self::enum(124, 'Success, but additional user validation (such as 3D-Secure) is required to complete payment');
		self::$NO_SUCH_SITE = self::enum(125, 'No Such Site');
		self::$SUCH_TRACK = self::enum(126, 'Such Track');
		self::$NO_MATCH_ON_USER = self::enum(127, 'No Match On User');
		self::$MULTIPLE_USER_MATCHES = self::enum(128, 'Multiple User Matches');
		self::$PMS_COMMUNICATION_ERROR = self::enum(129, 'PMS Communication Error. Only used for PMS payments');
		self::$NO_SUCH_ROOM = self::enum(130, 'No Such Room. Only used for PMS payments');
		self::$WRONG_GUEST_NAME = self::enum(131, 'Wrong Guest Name. Only used for PMS payments');
	}
}

AptiloResultCode::_init();