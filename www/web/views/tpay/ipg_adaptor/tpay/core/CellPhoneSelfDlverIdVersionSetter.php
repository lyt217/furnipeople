<?php

/**
 * 
 * @author kblee
 *
 */
class CellPhoneSelfDlverIdVersionSetter implements MessageIdVersionSetter{
	
	/**
	 * 
	 */
	public function CellPhoneSelfDlverIdVersionSetter(){
		
	}
	
	/**
	 * 
	 * @param  $webMessageDTO
	 */
	public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "CPD01");
	}
}

?>