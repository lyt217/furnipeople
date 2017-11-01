<?
require_once dirname(__FILE__).'/TPAY.LIB.php';
require_once dirname(__FILE__).'/ipg_adaptor/tpay/web/TPayHttpServletRequestWrapper.php';
require_once dirname(__FILE__).'/ipg_adaptor/tpay/web/TPayWEB.php';

$requestWrapper = new TPayHttpServletRequestWrapper($_POST);
$tpayWeb = new TPayWEB();



/** 2-1. 로그 디렉토리 설정 */
$tpayWeb->setParam("TPAY_LOG_HOME", str_replace(basename(__FILE__), "", realpath(__FILE__))."tpay_log");

/** 2-2. 어플리케이션로그 모드 설정(0: DISABLE, 1: ENABLE) */
$tpayWeb->setParam("APP_LOG","1");

/** 2-3. 이벤트로그 모드 설정(0: DISABLE, 1: ENABLE) */
$tpayWeb->setParam("EVENT_LOG","1");

/** 2-4. 암호화플래그 설정(N: 평문, S:암호화) */
$tpayWeb->setParam("EncFlag","N");

/** 2-5. 서비스모드 설정(결제 서비스 : PY0 , 취소 서비스 : CL0) */
$tpayWeb->setParam("SERVICE_MODE", "CL0");

/** 2-6. 통화구분 설정(현재 KRW(원화) 가능)  */
$tpayWeb->setParam("Currency", "KRW");

/** 2-7. 결제수단 설정 (신용카드결제 : CARD, 계좌이체: BANK, 가상계좌이체 : VBANK, 휴대폰결제 : CELLPHONE ) */
$tpayWeb->setParam("PayMethod", "CARD");

$responseDTO = $tpayWeb->doService($_POST);


print_r($responseDTO);
?>