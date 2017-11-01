<?php
/**
 * Abstract Service Class
 * @id : $Id: AbstractService.php 6705 2010-07-16 04:48:01Z crimson $
 * @version : $Revision: 6705 $
 * @author : $Author: crimson $
 *
 */
abstract class AbstractService{
	
	/**
	 * Execute Service
	 * @param ParameterSet $webMessageDTO
	 */
	public function service($webMessageDTO){
		// ��û �޽��� �����ϱ�
		$requestBytes = $this->createMessage($webMessageDTO);
		
		if(LogMode::isAppLogable()){
			$logJournal = TPayLogJournal::getInstance();
			$logJournal->writeAppLog("request bytes -> [".$requestBytes."]");
		}
		
		// ��û �޽��� ������
		$responseBytes = $this->send($requestBytes);
		
		if(LogMode::isAppLogable()){
			$logJournal = TPayLogJournal::getInstance();
			$logJournal->writeAppLog("response bytes -> [".$responseBytes."]");
		}
		
		// ���� �� �޽��� �Ľ��ϱ�
		$responseDTO = $this->parseMessage($responseBytes);
		
		if(LogMode::isAppLogable()){
			$logJournal = TPayLogJournal::getInstance();
			$logJournal->writeAppLog("result of receive message parsing  -> [".$responseDTO->toString()."]");
		}
		
		return $responseDTO;
		
	}
	
	/**
	 * Create a ByteMessage
	 * @param ParameterSet $webMessageDTO
	 */
	public abstract function createMessage($webMessageDTO);
	
	/**
	 * Send to m&Bank Interface System
	 * @param ParameterSet $webMessageDTO
	 */
	public abstract function send($webMessageDTO);
	
	/**
	 * Receive Bytes Message from m&Bank Interface System. 
	 * Parsing a ByteMessage, Transform Bytes to ParameterSet 
	 * @param ParameterSet $responseBytes
	 */
	public abstract function parseMessage($responseBytes);
	
}
?>
