<?php
//define("TPAY_DOMAIN_NAME","pgbiz.mnbank.co.kr");
//define("TPAY_DOMAIN_NAME","172.16.10.20");
define("TPAY_DOMAIN_NAME","203.228.206.31");
define("TPAY_ADAPTOR_LISTEN_PORT",9001);
define("PAY_METHOD","PayMethod");	
define("CARD_PAY_METHOD","CARD");	
define("BANK_PAY_METHOD","BANK");	
define("VBANK_PAY_METHOD","VBANK");	
define("CELLPHONE_PAY_METHOD","CELLPHONE");	
define("CPBILL_PAY_METHOD","CPBILL");
	
define("ESCROW_DELIVERY_REGISTER","DELVREG");
define("ESCROW_BUY_DECISION","BUYDECN");
define("ESCROW_BUY_REJECT","BUYREJT");	

define("SERVICE_MODE","SERVICE_MODE");	
define("PAY_SERVICE_CODE","PY0");	
define("CANCEL_SERVICE_CODE","CL0");	
define("CELLPHONE_REG_ITEM","CP0");	
define("CELLPHONE_SELF_DLVER","CP1");	
define("CELLPHONE_SMS_DLVER","CP2");	
define("CELLPHONE_ITEM_CONFM","CP4");	
define("ESCROW_SERVICE_CODE","EW0");

define("VERSION","version");
define("ENC_FLAG","EncFlag");

define("GOODS_CNT","GoodsCnt");
define("GOODS_NAME","GoodsName");
define("GOODS_AMT","Amt");
define("MOID","Moid");
define("CURRENCY","Currency");
define("MID","MID");	
define("MERCHANT_KEY","LicenseKey");
define("MALL_IP","MallIP");
define("USER_IP","UserIP");
define("RETURN_URL","ReturnURL");	
define("MALL_USER_ID","MallUserID");	
define("BUYER_NAME","BuyerName");	
define("BUYER_AUTH_NO","BuyerAuthNum");	
define("BUYER_TEL","BuyerTel");	
define("BUYER_EMAIL","BuyerEmail");	
define("PARENT_EMAIL","ParentEmail");	
define("BUYER_ADDRESS","BuyerAddr");	
define("BUYER_POST_NO","BuyerPostNo");	
define("CARD_TYPE","CardType");	
define("CARD_CODE","CardCode");	
define("CARD_NO","CardNum");	

define("CARD_AUTH_FLAG","AuthFlag");	
define("CARD_KEYIN_CL","KeyInCl");
define("CARD_AUTH_TYPE","AuthType");

define("CARD_QUOTA","CardQuota");	
define("CARD_INTEREST","CardInterest");	
define("CARD_EXPIRE","CardExpire");	
define("CARD_PWD","CardPwd");	
define("CARD_POINT","CardPoint");	
define("CARD_XID","CardXID");	
define("CARD_ECI","CardECI");	
define("CARD_CAVV","CardCAVV");	
define("CARD_JOIN_CODE","JoinCode");
define("ISP_PGID","ISPPGID");	
define("ISP_CODE","ISPCode");	
define("ISP_SESSION_KEY","ISPSessionKey");	
define("ISP_ENC_DATA","ISPEncData");	
define("BANK_CODE","BankCode");	
define("BANK_ENC_DATA","BankEncData");	
define("VBANK_EXPIRE_DATE","VbankExpDate");	
define("RECEIPT_AMT","ReceiptAmt");	
define("RECEIPT_TYPE","ReceiptType");	
define("RECEIPT_TYPE_NO","ReceiptTypeNo");	
define("CANCEL_AMT","CancelAmt");	
define("CANCEL_MSG","CancelMsg");	
define("CANCEL_PWD","CancelPwd");	
define("CANCEL_IP","CancelIP");	
define("PARTIAL_CANCEL_CODE","PartialCancelCode");
define("SECURE_PARAMS","SECURE_PARAMS");	
define("PERSONAL_CARD_TYPE","01");	
define("BUSINESS_CARD_TYPE","02");	
define("CREDIT_CARD","0");	
define("CHECK_CARD","1");	
define("EACH_BY_CARD_SERVICE","0");	 // 신용카드 종류에 따라 인증 (X안심, ILK, ISP)
define("KEYIN","1");	             // 카드번호+유효기간 (비인증)
define("KEYIN_AUTH","2");	         // 카드번호+유효기간+비밀번호+주민번호

define("CARD_AUTH_TYPE_KEYIN","01");
define("CARD_AUTH_TYPE_ISP","02");
define("CARD_AUTH_TYPE_VISA3D","03");
	

/* 전문템플릿 */	
define("IPG01FCD01","IPG01FCD01");
define("IPG01FBK01","IPG01FBK01");
define("IPG01FVK01","IPG01FVK01");
define("IPG01FCP01","IPG01FCP01");
define("IPG01FCB01","IPG01FCB01");

define("IPG01MALL1","IPG01MALL1");	
define("IPG01PGM01","IPG01PGM01");	
define("IPG01IPGC1","IPG01IPGC1");	
define("IPG01IPGC2","IPG01IPGC2");	
define("IPG01FCB02","IPG01FCB02");

define("IPG01FER01","IPG01FER01");
define("IPG01FER02","IPG01FER02");
define("IPG01FED01","IPG01FED01");
define("IPG01FED02","IPG01FED02");
define("IPG01FEF01","IPG01FEF01");
define("IPG01FEF02","IPG01FEF02");

define("IPG01CPR01","IPG01CPR01");	
define("IPG01CPR02","IPG01CPR02");	
define("IPG01CPD01","IPG01CPD01");	
define("IPG01CPD02","IPG01CPD02");	
define("IPG01CPE01","IPG01CPE01");	
define("IPG01CPE02","IPG01CPE02");	
define("IPG01CPF01","IPG01CPF01");	
define("IPG01CPF02","IPG01CPF02");	
	
	
/* 전문 공통부 필드명 */
define("ID","ID");
define("EDIT_DATE","ediDate");
define("LENGTH","length");
define("TID","TID");
define("ERROR_SYSTEM","ErrorSys");
define("ERROR_CODE","ErrorCD");
define("ERROR_MSG","ErrorMsg");
define("LENGTH_START_POS",24);
define("LENGTH_END_POS",30);
define("LENGTH_MSG_SIZE",6);
define("ENCRYPT_DATA","EncryptData");

define("ETC_ERROR_MESSAGE","기타오류가 발생하였습니다.");


define("SOCKET_SO_TIMEOUT",120000);
define("CONNECT_TIMEOUT",1000);
define("EVENT_LOG","EVENT_LOG");
define("APP_LOG","APP_LOG");
define("TPAY_LOG_HOME","TPAY_LOG_HOME");
define("LOG_DIRECTORY_CONF_NAME","${tpay.log.dir}");

/* 휴대폰결제 상품등록*/
define("CP_ID","CPID");
define("CP_PWD","CPPWD");
define("ITEM_TYPE","ItemType");
define("ITEM_COUNT","ItemCount");
define("ITEM_INFO","ItemInfo");
define("SERVICE","SERVICE");
define("EMAIL","Email");
define("IPADDR","IPADDR");
define("CP_PWD","CPPWD");

/* 휴대폰결제 본인인증 */
define("SERVER_INFO","ServerInfo");
define("DST_ADDR","DstAddr");
define("IDEN","Iden");
define("CARRIER","Carrier");
define("SMS_OTP","SmsOTP");
define("ENCODED_TID","EncodedTID");
define("CP_TID","CPTID");





    
    
define("VBANK_CODE","VbankBankCode");
define("EXP_DATE","VbankExpDate");
define("ACCT_NAME","VBankAccountName");
define("REFUND_ACCT","VbankRefundAccount");
define("REFUND_BANK_CODE","VbankRefundBankCode");
define("REFUND_ACCT_NAME","VbankRefundName");
define("RECEIT_SUPPLY_AMT","ReceiptSupplyAmt");
define("RECEIT_VAT","ReceiptVAT");
define("RECEIT_SERVICE_AMT","ReceiptServiceAmt");
    
    
    
define("NET_CANCEL_CODE","NetCancelCode");
    
    
define("SVC_CD_CARD","01"); //신용카드
define("SVC_CD_BANK","02"); //계좌이체
define("SVC_CD_VBANK","03"); //가상계좌
define("SVC_CD_RECEIPT","04"); //현금영수증
define("SVC_CD_CELLPHONE","05"); //휴대폰결제
define("SVC_CD_CPBILL","06"); //휴대폰결제
	
define("CARD_KEYIN_CL01","01");  //카드번호+유효기간
	
define("CARD_KEYIN_CL11","11");  //카드번호+유효기간+주민번호7+비밀번호2



define("SVC_PRDT_CD_ONLINE","01"); // 온라인
define("SVC_PRDT_CD_MOBILE","02"); // 모바일
define("SVC_PRDT_CD_IPTV","03");   // IPTV



define("MALL_RESERVED","MallReserved");
define("RETRY_URL","RetryURL");

define("DELV_CORP_NAME","DeliveryCoNm");
define("INVOICE_NO","InvoiceNum");
define("REGISTER_NAME","RegisterName");

define("TRANS_TYPE","TransType");	
	

?>
