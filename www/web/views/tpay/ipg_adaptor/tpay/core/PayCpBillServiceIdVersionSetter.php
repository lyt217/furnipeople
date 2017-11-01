<?php

require_once dirname(__FILE__).'/MessageIdVersionSetter.php';

 class PayCpBillServiceIdVersionSetter implements MessageIdVersionSetter{
 	public function fillIdAndVersion($webMessageDTO) {
		$webMessageDTO->setParameter(VERSION, "IPG01");
		$webMessageDTO->setParameter(ID, "FCB01");
	}
 }
 
?>
