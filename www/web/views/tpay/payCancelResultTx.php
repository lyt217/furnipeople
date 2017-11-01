<?
require_once dirname(__FILE__).'/TPAY.LIB.php';
require_once dirname(__FILE__).'/ipg_adaptor/tpay/web/TPayHttpServletRequestWrapper.php';
require_once dirname(__FILE__).'/ipg_adaptor/tpay/web/TPayWEB.php';

$requestWrapper = new TPayHttpServletRequestWrapper($_POST);
$tpayWeb = new TPayWEB();



/** 2-1. �α� ���丮 ���� */
$tpayWeb->setParam("TPAY_LOG_HOME", str_replace(basename(__FILE__), "", realpath(__FILE__))."tpay_log");

/** 2-2. ���ø����̼Ƿα� ��� ����(0: DISABLE, 1: ENABLE) */
$tpayWeb->setParam("APP_LOG","1");

/** 2-3. �̺�Ʈ�α� ��� ����(0: DISABLE, 1: ENABLE) */
$tpayWeb->setParam("EVENT_LOG","1");

/** 2-4. ��ȣȭ�÷��� ����(N: ��, S:��ȣȭ) */
$tpayWeb->setParam("EncFlag","N");

/** 2-5. ���񽺸�� ����(���� ���� : PY0 , ��� ���� : CL0) */
$tpayWeb->setParam("SERVICE_MODE", "CL0");

/** 2-6. ��ȭ���� ����(���� KRW(��ȭ) ����)  */
$tpayWeb->setParam("Currency", "KRW");

/** 2-7. �������� ���� (�ſ�ī����� : CARD, ������ü: BANK, ���������ü : VBANK, �޴������� : CELLPHONE ) */
$tpayWeb->setParam("PayMethod", "CARD");

$responseDTO = $tpayWeb->doService($_POST);


print_r($responseDTO);
?>