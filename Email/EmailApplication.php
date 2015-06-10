<?php

namespace Payment\Email;

use Payment\Payments\Constants\PaymentsConstants;

class EmailApplication extends EmailV2
{	
	public function getEmailMessage()
	{		
		return new EmailMessage();
	}
	
	public function sendEmailPaymentConfirmation(EmailMessage $emailMessage)
	{	
		$this->strMsg = $emailMessage->getEmailMessage($emailMessage->getPaymentMethod());
		$this->strToName = $emailMessage->getToName();
		$this->strToEmail = $emailMessage->getToEmail();
		$this->strSubject = 'Confirmação de Pagamento - Teste Payments';
		$this->strFromName = $emailMessage->getFromName();
		$this->strFromEmail = 'jdoliveirasa@gmail.com';
		$this->arrCc = array(array("Teste Payments", "jdoliveirasa@gmail.com"));
		$this->strType = $emailMessage->getType();
		$this->strCharset = $emailMessage->getCharset();
				
		parent::sendEmailMessage();							
	}
	
	public function sendEmailMessageErro(EmailMessage $emailMessage)
	{
		if ($emailMessage->getPaymentMethod() == PaymentsConstants::PAYPAL_METHOD)
			$orderNumber = $emailMessage->getPaymentId();
		else if ($emailMessage->getPaymentMethod() == PaymentsConstants::REDECARD_METHOD)
			$orderNumber = $emailMessage->getOrderNumber();
		
		$this->strMsg = $emailMessage->getEmailMessageErro($emailMessage->getPaymentMethod());
		$this->strToName = 'Teste Payments';
		$this->strToEmail = 'jdoliveirasa@gmail.com';
		$this->strSubject =	'Teste Payments - Compra Online - Pedido não aprovado: ' . $orderNumber;
		$this->strFromName = 'Teste Payments';
		$this->strFromEmail = 'jdoliveirasa@gmail.com';
		$this->arrCc = array(array("Teste Payments", "jdoliveirasa@gmail.com"));
		$this->strType = $emailMessage->getType();
		$this->strCharset = $emailMessage->getCharset();
		
		parent::sendEmailMessage();
	}
	
	public function sendEmailMessageAptiloErro(EmailMessage $emailMessage)
	{		
		if ($emailMessage->getPaymentMethod() == PaymentsConstants::PAYPAL_METHOD)
			$orderNumber = $emailMessage->getPaymentId();
		else if ($emailMessage->getPaymentMethod() == PaymentsConstants::REDECARD_METHOD)
			$orderNumber = $emailMessage->getOrderNumber();
		
		$this->strMsg = $emailMessage->getEmailMessageAptiloErro($emailMessage->getPaymentMethod());
		$this->strToName = 'Suporte Teste Payments';
		$this->strToEmail = 'jdoliveirasa@gmail.com';
		$this->strSubject = 'Teste Payments - Compra Online - Erro Liberação de créditos - Pedido ' . $orderNumber;
		$this->strFromName = 'Teste Payments';
		$this->strFromEmail = 'jdoliveirasa@gmail.com';
		$this->arrCc = array(array("Teste Payments", "jdoliveirasa@gmail.com"));
		$this->strType = $emailMessage->getType();
		$this->strCharset = $emailMessage->getCharset();
	
		parent::sendEmailMessage();
	}
		
}
