<?php
namespace Payment\Paypal;

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Payment\Payments\Constants\PaymentsConstants;
use Payment\PayPal\Constants\PayPalResultCode;

class PayPalPayments extends PayPalContext
{
	private $strPaymentMethod;
	private $arrItens = array();
	private $dobShipping;
	private $dobTax;
	private $strAmountCurrency;
	private $strTransactionDescription;
	private $strReturnUrl;
	private $strCancelUrl;
	private $strIntent;

	public function __construct($strClientId, $strClientSecret)
	{
		parent::__construct($strClientId, $strClientSecret);
	}

	public function getPaymentMethod()
	{
		return $this->strPaymentMethod;
	}

	public function setPaymentMethod($strPaymentMethod)
	{
		$this->strPaymentMethod = $strPaymentMethod;
		return $this;
	}

	public function addItem($arrItem = null)
	{
		if (!empty($arrItem))
		{
			array_push($this->arrItens, $arrItem);
		}

		return $this;
	}

	public function removeItem($arrItem = null)
	{
		if (!empty($arrItem)) {
			$key = array_search($arrItem, $this->arrItens);

			if(!empty($key))
				unset($this->arrItens[$key]);
		}
	}

	public function getItens()
	{
		return $this->arrItens;
	}

	public function getShipping()
	{
		return $this->dobShipping;
	}

	public function setShipping($dobShipping)
	{
		$this->dobShipping = $dobShipping;
		return $this;
	}

	public function getTax()
	{
		return $this->dobTax;
	}

	public function setTax($dobTax)
	{
		$this->dobTax = $dobTax;
		return $this;
	}

	public function getAmountCurrency()
	{
		return $this->strAmountCurrency;
	}

	public function setAmountCurrency($strAmountCurrency)
	{
		$this->strAmountCurrency = $strAmountCurrency;
		return $this;
	}

	public function getTransactionDescription()
	{
		return $this->strTransactionDescription;
	}

	public function setTransactionDescription($strTransactionDescription)
	{
		$this->strTransactionDescription = $strTransactionDescription;
		return $this;
	}

	public function getReturnUrl()
	{
		return $this->strReturnUrl;
	}

	public function setReturnUrl($strReturnUrl)
	{
		$this->strReturnUrl = $strReturnUrl;
		return $this;
	}

	public function getCancelUrl()
	{
		return $this->strCancelUrl;
	}

	public function setCancelUrl($strCancelUrl)
	{
		$this->strCancelUrl = $strCancelUrl;
		return $this;
	}

	public function getIntent()
	{
		return $this->strIntent;
	}

	public function setIntent($strIntent)
	{
		$this->strIntent = $strIntent;
		return $this;
	}

	private function arrayItensToItem()
	{
		$arrItens = array();

		foreach ($this->arrItens as $arrItem)
		{
			$objItem = new Item();
			$objItem->setName($arrItem['Name'])->
			setCurrency($arrItem['Currency'])->
			setQuantity($arrItem['Quantity'])->
			setPrice(number_format($arrItem['Price'], 2));

			array_push($arrItens, $objItem);
		}

		return $arrItens;
	}

	public function createPayment()
	{
		$objPayer = new Payer();
		$objPayer->setPaymentMethod($this->strPaymentMethod);

		$objItemList = new ItemList();
		$objItemList->setItems($this->arrayItensToItem());

		$dobSubTotal = 0;
		foreach ($objItemList->getItems() as $value)
		{
			$dobSubTotal += $value->getPrice();
		}

		$objDetails = new Details();
		$objDetails->setShipping(number_format($this->dobShipping, 2))->
		setTax(number_format($this->dobTax, 2))->
		setSubtotal(number_format($dobSubTotal, 2));

		$objAmount = new Amount();
		$objAmount->setCurrency($this->strAmountCurrency);

		$dobTotal = $objDetails->getShipping() +
		$objDetails->getTax() +
		$objDetails->getSubtotal();

		$objAmount->setTotal(number_format($dobTotal, 2))->
		setDetails($objDetails);

		$objTransaction = new Transaction();
		$objTransaction->setAmount($objAmount)->
		setItemList($objItemList)->
		setDescription($this->strTransactionDescription)->
		setInvoiceNumber(uniqid());

		$objRedirectUrls = new RedirectUrls();
		$objRedirectUrls->setReturnUrl($this->strReturnUrl)->
		setCancelUrl($this->strCancelUrl);

		$objPayment = new Payment();
		$objPayment->setIntent($this->strIntent)->
		setPayer($objPayer)->
		setRedirectUrls($objRedirectUrls)->
		setTransactions(array($objTransaction));

		try
		{
			$objPayment->create(parent::getContext());
			return array('approvalUrl' => $objPayment->getApprovalLink(), 'payment' => $objPayment);
		}
		catch (\Exception $ex)
		{
			throw $ex;
		}
	}

	public function executePayment($strSuccess, $strPaymentId, $strPayerId)
	{
		if ($strSuccess == 'true')
		{
			$payment = Payment::get($strPaymentId, parent::getContext());
			$execution = new PaymentExecution();
			$execution->setPayerId($strPayerId);

			try
			{
				$payment->execute($execution, parent::getContext());
				$payment = $this->getPayment($strPaymentId);
				return array('payment' => $payment);
			}
			catch (\Exception $ex)
			{
				throw $ex;
			}
		}
		else
		{
			throw new \Exception(PayPalResultCode::$TRANSACAO_NEGADA->getDescription(), 
					PayPalResultCode::$TRANSACAO_NEGADA->getCode());
		}
	}

	public function getPayment($strPaymentId)
	{
		try
		{
			return Payment::get($strPaymentId, parent::getContext());
		}
		catch (\Exception $ex)
		{
			throw $ex;
		}
	}
}
?>