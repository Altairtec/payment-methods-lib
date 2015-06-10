<?php

namespace Payment\Aptilo;

use Payment\Aptilo\HTTP;
use Payment\Aptilo\WebService;
use Payment\Aptilo\WebService\Pas;
use Payment\Aptilo\HTTP\Opaque;
use Payment\Aptilo\WebService\ListProductsPas;
use Payment\Aptilo\WebService\ViewUserPas;

class AptiloApplication
{		
	private $pas;
	private $viewUserPas;
	private $opaque;
	private $listProducts;
	
	public function getViewUserPas($username)
	{	
		$this->pas = new Pas();
		$this->viewUserPas = new ViewUserPas($this->pas->viewUser($username));
		return $this->viewUserPas;	
	}
	
	public function getUserDataFieldValue($strName)
	{
		return $this->getUserDataFieldValue($strName);
	}
	
	public function getServiceProfile()
	{
		return $this->viewUserPas->getServiceProfile();
	}
	
	public function getRemainTime()
	{
		return $this->viewUserPas->getRemainTime();		
	}

	public function purchase($track, $productId, array $productOption, array $paymentOption)
	{
		return $this->pas->purchase($track, $productId, $productOption, $paymentOption);
	}
	
	public function login($username, $password)
	{
		$this->opaque = new Opaque();
		return $this->opaque->login($username, $password);
	}
	
	public function modifyServiceProfile(array $arrUser, array $arrServiceProfile)
	{
		return $this->pas->modifyServiceProfile($arrUser, $arrServiceProfile);	
	}
	
	public function getProducts($serviceManager)
	{
		$this->pas = new Pas();
		$arrTrackname = $serviceManager->get('Application\Model\AptiloProductTable')->getPaidAptiloProductKeys();
		
		foreach ($arrTrackname as $k => $v)
			$arrTrack[] = $v['track_name'];
			
		$arrTrack = array_unique($arrTrack);
			
		foreach ($arrTrack as $key => $value) {
			$this->listProducts = new ListProductsPas($this->pas->listProducts($value, 'paymentapi'));
			$objProducts[$value] = $this->listProducts->getPaidProducts();
		}
			
		foreach ($objProducts as $k => $v) {
			foreach ($v as $value) {
				$arrProducts[] = array("track" => $k, "name" => $value->name, "product_id" => $value->code, "cost" => $value->cost);
			}
		}
	
		return $arrProducts;
	}	

	public function returnByPasApiInterface(\stdClass $result)
	{
		return $this->pas->returnByPasApiInterface($result);				
	}

}