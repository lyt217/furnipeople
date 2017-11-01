<?php
class EscrowDeliveryRegisterIdVersionSetter implements MessageIdVersionSetter{
    
	public function EscrowDeliveryRegisterIdVersionSetter(){
		
	}
	
	public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "FER01");
	}
}

?>