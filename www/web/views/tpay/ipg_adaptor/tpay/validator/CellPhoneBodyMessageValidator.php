<?php
require_once dirname(__FILE__).'/BodyMessageValidator.php';
/**
 * 
 * @author kblee
 *
 */
class CellPhoneBodyMessageValidator implements BodyMessageValidator{
	
	/**
	 * 
	 */
	public function CellPhoneBodyMessageValidator(){
		
	}
	
	/**
	 * 
	 * @param $mdto
	 */
	public function validate($mdto){
		if($mdto->getParameter(SERVER_INFO) == null || $mdto->getParameter(SERVER_INFO) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("거래KEY 미설정 오류입니다.");
			}
			throw new ServiceException("VA01","거래KEY 미설정 오류입니다.");
		}
		
		if($mdto->getParameter(CARRIER) == null || $mdto->getParameter(CARRIER) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("이통사구분 미설정 오류입니다.");
			}
			throw new ServiceException("VA02","이통사구분 미설정 오류입니다.");
		}
		
		if($mdto->getParameter(SMS_OTP) == null || $mdto->getParameter(SMS_OTP) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("SMS승인번호 미설정 오류입니다.");
			}
			throw new ServiceException("VA03","SMS승인번호 미설정 오류입니다.");
		}
		
		/*if($mdto->getParameter(CP_TID) == null || $mdto->getParameter(CP_TID) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("업체TID 미설정 오류입니다.");
			}
			throw new ServiceException("VA04","업체TID 미설정 오류입니다.");
		}*/
		
		if($mdto->getParameter(DST_ADDR) == null || $mdto->getParameter(DST_ADDR) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("휴대폰번호 미설정 오류입니다.");
			}
			throw new ServiceException("VA05","휴대폰번호 미설정 오류입니다.");
		}
	}
}

?>
