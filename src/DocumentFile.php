<?php


namespace Lacuna\RestPki;

/**
 * Class DocumentFile
 * @package Lacuna\RestPki
 *
 * @property string $name
 * @property string $length
 * @property string $contentType
 * @property string $location
 */
class DocumentFile
{
    public $name;
    public $length;
    public $contentType;
    public $location;

    public function __construct($model)
    {
        $this->name = $model->name;
        $this->length = $model->length;
        $this->contentType = $model->contentType;
        $this->location = $model->location;
    }
}
