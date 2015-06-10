<?php

namespace Payment\Email;

use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

abstract class EmailV2
{	
	protected $strMsg;	
	protected $strToName;
	protected $strToEmail;
	protected $strFromName;
	protected $strFromEmail;
	protected $arrCc;
	protected $strSubject;
	protected $emailMessage;
	protected $strType;
	protected $strCharset;	
	
	protected function sendEmailMessage()
	{
		$this->send($this->strType, $this->strCharset);
	}
	
	private function send($strType, $strCharset)
	{
		if (empty($strType)){
			$strType = "text/plain";
		}
		
		if (empty( $strCharset)){
			$strCharset = "UTF-8";
		}
		
		$message = new Message();
		$message->setEncoding($strCharset);		
		
		$message->addTo($this->strToEmail, $this->strToName);
		$message->setSubject($this->strSubject);
		
		if (!empty($this->strFromEmail)) {
			$message->addFrom($this->strFromEmail, $this->strFromName);
		}
		
		if (!empty($this->arrCc)){						
			foreach ($this->arrCc as $contact){				
				$message->addCc($contact[1], $contact[0]);
			}
		}
		
		$mimePart = new MimePart($this->strMsg);
		$mimePart->type 	= $strType;
		$mimePart->charset 	= $strCharset;
		
		$mimeMsg = new MimeMessage();
		$mimeMsg->setParts(array($mimePart));
		
		$message->setBody($mimeMsg);
		
		$this->sendEmail($message);
	}
	
	private function sendEmail($message)
	{	
		$transport = new SmtpTransport();
		$options   = new SmtpOptions(array(
				'name'              => 'mail.google.com',
				'host'              => 'mail.google.com',
				'connection_class'  => 'login',
				'connection_config' => array(
						'username' 	=> 'jdoliveirasa@gmail.com',
						'password'	=> 'guest34@'
				)
		));
		$transport->setOptions($options);
		$transport->send($message);
	}

}