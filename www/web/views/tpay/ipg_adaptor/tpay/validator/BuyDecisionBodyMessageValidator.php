<?php
require_once dirname(__FILE__).'/BodyMessageValidator.php';
require_once dirname(__FILE__).'/../exception/ServiceException.php';
require_once dirname(__FILE__).'/../log/LogMode.php';

class BuyDecisionBodyMessageValidator implements BodyMessageValidator{
	
	public function BuyDecisionBodyMessageValidator(){
		
	}
	
	/**
	 * 
	 * @param $mdto
	 */
	public function validate($mdto){
		// TID
		if($mdto->getParameter(TID) == null || $mdto->getParameter(TID) == ""){
			
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("거래TID 미설정 오류입니다.");
			}
			throw new ServiceException("VC01","거래TID 미설정 오류입니다.");
		}	

		// MID
		if($mdto->getParameter(MID) == null || $mdto->getParameter(MID) == ""){
			
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("MID 미설정 오류입니다.");
			}
			throw new ServiceException("VC04","MID 미설정 오류입니다.");
		}	
		
		// TID
		if($mdto->getParameter(BUYER_AUTH_NO) == null || $mdto->getParameter(BUYER_AUTH_NO) == ""){
			
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("고객고유번호 미입력 오류입니다.");
			}
			throw new ServiceException("VC05","고객고유번호 미입력 오류입니다.");
		}	
		
	}
	
}

?>