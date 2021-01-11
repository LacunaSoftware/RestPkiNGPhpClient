<?php


namespace Lacuna\RestPki;

use Psr\Http\Message\StreamInterface;

/**
 * Class Documents
 * @package Lacuna\RestPki
 */
class Documents
{
    protected $_client;

    /**
     * Documents constructor.
     * @param RestPkiClient $client
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    public function getDocumentInfo($documentId){
        $client = $this->_client->getRestClient();
        $response = $client->get('api/documents/' . $documentId);
        return new DocumentInfo($response->getBodyAsJson());
    }
    
    public function getOriginalFileDownloadLink($documentId){
        $documentInfo = $this->getDocumentInfo($documentId);
        return $documentInfo->originalFile->location;
    }
    
    public function openReadOriginalFile($documentId){
        $client = $this->_client->getRestClient();
        $downloadLink = $this->getOriginalFileDownloadLink($documentId);
        return $client->openStream($downloadLink);
    }
    
    public function getOriginalFileContent($documentId){
        $stream = $this->openReadOriginalFile($documentId);
        $content = $stream->getContents();
        $stream->close();
        return $content;
    }

    public function writeOriginalFileToFile($documentId, $path)
    {
        $client = $this->_client->getRestClient();
        $downloadLink = $this->getOriginalFileDownloadLink($documentId);
        $client->downloadToFile($downloadLink, $path);
    }

    public function getSignedFileDownloadLink($documentId){
        $documentInfo = $this->getDocumentInfo($documentId);
        return $documentInfo->signedFile->location;
    }
    
    public function openReadSignedFile($documentId){
        $client = $this->_client->getRestClient();
        $downloadLink = $this->getSignedFileDownloadLink($documentId);
        return $client->openStream($downloadLink);
    }
    
    public function getSignedFileContent($documentId){
        $stream = $this->openReadSignedFile($documentId);
        $content = $stream->getContents();
        $stream->close();
        return $content;
    }

    public function writeSignedFileToFile($documentId, $path)
    {
        $client = $this->_client->getRestClient();
        $downloadLink = $this->getSignedFileDownloadLink($documentId);
        $client->downloadToFile($downloadLink, $path);
    }
}