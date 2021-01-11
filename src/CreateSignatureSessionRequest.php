<?php


namespace Lacuna\RestPki;

/**
 * Class CreateSignatureSessionRequest
 * @package Lacuna\RestPki
 *
 * @property string $sessionId
 * @property string $redirectUrl
 */
class CreateSignatureSessionRequest
{
    private $_returnUrl;
    private $_securityContextId;
    private $_callbackArgument;
    private $_enableBackgroundProcessing;
    private $_disableDownloads;

    public function __construct(
        $returnUrl = null, $securityContextId = null, $callbackArgument = null, 
        $enableBackgroundProcessing = false, $disableDownloads = false)
    {
        $this->_returnUrl = $returnUrl;
        $this->_securityContextId = $securityContextId;
        $this->_callbackArgument = $callbackArgument;
        $this->_enableBackgroundProcessing = $enableBackgroundProcessing;
        $this->_disableDownloads = $disableDownloads;
    }

    /**
     * @return string
     */
    private function getReturnUrl()
    {
        return $this->_returnUrl;
    }

    /**
     * @param string $returnUrl
     */
    public function setReturnUrl($returnUrl)
    {
        $this->_returnUrl = $returnUrl;
    }

    /**
     * @return string
     */
    public function getSecurityContextId()
    {
        return $this->_securityContextId;
    }

    /**
     * @param string $securityContextId
     */
    public function setSecurityContextId($securityContextId)
    {
        $this->_securityContextId = $securityContextId;
    }

    /**
     * @return string
     */
    public function getCallbackArgument()
    {
        return $this->_callbackArgument;
    }

    /**
     * @param string $callbackArgument
     */
    public function setCallbackArgument($callbackArgument)
    {
        $this->_callbackArgument = $callbackArgument;
    }

    /**
     * @return bool
     */
    public function getEnableBackgroundProcessing()
    {
        return $this->_enableBackgroundProcessing;
    }

    /**
     * @param bool $enableBackgroundProcessing
     */
    public function setEnableBackgroundProcessing($enableBackgroundProcessing)
    {
        $this->_enableBackgroundProcessing = $enableBackgroundProcessing;
    }

    /**
     * @return bool
     */
    public function getDisableDownloads()
    {
        return $this->_disableDownloads;
    }

    /**
     * @param bool $disableDownloads
     */
    public function setDisableDownloads($disableDownloads)
    {
        $this->_disableDownloads = $disableDownloads;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'returnUrl':
                return $this->getReturnUrl();
            case 'securityContextId':
                return $this->getSecurityContextId();
            case 'callbackArgument':
                return $this->getCallbackArgument();
            case 'enableBackgroundProcessing':
                return $this->getEnableBackgroundProcessing();
            case 'disableDownloads':
                return $this->getDisableDownloads();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'returnUrl':
                return isset($this->_returnUrl);
            case 'securityContextId':
                return isset($this->_securityContextId);
            case 'callbackArgument':
                return isset($this->_callbackArgument);
            case 'enableBackgroundProcessing':
                return isset($this->_enableBackgroundProcessing);
            case 'disableDownloads':
                return isset($this->_disableDownloads);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'returnUrl':
                $this->setReturnUrl();
                break;
            case 'securityContextId':
                $this->setSecurityContextId();
                break;
            case 'callbackArgument':
                $this->setCallbackArgument();
                break;
            case 'enableBackgroundProcessing':
                $this->setEnableBackgroundProcessing();
                break;
            case 'disableDownloads':
                $this->setDisableDownloads();
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

}