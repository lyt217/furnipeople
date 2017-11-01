<?php
class EscrowBuyDecisionIdVersionSetter implements MessageIdVersionSetter{
	
	public function EscrowBuyDecisionIdVersionSetter(){
		
	}
	
    public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "FED01");
	}
}
?>