<?php


namespace Lacuna\RestPki;

/**
 * Class SessionCompletionStatus
 * @package Lacuna\RestPki
 */
class SessionCompletionStatus
{
    /** @var bool */
    public $completed;

    /** @var float */
    public $progress;

    public function __construct($model)
    {
        $this->completed = $model->completed;
        $this->progress = $model->progress;
    }
}
