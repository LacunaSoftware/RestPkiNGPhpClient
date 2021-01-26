<?php


namespace Lacuna\RestPki;

/**
 * Class Document
 * @package Lacuna\RestPki
 *
 * @property string $id
 * @property string $key
 * @property DocumentFile $originalFile
 * @property DocumentFile $signedFile
 * @property DocumentStatus $status
 * @property string $signatureType
 */
class Document
{
    public $id;
    public $key;
    public $originalFile;
    public $signedFile;
    public $status;
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
