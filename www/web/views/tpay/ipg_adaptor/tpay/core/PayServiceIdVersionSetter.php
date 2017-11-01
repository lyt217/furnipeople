<?php
/**
 * 
 * @author kblee
 *
 */
class PayServiceIdVersionSetter{
	
	/**
	 * 
	 */
	public function PayServiceIdVersionSetter(){
		
	}
	
	/**
	 * 
	 * @param  $webMessageDTO
	 */
	public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "MALL1");
		
	}
}

?>