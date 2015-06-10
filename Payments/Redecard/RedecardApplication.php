<?php

namespace Payment\Redecard;

class RedecardApplication
{		
	private $authorized;
	private $arrParams;

	public function getAuthorized($arrParams)
	{	
		$this->arrParams = $arrParams;
		$this->authorized = new GetAuthorized($this->arrParams);
		return $this->authRequest();
	}
	
	private function authRequest()
	{	
		$data = $this->authorized->request();
		//return $data->GetAuthorizedResult->any; 
		return $data->GetAuthorizedTstResult->any;
	}
	
	public function getRedecardDataUpdate($xmlData)
	{
		$xml  = simplexml_load_string($xmlData);
		return array(
				'data' 		=> $xml->DATA,
				'numCartao'	=> null,
				'origemBin' => $xml->ORIGEM_BIN,
				'numAutor' 	=> $xml->NUMAUTOR,
				'numCv' 	=> $xml->NUMCV,
				'numAutent' => $xml->NUMAUTENT,
				'numSqn' 	=> $xml->NUMSQN,
				'codret' 	=> $xml->CODRET,
				'msgret' 	=> $this->authorized->strEncode($xml->MSGRET),
				'numPedido' => $this->arrParams['NumPedido'],
				'username'	=> null,
		);		
	}
	
}