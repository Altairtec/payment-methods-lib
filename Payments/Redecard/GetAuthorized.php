<?php
namespace Payment\Redecard;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

class GetAuthorized
{
    private $params;
    private $method;
    private $client;

    public function __construct($objParams)
    {
        //$this->method = 'GetAuthorized';
    	$this->method = 'GetAuthorizedTst';

        $this->params = array($this->method => array(
            'Total' 		=> empty($objParams['Total']) ? '0.00' : $objParams['Total'],
            'Transacao' 	=> empty($objParams['Transacao']) ? '00' : $objParams['Transacao'],
            'Parcelas' 		=> empty($objParams['Parcelas']) ? '00' : $objParams['Parcelas'],
            'Filiacao' 		=> empty($objParams['Filiacao']) ? '00000000' : $objParams['Filiacao'],
            'NumPedido' 	=> empty($objParams['NumPedido']) ? '0' : $objParams['NumPedido'],
            'Nrcartao' 		=> empty($objParams['Nrcartao']) ? '0' : $objParams['Nrcartao'],
            'CVC2'	 		=> empty($objParams['CVC2']) ? '000' : $objParams['CVC2'],
            'Mes' 			=> empty($objParams['Mes']) ? '00' : $objParams['Mes'],
            'Ano' 			=> empty($objParams['Ano']) ? '00' : $objParams['Ano'],
            'Portador' 		=> empty($objParams['Portador']) ? '0' : $objParams['Portador'],
            'IATA' 			=> empty($objParams['IATA']) ? '' : $objParams['IATA'],
            'Distribuidor' 	=> empty($objParams['Distribuidor']) ? '' : $objParams['Distribuidor'],
            'Concentrador' 	=> empty($objParams['Concentrador']) ? '' : $objParams['Concentrador'],
            'TaxaEmbarque'	=> empty($objParams['TaxaEmbarque']) ? '' : $objParams['TaxaEmbarque'],
            'Entrada' 		=> empty($objParams['Entrada']) ? '' : $objParams['Entrada'],
            'Pax1' 			=> empty($objParams['Pax1']) ? '' : $objParams['Pax1'],
            'Pax2' 			=> empty($objParams['Pax2']) ? '' : $objParams['Pax2'],
            'Pax3' 			=> empty($objParams['Pax3']) ? '' : $objParams['Pax3'],
            'Pax4' 			=> empty($objParams['Pax4']) ? '' : $objParams['Pax4'],
            'Numdoc1' 		=> empty($objParams['Numdoc1']) ? '' : $objParams['Numdoc1'],
            'Numdoc2' 		=> empty($objParams['Numdoc2']) ? '' : $objParams['Numdoc2'],
            'Numdoc3' 		=> empty($objParams['Numdoc3']) ? '' : $objParams['Numdoc3'],
            'Numdoc4' 		=> empty($objParams['Numdoc4']) ? '' : $objParams['Numdoc4'],
            'ConfTxn' 		=> empty($objParams['ConfTxn']) ? '0' : $objParams['ConfTxn'],
            'AddData' 		=> empty($objParams['AddData']) ? '' : $objParams['AddData'],
        ));

        $this->client = new Client();
    }

    public function setTotal($dobTotal)
    {
        $this->dobTotal = $dobTotal;
    }

    public function request()
    {
        $this->client->setMethod($this->method);
        $this->client->setParams($this->params);
        return $this->client->request();
    }
    
    public function strEncode($str) 
    {
        $str = preg_replace("*",urldecode($str));
        return utf8_encode($str);
    }
}