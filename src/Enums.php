<?php


namespace Lacuna\RestPki;

/**
 * Class SignatureTypes
 * @package Lacuna\RestPki
 */
class SignatureTypes
{
    const PADES = 'Pades';
    const CADES = 'Cades';
    const XML_D_SIG = 'XmlDSig';
}

/**
 * Class SignatureSessionStatus
 * @package Lacuna\RestPki
 */
class SignatureSessionStatus
{
    const PENDING = 'Pending'; 
    const PROCESSING = 'Processing'; 
    const COMPLETED = 'Completed'; 
    const USER_CANCELLED = 'UserCancelled'; 
    const EXPIRED = 'Expired'; 
    const PROCESSING_ERROR = 'ProcessingError';
}

/**
 * Class DocumentStatus
 * @package Lacuna\RestPki
 */
class DocumentStatus
{
    const PENDING_SIGNATURE = 'PendingSignature';
    const PROCESSING = 'Processing';
    const COMPLETED = 'Completed';
    const PROCESSING_ERROR = 'ProcessingError';
}

/**
 * Class WebhookEventTypes
 * @package Lacuna\RestPki
 */
class WebhookEventTypes
{
    const DOCUMENT_SIGNATURE_COMPLETED = 'DocumentSignatureCompleted';
}