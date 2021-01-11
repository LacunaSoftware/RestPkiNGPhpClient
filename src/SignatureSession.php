<?php


namespace Lacuna\RestPki;

/**
 * Class SignatureSession
 * @package Lacuna\RestPki
 */
class SignatureSession
{
    protected $_client;

    /**
     * SignatureSession constructor.
     * @param RestPkiClient $client
     */
    public function __construct($client)
    {
        $this->_client = $client;
    }

    /**
     * @param CreateSignatureSessionRequest $sessionRequest
     * @param null $subscriptionId
     */
    public function createSignatureSession($sessionRequest, $subscriptionId = null){
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

        $response = $client->post('/api/signature-sessions', $request);
        return new CreateSignatureSessionResponse($response->getBodyAsJson());
    }

    /**
     * @param string sessionId
     */
    public function getSignatureSession($sessionId){
        $client = $this->_client->getRestClient();
        $response = $client->get('/api/signature-sessions/' . $sessionId);
        return new SignatureSessionDetails($response->getBodyAsJson());
    }

    /**
     * @param string sessionId
     */
    public function getSignatureSessionCompletionStatus($sessionId){
        $client = $this->_client->getRestClient();
        $response = $client->get('/api/signature-sessions/' . $sessionId . '/when-completed');
        return new SessionCompletionStatus($response->getBodyAsJson());
    }
}
