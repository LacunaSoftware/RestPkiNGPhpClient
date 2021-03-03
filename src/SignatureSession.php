<?php


namespace Lacuna\RestPki;

/**
 * Class SignatureSession
 * @package Lacuna\RestPki
 * 
 * @property-read string $id
 * @property-read string $status
 * @property-read string $processingErrorCode
 * @property-read string $callbackArgument
 * @property-read PKCertificate $signerCertificate
 * @property-read SignatureSessionDocument[] $documents
 */
class SignatureSession
{
    public $_id;
    public $_status;
    public $_callbackArgument;
    public $_processingErrorCode;
    public $_signerCertificate;
    public $_documents;

    public function __construct($model)
    {
        $this->_id = $model->id;
        $this->_status = $model->status;
        $this->_callbackArgument = $model->callbackArgument;
        $this->_processingErrorCode = $model->processingErrorCode;

        if($model->signerCertificate){
            $this->_signerCertificate = new PKCertificate($model->signerCertificate);
        }

        if($model->documents) {
            $this->_documents = array();
            foreach ($model->documents as $documentModel) {
                array_push($this->_documents, new SignatureSessionDocument($documentModel));
            }
        }
    }

    public function getId(){
        return $this->_id;
    }

    public function getStatus(){
        return $this->_status;
    }

    public function getCallbackArgument(){
        return $this->_callbackArgument;
    }

    public function getProcessingErrorCode(){
        return $this->_processingErrorCode;
    }

    public function getSignerCertificate(){
        return $this->_signerCertificate;
    }

    public function getDocuments(){
        return $this->_documents;
    }

    public function __get($name)
    {
        switch ($name) {
            case "id":
                return $this->getId();
            case "status":
                return $this->getStatus();
            case "callbackArgument":
                return $this->getCallbackArgument();
            case "processingErrorCode":
                return $this->getProcessingErrorCode();
            case "signerCertificate":
                return $this->getSignerCertificate();
            case "documents":
                return $this->getDocuments();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $name);
                return null;
        }
    }

    public function __isset($name)
    {
        switch ($name) {
            case "id":
                return isset($this->_id);
            case "status":
                return isset($this->_status);
            case "callbackArgument":
                return isset($this->_callbackArgument);
            case "processingErrorCode":
                return isset($this->_processingErrorCode);
            case "signerCertificate":
                return isset($this->_signerCertificate);
            case "documents":
                return isset($this->_documents);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $name);
                return null;
        }
    }
}
