<?php


namespace Lacuna\RestPki;

/**
 * Class SignatureSessionDocument
 * @package Lacuna\RestPki
 *
 * @property DocumentStatus $status
 * @property DataTime $dateSigned
 */
class SignatureSessionDocument extends Document
{
    public $status;
    public $dateSigned;

    public function __construct($model)
    {
        parent::__construct($model);
        $this->status = $model->status;
        if (isset($model->dateSigned)) {
            $this->dateSigned = $model->dateSigned;
        }
    }
}