<?php
/**
 * 
 * @author kblee
 *
 */
class CancelBodyMessageValidator{
	
	/**
	 * 
	 */
	public function CancelBodyMessageValidator(){
		
	}
	
	/**
	 * 
	 * @param $mdto
	 */
	public function validate($mdto) {
		// ��ұݾ�
		if($mdto->getParameter(CANCEL_AMT) == null || $mdto->getParameter(CANCEL_AMT) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("��ұݾ� �̼��� �����Դϴ�.");
			}
			
			throw new ServiceException("V801","��ұݾ� �̼��� �����Դϴ�.");
		}
		
		// ��һ���
		if($mdto->getParameter(CANCEL_MSG) == null || $mdto->getParameter(CANCEL_MSG) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("��һ��� �̼��� �����Դϴ�.");
			}
			throw new ServiceException("V802","��һ��� �̼��� �����Դϴ�.");
		}
		
		// ����ID
		if($mdto->getParameter(MID) == null || $mdto->getParameter(MID) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("����ID �̼��� �����Դϴ�.");
			}
			throw new ServiceException("V201","����ID �̼��� �����Դϴ�.");
		}
		
		// ����н�����
		/*if($mdto->getParameter(CANCEL_PWD) == null || $mdto->getParameter(CANCEL_PWD) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("����н����� �̼��� �����Դϴ�.");
			}
			throw new ServiceException("V803","����н����� �̼��� �����Դϴ�.");
		}*/
		
		// ����Key
		/*
		if($mdto->getParameter(MERCHANT_KEY) == null || $mdto->getParameter(MERCHANT_KEY) == ""){
			if(LogMode::isAppLogable()){
				$logJournal = MnBankLogJournal::getInstance();
				$logJournal->errorAppLog("LicenseKey �̼��� �����Դϴ�.");
			}
			throw new ServiceException("V202","LicenseKey �̼��� �����Դϴ�.");
		}
		*/

	        if($mdto->getParameter(PAY_METHOD) == null || $mdto->getParameter(PAY_METHOD) == ""){
                        if(LogMode::isAppLogable()){
                                 $logJournal = MnBankLogJournal::getInstance();
                                 $logJournal->errorAppLog("���Ҽ����� �������� �ʾҽ��ϴ�. ��� ������ ��� BANK, CARD, CELLPHONE �� �� �ϳ��� �����ؾ� �մϴ�.");
                        }
                        throw new ServiceException("V103","���Ҽ����� �������� �ʾҽ��ϴ�.");
                }
	}
	
}
?>
