<?php
require_once dirname(__FILE__).'/../exception/ServiceException.php';
require_once dirname(__FILE__).'/../log/LogMode.php';
/**
 * 
 * @author kblee
 *
 */
class BuyerMessageDataValidator{
	
	/**
	 * 
	 */
	public function BuyerMessageDataValidator(){
		
	}
	
	/**
	 * 
	 * @param $mdto
	 */
	public function validate($mdto) {
		// ������ �̸�
		if($mdto->getParameter(BUYER_NAME)===null || $mdto->getParameter(BUYER_NAME) == ""){
			
			if(LogMode::isAppLogable())	{
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("�������̸� �̼��� �����Դϴ�.");
			}
			
			throw new ServiceException("V301","�������̸� �̼��� �����Դϴ�.");	
		}
		
		
		// �����ڿ���ó
		if($mdto->getParameter(BUYER_TEL) == null || $mdto->getParameter(BUYER_TEL) == ""){
			
			if(LogMode::isAppLogable()) {
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("�����ڿ���ó �̼��� �����Դϴ�.");
			}
			
			throw new ServiceException("V303","�����ڿ���ó �̼��� �����Դϴ�.");	
		}
		
		// �����ڸ����ּ�
		if($mdto->getParameter(BUYER_EMAIL) == null || $mdto->getParameter(BUYER_EMAIL) == ""){
			if(LogMode::isAppLogable() == true){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->$logJournal = MnBankLogJournal::getInstance();
			}
			throw new ServiceException("V304","�����ڸ����ּ� �̼��� �����Դϴ�.");
		}
		
	}
	
	
}
?>