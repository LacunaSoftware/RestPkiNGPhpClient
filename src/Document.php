<?php


namespace Lacuna\RestPki;

/**
 * Class Document
 * @package Lacuna\RestPki
 *
 * @property-read string $id
 * @property-read string $key
 * @property-read string $formattedKey
 * @property-read DocumentFile $originalFile
 * @property-read DocumentFile $signedFile
 * @property-read DateTime $avaliableUntil
 * @property-read string $signatureType
 * @property-read array $metadata
 */
class Document
{
    public $_id;
    public $_key;
    public $_formattedKey;
    public $_originalFile;
    public $_signedFile;
    public $_avaliableUntil;
    public $_signatureType;
    public $_metadata = [];

    public function __construct($model)
    {
        $this->_id = $model->id;
        $this->_key = $model->key;
        $this->_formattedKey = $model->formattedKey;
        if (isset($model->originalFile)) {
            $this->_originalFile = new DocumentFile($model->originalFile);
        }
        if (isset($model->signedFile)) {
            $this->_signedFile = new DocumentFile($model->signedFile);
        }
        if (isset($model->avaliableUntil)) {
            $this->_avaliableUntil = new DateTime($model->avaliableUntil);
        }
        $this->_signatureType = $model->signatureType;

        if (isset($model->metadata)) {
            foreach ($model->metadata as $key => $value) {
                $this->_metadata[$key] = $value;
            }
        }
    }

    /**
     * @return string The document's id.
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string The document's key.
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @return string The document's formatted key.
     */
    public function getFormattedKey()
    {
        return $this->_formattedKey;
    }

    /**
     * @return DocumentFile The original document.
     */
    public function getOriginalFile()
    {
        return $this->_originalFile;
    }

    /**
     * @return DocumentFile The signed document.
     */
    public function getSignedFile()
    {
        return $this->_signedFile;
    }

    /**
     * @return DateTime The last date that the document will be still avaliable.
     */
    public function getAvaliableUntil()
    {
        return $this->_avaliableUntil;
    }

    /**
     * @return string The type of signature.
     */
    public function getSignatureType()
    {
        return $this->_signatureType;
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
            case "id":
                return $this->getId();
            case "key":
                return $this->getKey();
            case "formattedKey":
                return $this->getFormattedKey();
            case "originalFile":
                return $this->getOriginalFile();
            case "signedFile":
                return $this->getSignedFile();
            case "avaliableUntil":
                return $this->getAvaliableUntil();
            case "signatureType":
                return $this->getSignatureType();
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
            case "id":
                return isset($this->_id);
            case "key":
                return isset($this->_key);
            case "formattedKey":
                return isset($this->_formattedKey);
            case "originalFile":
                return isset($this->_originalFile);
            case "signedFile":
                return isset($this->_signedFile);
            case "avaliableUntil":
                return isset($this->_avaliableUntil);
            case "signatureType":
                return isset($this->_signatureType);
            case "metadata":
                return isset($this->_metadata);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $attr);
                return null;
        }
    }
}
