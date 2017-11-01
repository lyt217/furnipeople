<?php
require_once dirname(__FILE__).'/WebParamGather.php';

/**
 * 
 * @author kblee
 *
 */
class VBankWebParamGather implements WebParamGather{
	
	/**
	 * Default Constructor
	 */
	public function VBankWebParamGather(){
		
	}
	
	/**
	 * 
	 * @param $request
	 */
	public function gather($request) {
		$webParam = new WebMessageDTO();
		
		$bankCode = $request["BankCode"];
		$webParam->setParameter(VBANK_CODE,$bankCode);
		
		// accountName�� ����� ��� �����ڸ����� ����
		$vbankAccountName = $request["VbankAccountName"];
		if($vbankAccountName == null || $vbankAccountName == ""){
			$vbankAccountName = $request["BuyerName"];
		}
		
		$receitTypeNo = $request["ReceiptTypeNo"];
		$webParam->setParameter(BUYER_AUTH_NO,$receitTypeNo);
		
		$webParam->setParameter(ACCT_NAME,$vbankAccountName);
		
		$cashReceitType = $request["CashReceiptType"];
		$webParam->setParameter(RECEIPT_TYPE,$cashReceitType);
		
		$receitTypeNo = $request["ReceiptTypeNo"];
		$webParam->setParameter(RECEIPT_TYPE_NO,$receitTypeNo);
		
		$vbankExpDate = $request["VbankExpDate"];
		$webParam->setParameter(VBANK_EXPIRE_DATE,$vbankExpDate);
		
		$transType = $request["TransType"] == null ? "0" : $request["TransType"];
		$webParam->setParameter(TRANS_TYPE,$transType);
		return $webParam;
	}
	
}
?>
