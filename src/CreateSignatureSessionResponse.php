<?php


namespace Lacuna\RestPki;

/**
 * Class CreateSignatureSessionResponse
 * @package Lacuna\RestPki
 *
 * @property string $sessionId
 * @property string $redirectUrl
 */
class CreateSignatureSessionResponse
{
    public $sessionId;
    public $redirectUrl;

    public function __construct($model)
    {
        $this->sessionId = $model->sessionId;
        $this->redirectUrl = $model->redirectUrl;
    }
}