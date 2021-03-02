<?php


namespace Lacuna\RestPki;

/**
 * interface RestPkiServiceInterface
 * @package Lacuna\RestPki
 */
interface RestPkiServiceInterface
{
    // Signature Session
    public function getSignatureSession($sessionId);

    public function createSignatureSession($sessionRequest, $subscriptionId = null);

    // Documents
    public function getDocument($documentId);

    public function findDocumentByKey($key);

    public function getDocumentSigners($documentId);

    public function openRead($downloadLink);

    public function getContent($downloadLink);
}