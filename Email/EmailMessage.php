<?php

namespace Payment\Email;

use Payment\Payments\Constants\PaymentsConstants;

class EmailMessage
{
	private $toName;
	private $toEmail;
	private $plan;
	private $value;
	private $paymentId;
	private $orderNumber;
	private $numAutent;
	private $numAutor;
	private $flag;
	private $macAddress;	
	private $subject;	
	private $fromName = 'Teste Payments';
	private $fromEmail;
	private $cC;
	private $type = 'text/plain';
	private $charset = 'UTF-8';
	private $paymentMethod;	
	private $codret;
	private $msgret;
	private $origemBin;
	private $uip;
	private $rn;
	private $phone;
	private $payPalSuccess;
	private $payPalMessage;
	private $payPalCode;
	private $resultCode;
	private $resultString;	
		
	public function getToName()
	{
		return $this->toName;
	}
	
	public function setToName($toName)
	{
		$this->toName = $toName;
		return $this;
	}
	
	public function getToEmail()
	{
		return $this->toEmail;
	}
	
	public function setToEmail($toEmail)
	{
		$this->toEmail = $toEmail;
		return $this;
	}	
	
	public function getPlan()
	{
		return $this->plan;
	}
	
	public function setPlan($plan)
	{
		$this->plan = $plan;
		return $this;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}
	
	public function getPaymentId()
	{
		return $this->paymentId;
	}
	
	public function setPaymentId($paymentId)
	{
		$this->paymentId = $paymentId;
		return $this;
	}
	
	public function getOrderNumber()
	{
		return $this->orderNumber;
	}
	
	public function setOrderNumber($orderNumber)
	{
		$this->orderNumber = $orderNumber;
		return $this;
	}
	
	public function getNumAutent()
	{
		return $this->numAutent;
	}
	
	public function setNumAutent($numAutent)
	{
		$this->numAutent = $numAutent;
		return $this;
	}
	
	public function getNumAutor()
	{
		return $this->numAutor;
	}
	
	public function setNumAutor($numAutor)
	{
		$this->numAutor = $numAutor;
		return $this;
	}	
	
	public function getFlag()
	{
		return $this->flag;
	}
	
	public function setFlag($flag)
	{
		$this->flag = $flag;
		return $this;
	}
	
	public function getMacAddress()
	{
		return $this->macAddress;
	}
	
	public function setMacAddress($macAddress)
	{
		$this->macAddress = $macAddress;
		return $this;
	}
	
	public function getSubject()
	{
		return $this->subject;
	}
	
	public function getEmailMessage($paymentMethod)
	{	
		$emailMessage = $this->toName . ", \n\n" .
				"A Teste Payments agradece pelo seu pagamento.  " . "\n\n" .
				"Seguem dados da sua compra:" . "\n\n";
		
		if ($paymentMethod == PaymentsConstants::PAYPAL_METHOD)
			$emailMessage .= "N° do Pagamento: " . $this->paymentId ."\n";
		elseif ($paymentMethod == PaymentsConstants::REDECARD_METHOD)
		$emailMessage .= "N° Pedido : " . $this->orderNumber ."\n";
		
		$emailMessage .= "Plano adquirido: " . $this->plan ."\n" .
				"Valor: R$ " . str_replace(".", ",", $this->value) ."\n" .
				"Data: " . date('d/m/Y H:i:s') ."\n";
		
		if ($paymentMethod == PaymentsConstants::PAYPAL_METHOD)
			$emailMessage .= "Meio de Pagamento: PayPal" . "\n";
		elseif ($paymentMethod == PaymentsConstants::REDECARD_METHOD) 
			$emailMessage .= "N° Autenticação: " . $this->numAutent ."\n" . 
				"N° Autorização: " . $this->numAutor ."\n" .
				"Meio de Pagamento: Redecard / " . $this->flag . "\n";
		
		$emailMessage .= "E-mail cadastrado:  " . $this->toEmail . "\n" .
				"Macaddress dispositivo:  " . $this->macAddress . "\n\n" .
				"Atenciosamente, " . "\n\n" .
				"Pagamentos " . "\n\n" .
				"Fone: 99 9999-8888 / 5555-2323";
		
		return $emailMessage;
	}
	
	public function getEmailMessageErro($paymentMethod)
	{
		$emailMessage = $paymentMethod . ": Tentativa de compra sem sucesso! " . "\n\n" . 
				"Dados do usuário:" . "\n";
		
		if ($paymentMethod == PaymentsConstants::PAYPAL_METHOD) 
			$emailMessage .= "Nº do Pagamento: " . $this->paymentId . "\n" . 
					"Status: " . $this->payPalSuccess . "\n" .
					"Cód Retorno: " . $this->payPalCode . "\n" . 
					"Msg Retorno: " . $this->payPalMessage . "\n";
		else if ($paymentMethod == PaymentsConstants::REDECARD_METHOD) 
			$emailMessage .= "Pedido: " . $this->orderNumber . "\n" .
					"Cód Retorno: " . $this->codret . "\n" .
					"Msg Retorno: " . $this->msgret . "\n" .
					"Origem BIN:  " .  $this->origemBin . "\n";
		
		$emailMessage .= "Username: " . $this->toEmail . "\n" . 
				"UIP: " . $this->uip . "\n" . 
				"RN: " . $this->rn . "\n" . 
				"MAC : " . $this->macAddress . "\n" . 
				"Telefone: " . $this->phone;
		
		return $emailMessage;
	}
	
	public function getEmailMessageAptiloErro($paymentMethod)
	{
		$emailMessage = "Aptilo: Tentativa de compra de créditos sem sucesso! \n\n" . 
				"Método de pagamento: " . $paymentMethod . "\n" . 
				"Dados do usuário \n" . 
				"Username: " . $this->toEmail . "\n"; 

		if ($paymentMethod == PaymentsConstants::PAYPAL_METHOD) 
			$emailMessage .= "Nº do Pagamento: " . $this->paymentId . "\n";
		else if ($paymentMethod == PaymentsConstants::REDECARD_METHOD) { 
			$emailMessage .= "Cód Retorno Redecard: " . $this->codret . "\n" . 
					"Msg Retorno Redecard: " . $this->msgret . "\n";
		}
		
		$emailMessage .= "Result Code Aptilo: " . $this->resultCode . "\n" . 
				"Result String Aptilo: " . $this->resultString . "\n" . 
				"UIP: " . $this->uip . "\n" . 
				"RN: " . $this->rn . "\n" . 
				"MAC : " . $this->macAddress . "\n\n" .
				"Transação realizada e aprovada pela Redecard.";
	
		return $emailMessage;
	}	
	
	public function getFromName()
	{
		return $this->fromName;
	}
	
	public function getFromEmail()
	{
		return $this->fromEmail;
	}
	
	public function getCc()
	{
		return $this->cC;
	}
	
	public function getType()
	{
		return $this->type;
	}	
	
	public function getCharset()
	{
		return $this->charset;
	}
	
	public function getPaymentMethod()
	{
		return $this->paymentMethod;
	}
	
	public function setPaymentMethod($paymentMethod)
	{
		$this->paymentMethod = $paymentMethod; 
		return $this;		
	}
	
	public function getCodret()
	{
		return $this->codret;
	}
	
	public function setCodret($codret)
	{
		$this->codret = $codret;
		return $this;
	}
	
	public function getMsgret()
	{
		return $this->msgret;
	}
	
	public function setMsgret($msgret)
	{
		$this->msgret = $msgret;
		return $this;
	}
	
	public function getOrigemBin()
	{
		return $this->origemBin;
	}
	
	public function setOrigemBin($origemBin)
	{
		$this->origemBin = $origemBin;
		return $this;
	}
	
	public function getUip()
	{
		return $this->uip;
	}
	
	public function setUip($uip)
	{
		$this->uip = $uip;
		return $this;
	}
	
	public function getRn()
	{
		return $this->rn;
	}
	
	public function setRn($rn)
	{
		$this->rn = $rn;
		return $this;
	}
	
	public function getPhone()
	{
		return $this->phone;
	}
	
	public function setPhone($phone)
	{
		$this->phone = $phone;
		return $this;
	}
	
	public function getPayPalSuccess()
	{
		return $this->payPalSuccess;
	}
	
	public function setPayPalSuccess($payPalSuccess)
	{
		$this->payPalSuccess = $payPalSuccess;
		return $this;
	}
	
	public function getPayPalMessage()
	{
		return $this->payPalMessage;
	}
	
	public function setPayPalMessage($payPalMessage)
	{
		$this->payPalMessage = $payPalMessage;
		return $this;
	}
	
	public function getPayPalCode()
	{
		return $this->payPalCode;
	}
	
	public function setPayPalCode($payPalCode)
	{
		$this->payPalCode = $payPalCode;
		return $this;
	}
	
	public function getResultCode()
	{
		return $this->resultCode;
	}
	
	public function setResultCode($resultCode)
	{
		$this->resultCode = $resultCode;
		return $this;
	}
	
	public function getResultString()
	{
		return $this->resultString;
	}
	
	public function setResultString($resultString)
	{
		$this->resultString = $resultString;
		return $this;
	}
	
}





