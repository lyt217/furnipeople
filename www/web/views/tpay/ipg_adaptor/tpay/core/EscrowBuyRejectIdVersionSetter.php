<?php
class EscrowBuyRejectIdVersionSetter implements MessageIdVersionSetter{
    
	public function EscrowBuyRejectIdVersionSetter(){
		
	}
	
	public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "FEF01");
	}
}
?>