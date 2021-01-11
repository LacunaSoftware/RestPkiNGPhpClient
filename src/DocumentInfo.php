<?php


namespace Lacuna\RestPki;

/**
 * Class DocumentsStatus
 * @package Lacuna\RestPki
 */
class DocumentsStatus
{
    const PENDING_SIGNATURE = 'PendingSignature';
    const PROCESSING = 'Processing';
    const COMPLETED = 'Completed';
    const PROCESSING_ERROR = 'ProcessingError';
}

/**
 * @internal
 *
 * Class DocumentFile
 * @package Lacuna\RestPki
 */
class DocumentFile
{
    /** @var string */
    public $name;

    /** @var int */
    public $length;

    /** @var string */
    public $contentType;

    /** @var string */
    public $location;

    public function __construct($model)
    {
        $this->name = $model->name;
        $this->length = $model->length;
        $this->contentType = $model->contentType;
        $this->location = $model->location;
    }
}

/**
 * Class DocumentInfo
 * @package Lacuna\RestPki
 * 
 * @property string $id
 * @property string $key
 * @property DocumentFile $originalFile
 * @property DocumentFile $signedFile
 * @property string $status
 * @property string $signatureType
 */
class DocumentInfo
{
    /** @var string */
    public $id;

    /** @var string */
    public $key;

    /** @var DocumentFile */
    public $originalFile;

    /** @var DocumentFile */
    public $signedFile;

    /** @var string */
    public $status;

    /** @var string */
    public $signatureType;
    
    public function __construct($model)
    {
        $this->id = $model->id;
        $this->key = $model->key;
        if (isset($model->originalFile)) {
            $this->originalFile = new DocumentFile($model->originalFile);
        }
        if (isset($model->signedFile)) {
            $this->signedFile = new DocumentFile($model->signedFile);
        }
        $this->status = $model->status;
        $this->signatureType = $model->signatureType;
    }
}
