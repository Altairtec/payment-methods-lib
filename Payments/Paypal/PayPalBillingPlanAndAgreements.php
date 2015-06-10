<?php

namespace Payment\Paypal;

use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\ChargeModel;
use PayPal\Api\MerchantPreferences;
use Payment\Paypal\ResultPrinter;
use PayPal\Api\Currency;
use PayPal\Api\Patch;
use PayPal\Common\PayPalModel;
use PayPal\Api\PatchRequest;
use PayPal\Api\Agreement;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Payer;
use PayPal\Api\AgreementStateDescriptor;

class PayPalBillingPlanAndAgreements extends PayPalContext
{	
	//propertiers
	private $objPlan;
	private $objAgreement;
	
	//createBillingPlan
	private $strPlanName;
	private $strPlanDescription;
	private $strPlanType;
	private $strPaymentDefinitionName;
	private $strPaymentDefinitionType;
	private $strPaymentDefinitionFrequency;
	private $strPaymentDefinitionFrequencyInterval;
	private $strPaymentDefinitionCycles;
	private $objPaymentDefinitionAmount;
	private $strChangeModelType;
	private $objChangeModelAmount;
	private $strMerchantPreferencesReturnUrl;
	private $strMerchantPreferencesCancelUrl;
	private $strMerchantPreferencesAutoBillAmount;
	private $strMerchantPreferencesInitialFailAmountAction;
	private $strMerchantPreferencesMaxFailAttempts;
	private $objMerchantPreferencesSetupFee;	
	
	//createBillingAgreement
	private $strAgreementName;
	private $strAgreementDescription;
	private $strAgreementDate;
	private $strPayerPaymentMethod;
	private $strShippingAddressLine1;
	private $strShippingAddressCity;
	private $strShippingAddressState;
	private $strShippingAddressPostalCode;
	private $strShippingAddressCountryCode;
	
	//getListBillingPlans
	private $strBillingPlanStatus;
	private $strBillingPlanPageSize;
	
	//searchBillingTransactions
	private $strStartDate;
	private $strEndDate;		
	
	public function __construct($strClientId, $strClientSecret)
	{
		parent::__construct($strClientId, $strClientSecret);
		$this->objPlan = new Plan();
		$this->objAgreement = new Agreement();
	}

	//gettersAndSetters
	public function getPlan()
	{
		return $this->objPlan;
	}
	
	public function setPlan($objPlan)
	{
		$this->objPlan = $objPlan;
		return $this;
	}

	public function getPlanName()
	{
		return $this->strPlanName;
	}

	public function setPlanName($strPlanName)
	{
		$this->strPlanName = $strPlanName;
		return $this;
	}

	public function getPlanDescription()
	{
		return $this->strPlanDescription;
	}

	public function setPlanDescription($strPlanDescription)
	{
		$this->strPlanDescription = $strPlanDescription;
		return $this;
	}

	public function getPlanType()
	{
		return $this->strPlanType;
	}

	public function setPlanType($strPlanType)
	{
		$this->strPlanType = $strPlanType;
		return $this;
	}

	public function getPaymentDefinitionName()
	{
		return $this->strPaymentDefinitionName;
	}

	public function setPaymentDefinitionName($strPaymentDefinitionName)
	{
		$this->strPaymentDefinitionName = $strPaymentDefinitionName;
		return $this;
	}

	public function getPaymentDefinitionType()
	{
		return $this->strPaymentDefinitionType;
	}

	public function setPaymentDefinitionType($strPaymentDefinitionType)
	{
		$this->strPaymentDefinitionType = $strPaymentDefinitionType;
		return $this;
	}

	public function getPaymentDefinitionFrequency()
	{
		return $this->strPaymentDefinitionFrequency;
	}
	
	public function setPaymentDefinitionFrequency($strPaymentDefinitionFrequency)
	{
		$this->strPaymentDefinitionFrequency = $strPaymentDefinitionFrequency;
		return $this;
	}
	
	public function getPaymentDefinitionFrequencyInterval()
	{
		return $this->strPaymentDefinitionFrequencyInterval;
	}
	
	public function setPaymentDefinitionFrequencyInterval($strPaymentDefinitionFrequencyInterval)
	{
		$this->strPaymentDefinitionFrequencyInterval = $strPaymentDefinitionFrequencyInterval;
		return $this;
	}
	
	public function getPaymentDefinitionCycles()
	{
		return $this->strPaymentDefinitionCycles;
	}
	
	public function setPaymentDefinitionCycles($strPaymentDefinitionCycles)
	{
		$this->strPaymentDefinitionCycles = $strPaymentDefinitionCycles;
		return $this;
	}

	public function getPaymentDefinitionAmount()
	{
		return $this->objPaymentDefinitionAmount;
	}
	
	public function setPaymentDefinitionAmount($objPaymentDefinitionAmount)
	{
		$this->objPaymentDefinitionAmount = $objPaymentDefinitionAmount;
		return $this;
	}
	
	public function getChangeModelType()
	{
		return $this->strChangeModelType;
	}
	
	public function setChangeModelType($strChangeModelType)
	{
		$this->strChangeModelType = $strChangeModelType;
		return $this;
	}
	
	public function getChangeModelAmount()
	{
		return $this->objChangeModelAmount;
	}
	
	public function setChangeModelAmount($objChangeModelAmount)
	{
		$this->objChangeModelAmount = $objChangeModelAmount;
		return $this;
	}
	
	public function getMerchantPreferencesReturnUrl()
	{
		return $this->strMerchantPreferencesReturnUrl;
	}
	
	public function setMerchantPreferencesReturnUrl($strMerchantPreferencesReturnUrl)
	{
		$this->strMerchantPreferencesReturnUrl = $strMerchantPreferencesReturnUrl;
		return $this;
	}
	
	public function getMerchantPreferencesCancelUrl()
	{
		return $this->strMerchantPreferencesCancelUrl;
	}
	
	public function setMerchantPreferencesCancelUrl($strMerchantPreferencesCancelUrl)
	{
		$this->strMerchantPreferencesCancelUrl = $strMerchantPreferencesCancelUrl;
		return $this;
	}
	
	public function getMerchantPreferencesAutoBillAmount()
	{
		return $this->strMerchantPreferencesAutoBillAmount;
	}
	
	public function setMerchantPreferencesAutoBillAmount($strMerchantPreferencesAutoBillAmount)
	{
		$this->strMerchantPreferencesAutoBillAmount = $strMerchantPreferencesAutoBillAmount;
		return $this;
	}
	
	public function getMerchantPreferencesInitialFailAmountAction()
	{
		return $this->strMerchantPreferencesInitialFailAmountAction;
	}
	
	public function setMerchantPreferencesInitialFailAmountAction($strMerchantPreferencesInitialFailAmountAction)
	{
		$this->strMerchantPreferencesInitialFailAmountAction = $strMerchantPreferencesInitialFailAmountAction;
		return $this;
	}
	
	public function getMerchantPreferencesMaxFailAttempts()
	{
		return $this->strMerchantPreferencesMaxFailAttempts;
	}
	
	public function setMerchantPreferencesMaxFailAttempts($strMerchantPreferencesMaxFailAttempts)
	{
		$this->strMerchantPreferencesMaxFailAttempts = $strMerchantPreferencesMaxFailAttempts;
		return $this;
	}
	
	public function getMerchantPreferencesSetupFee()
	{
		return $this->objMerchantPreferencesSetupFee;
	}
	
	public function setMerchantPreferencesSetupFee($objMerchantPreferencesSetupFee)
	{
		$this->objMerchantPreferencesSetupFee = $objMerchantPreferencesSetupFee;
		return $this;
	}
	
	public function getAgreementName()
	{
		return $this->strAgreementName;
	}
	
	public function setAgreementName($strAgreementName)
	{
		$this->strAgreementName = $strAgreementName;
		return $this;
	}
	
	public function getAgreementDescription()
	{
		return $this->strAgreementDescription;
	}
	
	public function setAgreementDescription($strAgreementDescription)
	{
		$this->strAgreementDescription = $strAgreementDescription;
		return $this;
	}
	
	public function getAgreementDate()
	{
		return $this->strAgreementDate;
	}
	
	public function setAgreementDate($strAgreementDate)
	{
		$this->strAgreementDate = $strAgreementDate;
		return $this;
	}
	
	public function getPayerPaymentMethod()
	{
		return $this->strPayerPaymentMethod;
	}
	
	public function setPayerPaymentMethod($strPayerPaymentMethod)
	{
		$this->strPayerPaymentMethod = $strPayerPaymentMethod;
		return $this;
	}
	
	public function getShippingAddressLine1()
	{
		return $this->strShippingAddressLine1;
	}
	
	public function setShippingAddressLine1($strShippingAddressLine1)
	{
		$this->strShippingAddressLine1 = $strShippingAddressLine1;
		return $this;
	}
		
	public function getShippingAddressCity()
	{
		return $this->strShippingAddressCity;
	}
	
	public function setShippingAddressCity($strShippingAddressCity)
	{
		$this->strShippingAddressCity = $strShippingAddressCity;
		return $this;
	}
	
	public function getShippingAddressState()
	{
		return $this->strShippingAddressState;
	}
	
	public function setShippingAddressState($strShippingAddressState)
	{
		$this->strShippingAddressState = $strShippingAddressState;
		return $this;
	}
	
	public function getShippingAddressPostalCode()
	{
		return $this->strShippingAddressPostalCode;
	}
	
	public function setShippingAddressPostalCode($strShippingAddressPostalCode)
	{
		$this->strShippingAddressPostalCode = $strShippingAddressPostalCode;
		return $this;
	}
	
	public function getShippingAddressCountryCode()
	{
		return $this->strShippingAddressCountryCode;
	}
	
	public function setShippingAddressCountryCode($strShippingAddressCountryCode)
	{
		$this->strShippingAddressCountryCode = $strShippingAddressCountryCode;
		return $this;
	}
	
	public function getBillingPlanStatus()
	{
		return $this->strBillingPlanStatus;
	}
	
	public function setBillingPlanStatus($strBillingPlanStatus)
	{
		$this->strBillingPlanStatus = $strBillingPlanStatus;
		return $this;
	}
	
	public function getBillingPlanPageSize()
	{
		return $this->strBillingPlanPageSize;
	}
	
	public function setBillingPlanPageSize($strBillingPlanPageSize)
	{
		$this->strBillingPlanPageSize = $strBillingPlanPageSize;
		return $this;
	}
	
	public function getStartDate()
	{
		return $this->strStartDate;
	}
	
	public function setStartDate($strStartDate)
	{
		$this->strStartDate = $strStartDate;
		return $this;
	}
	
	public function getEndDate()
	{
		return $this->strEndDate;
	}
	
	public function setEndDate($strEndDate)
	{
		$this->strEndDate = $strEndDate;
		return $this;
	}
	
	//methods	
	public function createBillingPlan() {
		$objPlan = new Plan();
		
		$objPlan->setName($this->strPlanName)
		->setDescription($this->strPlanDescription)
		->setType($this->strPlanType);
		
		$objPaymentDefinition = new PaymentDefinition();
		
		$objPaymentDefinition->setName($this->strPaymentDefinitionName)
		->setType($this->strPaymentDefinitionType)
		->setFrequency($this->strPaymentDefinitionFrequency)
		->setFrequencyInterval($this->strPaymentDefinitionFrequencyInterval)
		->setCycles($this->strPaymentDefinitionCycles)
		->setAmount($this->objPaymentDefinitionAmount);
		
		$objChargeModel = new ChargeModel();
		$objChargeModel->setType($this->strChangeModelType)
		->setAmount($this->objChangeModelAmount);
		
		$objPaymentDefinition->setChargeModels(array($objChargeModel));
		
		$objMerchantPreferences = new MerchantPreferences();

		$objMerchantPreferences->setReturnUrl($this->strMerchantPreferencesReturnUrl)
		->setCancelUrl($this->strMerchantPreferencesCancelUrl)
		->setAutoBillAmount($this->strMerchantPreferencesAutoBillAmount)
		->setInitialFailAmountAction($this->strMerchantPreferencesInitialFailAmountAction)
		->setMaxFailAttempts($this->strMerchantPreferencesMaxFailAttempts)
		->setSetupFee($this->objMerchantPreferencesSetupFee);
		
		$objPlan->setPaymentDefinitions(array($objPaymentDefinition));
		$objPlan->setMerchantPreferences($objMerchantPreferences);
		
		try {
			return $objPlan->create(parent::getContext());		
		} catch (\Exception $ex) {
			throw $ex;			
		}
	}
	
	public function updateActivePlan($strIdPlan)
	{
		try {
			$this->objPlan->setId($strIdPlan);
				
			$objPatch = new Patch();
			$objValue = new PayPalModel('{ "state":"ACTIVE" }');
	
			$objPatch->setOp('replace')
			->setPath('/')
			->setValue($objValue);
			$objPatchRequest = new PatchRequest();
			$objPatchRequest->addPatch($objPatch);
	
			$this->objPlan->update($objPatchRequest, parent::getContext());
			return Plan::get($this->objPlan->getId(), parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	public function updatePlanPaymentDefinitionsAmount($strIdPlan)
	{
		try {
			$this->objPlan = Plan::get($strIdPlan, parent::getContext());
			$objPatch = new Patch();
	
			$objPaymentDefinitions = $this->objPlan->getPaymentDefinitions();
			$strPaymentDefinitionId = $objPaymentDefinitions[0]->getId();
			$objPatch->setOp('replace')
			->setPath('/payment-definitions/' . $strPaymentDefinitionId)
			->setValue(json_decode(
					'{
                    "name": "' . $this->strPaymentDefinitionName . '",
                    "frequency": "' . $this->strPaymentDefinitionFrequency . '",
                    "amount": {
                        "currency": "' . $this->objPaymentDefinitionAmount->currency . '",
                        "value": "' . $this->objPaymentDefinitionAmount->value . '"
			
                    }
				}'));
				
			$objPatchRequest = new PatchRequest();
			$objPatchRequest->addPatch($objPatch);
	
			$this->objPlan->update($objPatchRequest, parent::getContext());
			return Plan::get($this->objPlan->getId(), parent::getContext());
		} catch (Exception $ex) {
			throw  $ex;
		}
	}
	
	public function getBillingPlan($strIdPlan)
	{
		try {
			$this->objPlan->setId($strIdPlan);
			return Plan::get($this->objPlan->getId(), parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	public function getListBillingPlans()
	{
		try {
			$arrParams = array('page_size' => $this->strBillingPlanPageSize, 'status' => $this->strBillingPlanStatus);
			return Plan::all($arrParams, parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}	
	
	public function deleteBillingPlan($strIdPlan)
	{
		try {
			$this->objPlan->setId($strIdPlan);
			return $this->objPlan->delete(parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	public function createBillingAgreement($strIdPlan)
	{
		$this->objPlan->setId($strIdPlan);
		$objAgreement = new Agreement();
	
		$objAgreement->setName($this->strAgreementName)
		->setDescription($this->strAgreementDescription)
		->setStartDate($this->strAgreementDate);
	
		$objPlan = new Plan();
		$objPlan->setId($this->objPlan->getId());
		$objAgreement->setPlan($objPlan);
	
		$objPayer = new Payer();
		$objPayer->setPaymentMethod($this->strPayerPaymentMethod);
		$objAgreement->setPayer($objPayer);
	
		$objShippingAddress = new ShippingAddress();
		$objShippingAddress->setLine1($this->strShippingAddressLine1)
		->setCity($this->strShippingAddressCity)
		->setState($this->strShippingAddressState)
		->setPostalCode($this->strShippingAddressPostalCode)
		->setCountryCode($this->strShippingAddressCountryCode);
		$objAgreement->setShippingAddress($objShippingAddress);
			
		try {
			return $objAgreement->create(parent::getContext());
		} catch (\Exception $ex) {
			throw $ex;
		}
	}
		
	public function executeBillingAgreement($strSuccess, $strToken)
	{
		if ($strSuccess == 'true') {
			$objAgreement = new Agreement();
			try {
				$objAgreement->execute($strToken, parent::getContext());
				return $this->getBillingAgreement($objAgreement);
			} catch (Exception $ex) {
				throw $ex;
			}
		} else {
			throw new \Exception('Operation aborted by the system', 7077, null);
		}
	}
	
	public function getBillingAgreement($strIdAgreement)
	{
		try {
			$this->objAgreement->setId($strIdAgreement);
			return Agreement::get($this->objAgreement->getId(), parent::getContext());
		} catch (\Exception $ex) {
			throw $ex;
		}
	}
	
	public function searchBillingTransactions($strIdAgreement)
	{
		$this->objAgreement->setId($strIdAgreement);
	
		$arrParams = array('start_date' => $this->strStartDate, 
				'end_date' => $this->strEndDate);
		
		try {
			return Agreement::searchTransactions($this->objAgreement->getId(), $arrParams, parent::getContext());
		} catch (\Exceptiontion $ex) {
			throw $ex;
		}
	}
	
	public function updateBillingAgreement($strIdAgreement)
	{
		$this->objAgreement->setId($strIdAgreement);
		$objPatch = new Patch();
	
		$objPatch->setOp('replace')
		->setPath('/')
		->setValue(json_decode('{
            "description": "' . $this->strAgreementName . '",
            "shipping_address": {
                "line1": "' . $this->strShippingAddressLine1 . '",
                "city": "' . $this->strShippingAddressCity . '",
                "state": "' . $this->strShippingAddressState . '",
                "postal_code": "' . $this->strShippingAddressPostalCode . '",
                "country_code": "' . $this->strShippingAddressCountryCode . '"
            }
        }'));
		$objPatchRequest = new PatchRequest();
		$objPatchRequest->addPatch($objPatch);
		try {
			$this->objAgreement->update($objPatchRequest, parent::getContext());
			return Agreement::get($this->objAgreement->getId(), parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	public function suspendBillingAgreement($strIdAgreement)
	{
		$this->objAgreement->setId($strIdAgreement);
		$objAgreementStateDescriptor = new AgreementStateDescriptor();
		$objAgreementStateDescriptor->setNote("Suspending the agreement");
	
		try {
			$this->objAgreement->suspend($objAgreementStateDescriptor, parent::getContext());
			return Agreement::get($this->objAgreement->getId(), parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
	public function reactivateBillingAgreement($strIdAgreement)
	{
		$this->objAgreement->setId($strIdAgreement);
		$objAgreementStateDescriptor = new AgreementStateDescriptor();
		$objAgreementStateDescriptor->setNote("Reactivating the agreement");
	
		try {
			$this->objAgreement->reActivate($objAgreementStateDescriptor, parent::getContext());
			return Agreement::get($this->objAgreement->getId(), parent::getContext());
		} catch (Exception $ex) {
			throw $ex;
		}
	}
	
}

?>
