<?php
require_once dirname(__FILE__).'/BodyMessageValidator.php';
require_once dirname(__FILE__).'/../exception/ServiceException.php';
require_once dirname(__FILE__).'/../log/LogMode.php';
/**
 * 
 * @author kblee
 *
 */
class BankBodyMessageValidator implements BodyMessageValidator{
	
	/**
	 * 
	 */
	public function BankBodyMessageValidator(){
		
	}
	
	/**
	 * 
	 * @param $mdto
	 */
	public function validate($mdto){
		// BankEncData
		if($mdto->getParameter(BANK_ENC_DATA) == null || $mdto->getParameter(BANK_ENC_DATA) == ""){
			
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("금융결제원 암호화 데이터 미설정오류입니다.");
			}
			
			throw new ServiceException("V602","금융결제원 암호화 데이터 미설정 오류입니다.");
		}		
	}
	
}
?>
