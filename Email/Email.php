<?php

namespace Payment\Email;

use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class Email
{
	private $strMsg;	
	private $strToName;
	private $strToEmail;
	private $strFromName;
	private $strFromEmail;
	private $arrCc;
	private $strSbject;
	
	public function __construct($strMsg, $strToName, $strToEmail, $strSubject)
	{
		$this->strMsg 	  = $strMsg;
		$this->strToName  = $strToName;
		$this->strToEmail = $strToEmail;
		$this->strSbject  = $strSubject;
	}
	
	/**	 
	 * @param string $strFromName
	 * @param string $strFromEmail
	 */
	public function setFrom($strFromName, $strFromEmail)
	{
		$this->strFromName 	= $strFromName;
		$this->strFromEmail = $strFromEmail;
	}
	
	/**
	 * @param array $arrCc
	 */
	public function setCc(array $arrCc)
	{
		$this->arrCc = $arrCc;
	}
	
	/**	 
	 * @param string $strType
	 * @param string $strCharset
	 * @return multitype:multitype:NULL Ambigous <multitype:, multitype:unknown >
	 */
	public function send($strType, $strCharset)
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
		$message->setSubject($this->strSbject);
		
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
	
	/**
	 * @param Message $message
	 */
	protected function sendEmail($message)
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