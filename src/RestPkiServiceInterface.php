<?php


namespace Lacuna\RestPki;

/**
 * interface RestPkiServiceInterface
 * @package Lacuna\RestPki
 */
interface RestPkiServiceInterface
{
    // Documents
    public function getDocument($documentId);
    public function openRead($downloadLink);
    public function getContent($downloadLink);

    // Signature Session
    public function getSignatureSession($sessionId);
    public function createSignatureSession($sessionRequest, $subscriptionId = null);
}