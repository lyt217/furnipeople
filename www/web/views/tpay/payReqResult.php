<?
require_once dirname(__FILE__).'/TPAY.LIB.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="css/sample.css" type="text/css" media="screen" />
<title>tPay ���ͳݰ���</title>
</head>
<body>
<?
//����(ȸ����) �������� EUC-KR�� ��� �ѱ۱�������
encoding("UTF-8", "EUC-KR", &$_POST); 

print_r($_POST);

//webTx���� ���� �������
$payMethod = $_POST['payMethod'];
$mid = $_POST['mid'];
$tid = $_POST['tid'];
$mallUserId = $_POST['mallUserId'];
$amt = $_POST['amt'];
$buyerName = $_POST['buyerName'];
$buyerTel = $_POST['buyerTel'];
$buyerEmail = $_POST['buyerEmail'];
$mallReserved = $_POST['mallReserved'];
$goodsName = $_POST['goodsName'];
$moid = $_POST['moid'];
$authDate = $_POST['authDate'];
$authCode = $_POST['authCode'];
$fnCd = $_POST['fnCd'];
$fnName = $_POST['fnName'];
$resultCd = $_POST['resultCd'];
$resultMsg = $_POST['resultMsg'];
$errorCd = $_POST['errorCd'];
$errorMsg = $_POST['errorMsg'];
$vbankNum = $_POST['vbankNum'];
$vbankExpDate = $_POST['vbankExpDate'];
$ediDate = $_POST['ediDate'];

//����(ȸ����) DB�� ����Ǿ��ִ� ��
$amtDb = "1004";//�ݾ�
$moidDb = "toid1234567890";//moid
$merchantKey = "VXFVMIZGqUJx29I/k52vMM8XG4hizkNfiapAkHHFxq0RwFzPit55D3J3sAeFSrLuOnLNVCIsXXkcBfYK1wv8kQ==";	//����Ű

$encryptor = new Encryptor($merchantKey, $ediDate);
$decAmt = $encryptor->decData($amt);
$decMoid = $encryptor->decData($moid);

if( $decAmt!=$amtDb || $decMoid!=$moidDb ){
	echo "������ �����͸� �����Դϴ�.";
}else{
	//������� ���� ���� �˸�
	ResultConfirm::send($tid, "000");

	//����DBó��
}
?>
</body>
</html>