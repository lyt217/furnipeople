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
				$logJournal->writeAppLog("�ŷ�KEY �̼��� �����Դϴ�.");
			}
			throw new ServiceException("VA01","�ŷ�KEY �̼��� �����Դϴ�.");
		}
		
		if($mdto->getParameter(CARRIER) == null || $mdto->getParameter(CARRIER) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("����籸�� �̼��� �����Դϴ�.");
			}
			throw new ServiceException("VA02","����籸�� �̼��� �����Դϴ�.");
		}
		
		if($mdto->getParameter(SMS_OTP) == null || $mdto->getParameter(SMS_OTP) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("SMS���ι�ȣ �̼��� �����Դϴ�.");
			}
			throw new ServiceException("VA03","SMS���ι�ȣ �̼��� �����Դϴ�.");
		}
		
		/*if($mdto->getParameter(CP_TID) == null || $mdto->getParameter(CP_TID) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("��üTID �̼��� �����Դϴ�.");
			}
			throw new ServiceException("VA04","��üTID �̼��� �����Դϴ�.");
		}*/
		
		if($mdto->getParameter(DST_ADDR) == null || $mdto->getParameter(DST_ADDR) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->writeAppLog("�޴�����ȣ �̼��� �����Դϴ�.");
			}
			throw new ServiceException("VA05","�޴�����ȣ �̼��� �����Դϴ�.");
		}
	}
}

?>
