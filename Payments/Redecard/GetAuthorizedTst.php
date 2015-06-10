<?php
namespace Payment\Redecard;

class GetAuthorizedTst
{
    private $params;
    private $method;
    private $client;

    public function __construct($objParams)
    {
        $this->method = 'GetAuthorizedTst';

        $this->params = array($this->method => array(
            'Total' 		=> empty($objParams['Total']) ? '' : $objParams['Total'],
            'Transacao' 	=> empty($objParams['Transacao']) ? '' : $objParams['Transacao'],
            'Parcelas' 		=> empty($objParams['Parcelas']) ? '' : $objParams['Parcelas'],
            'Filiacao' 		=> empty($objParams['Filiacao']) ? '' : $objParams['Filiacao'],
            'NumPedido' 	=> empty($objParams['NumPedido']) ? '' : $objParams['NumPedido'],
            'Nrcartao' 		=> empty($objParams['Nrcartao']) ? '' : $objParams['Nrcartao'],
            'CVC2'	 		=> empty($objParams['CVC2']) ? '' : $objParams['CVC2'],
            'Mes' 			=> empty($objParams['Mes']) ? '' : $objParams['Mes'],
            'Ano' 			=> empty($objParams['Total']) ? '' : $objParams['Total'],
            'Portador' 		=> empty($objParams['Ano']) ? '' : $objParams['Ano'],
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
            'ConfTxn' 		=> empty($objParams['ConfTxn']) ? '' : $objParams['ConfTxn'],
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
}