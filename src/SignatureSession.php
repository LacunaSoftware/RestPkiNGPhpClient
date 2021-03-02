<?php


namespace Lacuna\RestPki;

/**
 * Class SignatureSession
 * @package Lacuna\RestPki
 */
class SignatureSession
{
    public $id;
    public $status;
    public $callbackArgument;
    public $documents;

    public function __construct($model)
    {
        $this->id = $model->id;
        $this->status = $model->status;
        $this->callbackArgument = $model->callbackArgument;
        $this->documents = array();
        foreach ($model->documents as $documentModel) {
            array_push($this->documents, new SignatureSessionDocument($documentModel));
        }
    }
}
