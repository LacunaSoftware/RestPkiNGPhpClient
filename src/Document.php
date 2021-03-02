<?php


namespace Lacuna\RestPki;

/**
 * Class Document
 * @package Lacuna\RestPki
 *
 * @property string $id
 * @property string $key
 * @property string $formattedKey
 * @property DocumentFile $originalFile
 * @property DocumentFile $signedFile
 * @property DateTime $avaliableUntil
 * @property string $signatureType
 * @property array $metadata
 */
class Document
{
    public $id;
    public $key;
    public $formattedKey;
    public $originalFile;
    public $signedFile;
    public $avaliableUntil;
    public $signatureType;
    public $metadata = [];

    public function __construct($model)
    {
        $this->id = $model->id;
        $this->key = $model->key;
        $this->formattedKey = $model->formattedKey;
        if (isset($model->originalFile)) {
            $this->originalFile = new DocumentFile($model->originalFile);
        }
        if (isset($model->signedFile)) {
            $this->signedFile = new DocumentFile($model->signedFile);
        }
        if (isset($model->avaliableUntil)) {
            $this->avaliableUntil = new DateTime($model->avaliableUntil);
        }
        $this->signatureType = $model->signatureType;

        if (isset($model->metadata)) {
            foreach ($model->metadata as $key => $value) {
                $this->metadata[$key] = $value;
            }
        }
    }
}
