<?php

namespace Payment\Redecard\Constants;

use Payment\Util\AbstractEnum;

class RedecardResultCode extends AbstractEnum
{
	public static $CONFIRMACAO_COM_SUCESSO;
	public static $JA_CONFIRMADA;
	public static $TRANSACAO_NEGADA;
	public static $TRANSAÇÃO_DESFEITA; 
	public static $TRANSACAO_ESTORNADA; 
	public static $DADOS_NAO_COINCIDEM; 
	public static $TRANSACAO_NAO_ENCONTRADA;
	public static $DADOS_AUSENTES;
	public static $_50;
	public static $_52;
	public static $_54;
	public static $_55;
	public static $_57;
	public static $_59;
	public static $_61;
	public static $_62;
	public static $_64;
	public static $_66;
	public static $_67;
	public static $_68;
	public static $_70;
	public static $_71;
	public static $_73;
	public static $_75;
	public static $_78;
	public static $_79;
	public static $_80;
	public static $_82;
	public static $_83;
	public static $_84;
	public static $_85;
	public static $_87;
	public static $_89;
	public static $_90;
	public static $_91;
	public static $_93;
	public static $_94;
	public static $_95;
	public static $_97;
	public static $_99;	
	public static $_51;
	public static $_92;
	public static $_98;	
	public static $_53; 
	public static $_56;
	public static $_76;
	public static $_86;
	Public static $_58;
	public static $_63;
	public static $_65;
	public static $_69;
	public static $_72;
	public static $_77;
	public static $_96;
	public static $_60;	
	
	public static function _init()
	{
		self::$CONFIRMACAO_COM_SUCESSO = self::enum(0, 'Transação Aprovada, a confirmação foi realizada com 
				sucesso e efetivada');
		self::$JA_CONFIRMADA = self::enum(1, 'A transação já foi confirmada anteriormente');
		self::$TRANSACAO_NEGADA  = self::enum(2, 'A transação de confirmação foi negada pelo autorizador');
		self::$TRANSAÇÃO_DESFEITA = self::enum(3, 'A transação foi desfeita, pois o tempo disponível de dois 
				minutos para confirmação foi ultrapassado');
		self::$TRANSACAO_ESTORNADA  = self::enum(4, 'A transação foi estornada anteriormente pelo processo de 
				estorno de transação');
		self::$DADOS_NAO_COINCIDEM  = self::enum(8, 'Dados de Total, Número de Comprovante ou Número de Autorização 
				não conferem com o Número de Comprovante e Autorização passados como parâmetro.'); 
		
		self::$TRANSACAO_NAO_ENCONTRADA  = self::enum(9, 'Não foi encontrada nenhuma transação para os respectivos 
				campos passados como parâmetro: NUMCV, NUMAUTOR e DATA'); 
		self::$DADOS_AUSENTES  = self::enum(88, 'Transação não pode ser concluída. Algum dado obrigatório não foi 
				informado como parâmetro (DATA, TRANSACAO, TRANSORIG, PARCELAS, TOTAL, NUMPEDIDO, NUMAUTOR, NUMCV, 
				NUMSQN e FILIACAO)'); 
		self::$_50 = self::enum(50, 'Transação não autorizada');
		self::$_52 = self::enum(52, 'Transação não autorizada');
		self::$_54 = self::enum(54, 'Transação não autorizada');
		self::$_55 = self::enum(55, 'Transação não autorizada');
		self::$_57 = self::enum(57, 'Transação não autorizada');
		self::$_59 = self::enum(59, 'Transação não autorizada');
		self::$_61 = self::enum(61, 'Transação não autorizada');
		self::$_62 = self::enum(62, 'Transação não autorizada');
		self::$_64 = self::enum(64, 'Transação não autorizada');
		self::$_66 = self::enum(66, 'Transação não autorizada');
		self::$_67 = self::enum(67, 'Transação não autorizada');
		self::$_68 = self::enum(68, 'Transação não autorizada');
		self::$_70 = self::enum(70, 'Transação não autorizada');
		self::$_71 = self::enum(71, 'Transação não autorizada');
		self::$_73 = self::enum(73, 'Transação não autorizada');
		self::$_75 = self::enum(75, 'Transação não autorizada');
		self::$_78 = self::enum(78, 'Transação não autorizada');
		self::$_79 = self::enum(79, 'Transação não autorizada');
		self::$_80 = self::enum(80, 'Transação não autorizada');
		self::$_82 = self::enum(82, 'Transação não autorizada');
		self::$_83 = self::enum(83, 'Transação não autorizada');
		self::$_84 = self::enum(84, 'Transação não autorizada');
		self::$_85 = self::enum(85, 'Transação não autorizada');
		self::$_87 = self::enum(87, 'Transação não autorizada');
		self::$_89 = self::enum(89, 'Transação não autorizada');
		self::$_90 = self::enum(90, 'Transação não autorizada');
		self::$_91 = self::enum(91, 'Transação não autorizada');
		self::$_93 = self::enum(93, 'Transação não autorizada');
		self::$_94 = self::enum(94, 'Transação não autorizada');
		self::$_95 = self::enum(95, 'Transação não autorizada');
		self::$_97 = self::enum(97, 'Transação não autorizada');
		self::$_99 = self::enum(99, 'Transação não autorizada');
		self::$_51 = self::enum(51, 'Estabelecimento Inválido. Por favor, entre em contato com o Suporte Técnico do 
				Komerci para analisar os parâmetros e cadastro.');
		self::$_92 = self::enum(92, 'Estabelecimento Inválido. Por favor, entre em contato com o Suporte Técnico do 
				Komerci para analisar os parâmetros e cadastro.');
		self::$_98 = self::enum(98, 'Estabelecimento Inválido. Por favor, entre em contato com o Suporte Técnico do 
				Komerci para analisar os parâmetros e cadastro.');
		self::$_53 = self::enum(53, 'Transação Inválida. Por favor, entre em contato com o Suporte Técnico para 
				analisar o seu cadastro.');		
		self::$_56 = self::enum(56, 'Refaça a transação. Sua transação não pode ser concluída. Por favor, tente 
				novamente.');
		self::$_76 = self::enum(76, 'Refaça a transação. Sua transação não pode ser concluída. Por favor, tente 
				novamente.');
		self::$_86 = self::enum(86, 'Refaça a transação. Sua transação não pode ser concluída. Por favor, tente 
				novamente.'); 
		self::$_58 = self::enum(58, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.');
		self::$_63 = self::enum(63, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.');
		self::$_65 = self::enum(65, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.');
		self::$_69 = self::enum(69, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.');
		self::$_72 = self::enum(72, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.');
		self::$_77 = self::enum(77, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.');
		self::$_96 = self::enum(96, 'Problemas com o cartão. Por favor, verifique os dados de seu cartão. Caso o erro 
				persista, entre em contato com a central de atendimento de seu cartão.'); 		
		self::$_60 = self::enum(60, 'Valor Inválido. Verifique se o parâmetro foi informado corretamente.');
	}
}

RedecardResultCode::_init();