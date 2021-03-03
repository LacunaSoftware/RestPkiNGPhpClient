<?php


namespace Lacuna\RestPki;

use Psr\Http\Message\StreamInterface;

/**
 * Class RestPkiService
 * @package Lacuna\RestPki
 */
class RestPkiService implements RestPkiServiceInterface
{
    protected $_client;

    /**
     * RestPkiService constructor.
     * @param RestPkiCoreClient $client
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * @param string $documentId
     * @return Document
     */
    public function getDocument($documentId)
    {
        if (empty($documentId)) {
            throw new \Exception("The document ID was not given.");
        }
        $client = $this->_client->getRestClient();
        $response = $client->get('api/documents/' . $documentId);
        return new Document($response->getBodyAsJson());
    }

    /**
     * @param string $key
     * @return Document
     */
    public function findDocumentByKey($key)
    {
        if (empty($key)) {
            throw new \Exception("The document key was not given.");
        }
        $client = $this->_client->getRestClient();
        $response = $client->get('api/documents/keys/' . $key);
        return new Document($response->getBodyAsJson());
    }

    /**
     * @param string $documentId
     * @return Signer[]
     */
    public function getDocumentSigners($documentId)
    {
        if (empty($documentId)) {
            throw new \Exception("The document ID was not given.");
        }
        $client = $this->_client->getRestClient();
        $response = $client->get('api/documents/' . $documentId . "/signers");
        $model = $response->getBodyAsJson();
        $signers = array();
        if (isset($model->signers)) {
            foreach ($model->signers as $signerModel) {
                array_push($signers, new Signer($signerModel));
            }
        }
        return $signers;
    }

    /**
     * @param string $downloadLink
     * @return StreamInterface
     */
    public function openRead($downloadLink)
    {
        if (empty($downloadLink)) {
            throw new \Exception("The download link was not given.");
        }
        $client = $this->_client->getRestClient();
        return $client->openStream($downloadLink);
    }

    /**
     * @param string $downloadLink
     * @return string|false
     */
    public function getContent($downloadLink)
    {
        if (empty($downloadLink)) {
            throw new \Exception("The download link was not given.");
        }
        $stream = $this->openRead($downloadLink);
        $content = $stream->getContents();
        $stream->close();
        return $content;
    }

    /**
     * @param string $sessionId
     * @return SignatureSession
     */
    public function getSignatureSession($sessionId)
    {
        if (empty($sessionId)) {
            throw new \Exception("The session ID was not given.");
        }
        $client = $this->_client->getRestClient();
        $response = $client->get('api/signature-sessions/' . $sessionId);
        return new SignatureSession($response->getBodyAsJson());
    }

    /**
     * @param CreateSignatureSessionRequest $sessionRequest
     * @param string $subscriptionId
     * @return CreateSignatureSessionResponse
     */
    public function createSignatureSession($sessionRequest, $subscriptionId = null)
    {
        if (empty($sessionRequest->returnUrl) && !$sessionRequest->enableBackgroundProcessing) {
            throw new \Exception("The return URL was not given and the Background Processing is not enabled.");
        }
        $request = [
            'returnUrl' => $sessionRequest->returnUrl,
            'securityContextId' => $sessionRequest->securityContextId,
            'callbackArgument' => $sessionRequest->callbackArgument,
            'enableBackgroundProcessing' => $sessionRequest->enableBackgroundProcessing,
            'disableDownloads' => $sessionRequest->disableDownloads,
        ];
        $customHeaders = [];
        if (isset($subscriptionId)) {
            $customHeaders['X-Subscription'] = $subscriptionId;
        }
        $client = $this->_client->getRestClient($customHeaders);

        $response = $client->post('api/signature-sessions', $request);
        return new CreateSignatureSessionResponse($response->getBodyAsJson());
    }
}