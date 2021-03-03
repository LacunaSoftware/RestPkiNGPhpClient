<?php


namespace Lacuna\RestPki;

/**
 * Class Document
 * @package Lacuna\RestPki
 *
 * @property-read SignerSummary[] $signers
 * @property-read array $metadata
 */
class Document extends DocumentSummary
{
    public $_signers;
    public $_metadata;

    public function __construct($model)
    {
        $this->_signers = array();
        if (isset($model->signers)) {
            foreach ($model->signers as $signer){
                array_push($this->_signers, new SignerSummary($signer));
            }
        }

        $this->_metadata = array();
        if (isset($model->metadata)) {
            foreach ($model->metadata as $key => $value) {
                $this->_metadata[$key] = $value;
            }
        }
    }

    /**
     * @return string The document's signers list.
     */
    public function getSigners()
    {
        return $this->_signers;
    }

    /**
     * @return array The document's metadata.
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    public function __get($attr)
    {
        switch ($attr) {
            case "signers":
                return $this->getSigners();
            case "metadata":
                return $this->getMetadata();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $attr);
                return null;
        }
    }

    public function __isset($attr)
    {
        switch ($attr) {
            case "signers":
                return isset($this->_signers);
            case "metadata":
                return isset($this->_metadata);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $attr);
                return null;
        }
    }
}
