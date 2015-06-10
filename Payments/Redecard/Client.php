<?php
namespace Payment\Redecard;

use Zend\View\Model\ViewModel;
use Zend\Soap\Client as SoapClient;

class Client
{

    private $method;
    private $params;
    protected static $options = array(
        'soap_version' => SOAP_1_1,
        //'wsdl' => 'https://ecommerce.userede.com.br/....asmx?WSDL',
    		'wsdl' => 'https://ecommerce.userede.com.br/....test.asmx?WSDL',
    		'uri' => 'https://ecommerce.userede.com.br',
        //'location' => 'https://ecommerce.userede.com.br/....asmx',
    		'location' => 'https://ecommerce.userede.com.br/....test.asmx',
    );

	public function request()
	{
	    $objClient = new SoapClient(self::$options['wsdl'], self::$options);
	    return $objClient->__call($this->method, $this->params);
	}

	public function setMethod($method)
	{
	    $this->method = $method;
	}

	public function setParams($params)
	{
	    $this->params = $params;
	}
}
