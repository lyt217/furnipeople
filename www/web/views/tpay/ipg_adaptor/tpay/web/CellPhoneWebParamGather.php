<?php
require_once dirname(__FILE__).'/WebParamGather.php';

/**
 * 
 * @author kblee
 *
 */
class CellPhoneWebParamGather implements WebParamGather{
	
	/**
	 * 
	 */
	public function CellPhoneWebParamGather(){
		
	}
	
	/**
	 * 
	 * @param  $request
	 */
	public function gather($request){
		$webParam = new WebMessageDTO();
		
		$serverInfo = $request["ServerInfo"];
		$webParam->setParameter(SERVER_INFO,$serverInfo);
		
		$carrier = $request["Carrier"];
		$webParam->setParameter(CARRIER,$carrier);
		
		
		$smsOTP = $request["OTP"];
		$webParam->setParameter(SMS_OTP,$smsOTP);
		
		$cpTID = $request["CPID"];
		$webParam->setParameter(CP_TID,$cpTID);
		
		$dstAddr = $request["DstAddr"];
		$webParam->setParameter(DST_ADDR,$dstAddr);
		
		$encodeTID = $request["EncodeTID"];
		$webParam->setParameter(ENCODED_TID,$encodeTID);
		
		
		$iden = $request["Iden"];
		$webParam->setParameter(IDEN,$iden);
		
		
		return $webParam;
	}
	
}
?>
