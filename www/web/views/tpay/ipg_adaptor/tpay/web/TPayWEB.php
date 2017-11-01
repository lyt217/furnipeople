<?php
require_once dirname(__FILE__).'/WebMessageDTO.php';
require_once dirname(__FILE__).'/../log/LogMode.php';
require_once dirname(__FILE__).'/../log/TPayLogJournal.php';
require_once dirname(__FILE__).'/../core/MessageIdVersionFactory.php';
require_once dirname(__FILE__).'/../core/ErrorMessageHandler.php';
require_once dirname(__FILE__).'/../core/ServiceFactory.php';
require_once dirname(__FILE__).'/../core/SecureMessageProcessor.php';
require_once dirname(__FILE__).'/../core/TPayIoAdaptorTransport.php';
require_once dirname(__FILE__).'/../validator/CommonMessageValidator.php';
require_once dirname(__FILE__).'/WebParamGatherFactory.php';
require_once dirname(__FILE__).'/PayCommonWebParamGather.php';
require_once dirname(__FILE__).'/../validator/GoodsMessageDataValidator.php';
require_once dirname(__FILE__).'/../validator/MerchantMessageDataValidator.php';
require_once dirname(__FILE__).'/../validator/BuyerMessageDataValidator.php';
require_once dirname(__FILE__).'/../validator/BodyMessageValidatorFactory.php';
require_once dirname(__FILE__).'/../validator/CellPhoneRegItemBodyValidator.php';
require_once dirname(__FILE__).'/../validator/CellPhoneSelfDeliverBodyValidator.php';
require_once dirname(__FILE__).'/../validator/CellPhoneSmsDeliverBodyValidator.php';
require_once dirname(__FILE__).'/../validator/CellPhoneItemConfirmBodyValidator.php';
require_once dirname(__FILE__).'/../validator/CancelBodyMessageValidator.php';
require_once dirname(__FILE__).'/../exception/ServiceExceptionCallbackHandler.php';
require_once dirname(__FILE__).'/../exception/NetCancelCallback.php';
require_once dirname(__FILE__).'/../exception/NetCancelCallback.php';
require_once dirname(__FILE__).'/../message/MessageTemplateCreator.php';

/**
 * 
 * @author kblee
 *
 */
class TPayWEB{
	
	/**
	 * 
	 * @var $webMessageDTO
	 */
	private $webMessageDTO;
	
	/**
	 * 
	 */
	public function TPayWEB(){
		$this->webMessageDTO = new WebMessageDTO();
	}
	
	/**
	 * 
	 * @param $request
	 */
	public function doService($request){
	
		try {
			
			// �α� ��� ���� Ȯ��
			$eventLogEnable = $this->webMessageDTO->getParameter(EVENT_LOG);
			if("1" == $eventLogEnable){
				LogMode::enableEventLogMode();
			}
			
			// APP�α� ��� ���� Ȯ�� �� �ʱ�ȭ
			$appLogEnable = $this->webMessageDTO->getParameter(APP_LOG);
			if("1" == $appLogEnable){
				LogMode::enableAppLogMode();
			}
			
			if("1"== $this->webMessageDTO->getParameter(APP_LOG) || "1" == $this->webMessageDTO->getParameter(EVENT_LOG)){
				$logJournal = TPayLogJournal::getInstance();
                $directoryPath = $this->webMessageDTO->getParameter(TPAY_LOG_HOME);
				$logJournal->setLogDirectoryPath($directoryPath);
				$logJournal->configureMnBankLog4PHP();
			}
			
			$serviceMode  = $this->webMessageDTO->getParameter(SERVICE_MODE);
			// ���񽺸�忡 ���� version�� ID����
			$messageIdVersionFactory = new MessageIdVersionFactory();
			$messageIdVersionSetter = $messageIdVersionFactory->create($serviceMode,$this->webMessageDTO->getParameter(PAY_METHOD));
			$messageIdVersionSetter->fillIdAndVersion($this->webMessageDTO);
			
			// ���� ����� ��ȿ�� üũ
			$parameterSetValidator = new CommonMessageValidator();
			$parameterSetValidator->validate($this->webMessageDTO);
			
			//���� Gather
			$commonWebGather = new PayCommonWebParamGather();
	   	        $commonGatherParam = $commonWebGather->gather($request);
			$this->webMessageDTO->add($commonGatherParam);
			
			// ���񽺺��� http request value gather
			$webParamGatherFactory = new WebParamGatherFactory();
			$webParamGather = $webParamGatherFactory->createParamGather($serviceMode,$this->webMessageDTO->getParameter(PAY_METHOD));
			if($webParamGather!=null){
				$gatherParam = $webParamGather->gather($request);
				$this->webMessageDTO->add($gatherParam);
			}
			// ��ȿ�� üũ
			$this->paramValidateByValidate($serviceMode);
			// ���� ����
			$ioAdaptorService = $this->createIoAdaptorService($serviceMode,$this->webMessageDTO->getParameter(PAY_METHOD));

			// ���� ���� 
			$responseWebMDTO = $ioAdaptorService->service($this->webMessageDTO);
			$responseWebMDTO->setParameter(SERVICE_MODE, $serviceMode);
			
			// event log ���� 
			if(LogMode::isEventLogable()){
				$logJournal->writeEventLog($responseWebMDTO);
			}
			
			$responseWebMDTO = $this->changeParameter($responseWebMDTO, $serviceMode);
			
			return $responseWebMDTO;
			
			
		}catch(ServiceException $e){
			echo $e->getErrorMessage();
			// ServiceException �߻��� Ư�� �����ڵ庰�� ����� ó���Ѵ�.
			$callbackHandler = new ServiceExceptionCallbackHandler();
			$netCancelCallback = new NetCancelCallback();
			$netCancelCallback->setWebMessageDTO($this->webMessageDTO);
			$netCancelCallback->setServiceException($e);
			$callbackHandler->doHandle(array($netCancelCallback));
			$errorHandler = new ErrorMessageHandler();
			// �����ڵ�, �����޽����� �����Ѵ�.
			return $errorHandler->doHandle($e);
		}catch(Exception $e){
				echo $e->getMessage();
				// �����ڵ�, �����޽����� �����Ѵ�.
				$errorHandler = new ErrorMessageHandler();
				// �����ڵ�, �����޽����� �����Ѵ�.
				return $errorHandler->doHandle($e);
			}
			
		}
		
		private function changeParameter($responseWebMDTO, $serviceMode) {
			// TODO Auto-generated method stub

			$this->changeParameterName($responseWebMDTO, "PayMethod", "payMethod");
			$this->changeParameterName($responseWebMDTO, "MID", "mid");
			$this->changeParameterName($responseWebMDTO, "TID", "tid");
			$this->changeParameterName($responseWebMDTO, "MallUserID", "mallUserID");
			$this->changeParameterName($responseWebMDTO, "Amt", "amt");
			$this->changeParameterName($responseWebMDTO, "BuyerName", "buyerName");
			$this->changeParameterName($responseWebMDTO, "BuyerTel", "buyerTel");
			$this->changeParameterName($responseWebMDTO, "BuyerEmail", "buyerEmail");
			$this->changeParameterName($responseWebMDTO, "MallReserved", "mallReserved");
			$this->changeParameterName($responseWebMDTO, "GoodsName", "goodsName");
		
			if(PAY_SERVICE_CODE == $serviceMode ){
				$responseWebMDTO->setParameter("StateCd", "0");
			}else if(CANCEL_SERVICE_CODE == $serviceMode){
				$responseWebMDTO->setParameter("StateCd", "1");
			}else{
				$responseWebMDTO->setParameter("StateCd", "-1");
			}
		
			$this->changeParameterName($responseWebMDTO, "Moid", "moid");
			$this->changeParameterName($responseWebMDTO, "AuthDate", "authDate");
			$this->changeParameterName($responseWebMDTO, "AuthCode", "authCode");
		
			$payMehod = $responseWebMDTO->getParameter("payMethod");
		
			if("CARD" == $payMehod){
				$this->changeParameterName($responseWebMDTO, "CardCode", "fnCd");
				$this->changeParameterName($responseWebMDTO, "CardName", "fnName");
			}else if("VBANK" == $payMehod || "BANK" == $payMehod){
				$this->changeParameterName($responseWebMDTO, "BankCode", "fnCd");
				$this->changeParameterName($responseWebMDTO, "BankName", "fnName");
			}
		
			$this->changeParameterName($responseWebMDTO, "ResultCode", "resultCd");
			$this->changeParameterName($responseWebMDTO, "ResultMsg", "resultMsg");
			$this->changeParameterName($responseWebMDTO, "CardQuota", "cardQuota");
			$this->changeParameterName($responseWebMDTO, "CardNum", "cardNo");
			$this->changeParameterName($responseWebMDTO, "CardPoint", "cardPoint");
			$this->changeParameterName($responseWebMDTO, "UsePoint", "usePoint");
			$this->changeParameterName($responseWebMDTO, "BalancePoint", "balancePoint");
			$this->changeParameterName($responseWebMDTO, "VbankNum", "vbankNum");
			$this->changeParameterName($responseWebMDTO, "VbankExpDate", "vbankExpDate");
			$this->changeParameterName($responseWebMDTO, "ReceiptType", "cashReceiptType");
			$this->changeParameterName($responseWebMDTO, "ReceiptTypeNo", "receiptTypeNo");
	
			return $responseWebMDTO;
		}
		
		
		private function changeParameterName($responseWebMDTO,	$fromName, $toName) {
			
			
			// TODO Auto-generated method stub
			if($responseWebMDTO->getParameter($fromName) == "null"){
				
				$responseWebMDTO->setParameter($toName, "");
				$responseWebMDTO->removeParameter($fromName);
			}else{
			
				$responseWebMDTO->setParameter($toName, $responseWebMDTO->getParameter($fromName));
				$responseWebMDTO->removeParameter($fromName);
			}
		
		}
		/**
		 * 
		 * @param $serviceMode
		 */
		private function paramValidateByValidate($serviceMode){
			// ���������� ��� ��ǰ����,��������  ��ȿ�� üũ
			if(PAY_SERVICE_CODE == $serviceMode){
				$goodsValidator = new GoodsMessageDataValidator();
				$goodsValidator->validate($this->webMessageDTO);
				
				$merchantValidator = new MerchantMessageDataValidator();
				$merchantValidator->validate($this->webMessageDTO);
				
				$buyerValidator = new BuyerMessageDataValidator();
				$buyerValidator->validate($this->webMessageDTO);
				
				$bodyValidatorFactory = new BodyMessageValidatorFactory();
				$bodyValidator = $bodyValidatorFactory->createValidator($this->webMessageDTO->getParameter(PAY_METHOD));
				
				if($bodyValidator!=null){
					$bodyValidator->validate($this->webMessageDTO);
				}
				
			}else if(CANCEL_SERVICE_CODE == $serviceMode){
				$cancelValidator = new CancelBodyMessageValidator();
				$cancelValidator->validate($this->webMessageDTO);
			}else if(ESCROW_SERVICE_CODE == $serviceMode){
				$bodyValidatorFactory = new BodyMessageValidatorFactory();
				$bodyValidator = $bodyValidatorFactory->createValidator($this->webMessageDTO->getParameter(PAY_METHOD));
				
				if($bodyValidator!=null){
					$bodyValidator->validate($this->webMessageDTO);
				}
			}
			
			/*
			else if(CELLPHONE_REG_ITEM == $serviceMode){
				$cellphoneRegItemValidator = new CellPhoneRegItemBodyValidator();
				$cellphoneRegItemValidator->validate($this->webMessageDTO);
			}else if(CELLPHONE_SELF_DLVER == $serviceMode){
				$cellphoneSelfDeliverValidator = new CellPhoneSelfDeliverBodyValidator();
				$cellphoneSelfDeliverValidator->validate($this->webMessageDTO);
			}else if(CELLPHONE_SMS_DLVER == $serviceMode){
				$cellphoneSmsDeliverValidator = new CellPhoneSmsDeliverBodyValidator();
				$cellphoneSmsDeliverValidator->validate($this->webMessageDTO);
			}else if(CELLPHONE_ITEM_CONFM == $serviceMode){
				$cellphoneItemConfirmValidator = new CellPhoneItemConfirmBodyValidator();
				$cellphoneItemConfirmValidator->validate($this->webMessageDTO);
			}
			*/
		}



		/**
		 * Creates the io adaptor service.
		 * 
		 * @param serviceMode the service mode
		 * 
		 * @return the io adaptor service
		 * 
		 * @throws ServiceException the service exception
		 */
		private function createIoAdaptorService($serviceMode,$payMethod){
			// ���� ���ø� ����
			$msgTemplateCreator = new MessageTemplateCreator();
			
			$requestTemplateDocument = $msgTemplateCreator->createRequestDocumentTemplate($serviceMode,$payMethod);
			$responseTemplateDocument = $msgTemplateCreator->createResponseDocumentTemplate($serviceMode,$payMethod);
			
			// ����Ŭ���� ����
			$serviceFactory = new ServiceFactory();
			$ioAdaptorService  = $serviceFactory->createService($serviceMode);
			$ioAdaptorService->setRequestTemplateDocument($requestTemplateDocument);
			$ioAdaptorService->setResponseTemplateDocument($responseTemplateDocument);
			
			
			// ���������� ��� ��ȣȭ ������ ó�� ���
			if(PAY_SERVICE_CODE == $serviceMode){
				$ioAdaptorService->registerSecureMessageProcessor(new SecureMessageProcessor());
			}
				
			// socket ��� Ŭ���� ����
			$tpayIoAdaptorTransport = new TPayIoAdaptorTransport();
			//$tpayIoAdaptorTransport->setSocketFactory();
			$ioAdaptorService->setTransport($tpayIoAdaptorTransport);
			return $ioAdaptorService;
		}
		
		/**
		 * Sets the param.
		 * 
		 * @param key the key
		 * @param value the value
		 */
		public function setParam($key, $value){
			$this->webMessageDTO->setParameter($key, $value);
		}
		
		/**
		 * Gets the param.
		 * 
		 * @param key the key
		 * 
		 * @return the param
		 */
		public function getParam($key){
			return $this->webMessageDTO->getParameter($key);
		}
		
		/**
		 * Sets the secure target params.
		 * 
		 * @param targetParams the target params
		 */
		public function setSecureTargetParams($targetParams){
			$this->webMessageDTO->setParameter(SECURE_PARAMS, $targetParams);
		}
		
	}
?>
