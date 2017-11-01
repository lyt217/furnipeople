<?php
/**
 * 
 * @author kblee
 *
 */
class PayVbankServiceIdVersionSetter implements MessageIdVersionSetter{
	
	/**
	 * 
	 * @param  $webMessageDTO
	 */
	public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "FVK01");
	}
	
}
?>