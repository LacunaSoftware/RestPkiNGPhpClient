<?php


namespace Lacuna\RestPki;

/**
 * Class SignatureSessionDetails
 * @package Lacuna\RestPki
 */
class SignatureSessionDetails
{
    private $_id;
    private $_status;
    private $_callbackArgument;
    private $_documents;

    public function __construct($model)
    {
        $this->_id = $model->id;
        $this->_key = $model->key;
        $this->_status = $model->status;
        $this->_callbackArgument = $model->callbackArgument;
        $this->_documents = array();
        foreach ($model->documents as $documentModel) {
            array_push($this->_documents, new DocumentInfo($documentModel));
        }
    }

    /**
     * Gets the array of Document classes.
     *
     * @return Document[] The array of document classes.
     */
    public function getDocuments()
    {
        return $this->_documents;
    }

    /**
     * Gets the session id.
     *
     * @return string The session id.
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Gets the session key.
     *
     * @return string The session key.
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * Gets the callback argument given during the session creation.
     *
     * @return string The callback argument.
     */
    public function getCallbackArgument()
    {
        return $this->_callbackArgument;
    }

    /**
     * Gets the session status.
     *
     * @return SignatureSessionStatus The session status.
     */
    public function getStatus()
    {
        return $this->_status;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case "id":
                return $this->getId();
            case "key":
                return $this->getKey();
            case "callbackArgument":
                return $this->getCallbackArgument();
            case "documents":
                return $this->getDocuments();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case "id":
                return isset($this->_id);
            case "key":
                return isset($this->_key);
            case "callbackArgument":
                return isset($this->_callbackArgument);
            case "documents":
                return isset($this->_documents);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }
}