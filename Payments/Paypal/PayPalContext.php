<?php
namespace Payment\Paypal;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

abstract class PayPalContext
{
	private $strClientId;
	private $strClientSecret;
	private $context;

	public function __construct($strClientId, $strClientSecret)
    {
        $this->strClientId = $strClientId;
        $this->strClientSecret = $strClientSecret;
        $this->setContext();
    }
    
    public function getContext()
    {
    	return $this->context;
    }

    private function setContext()
    {
    	$this->context = new ApiContext(
    			new OAuthTokenCredential(
    					$this->strClientId,
    					$this->strClientSecret
    					)
    			);
     }
}
?>