<?php


namespace Lacuna\RestPki;

/**
 * Class RestPkiClient
 * @package Lacuna\RestPki
 */
class RestPkiClient
{
    protected $_restClient;
    private $options;

    /**
     * RestPkiClient constructor.
     * @param RestPkiOptions $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * @public
     *
     * Gets an client to perform the HTTP requests.
     *
     * @param $customRequestHeaders array
     * @return RestClient The REST client used to perform the HTTP requests.
     */
    public function getRestClient($customRequestHeaders = [])
    {
        if (!isset($this->_restClient)) {
            $this->_restClient = new RestClient(
                $this->options->endpoint,
                $this->options->apiKey,
                $customRequestHeaders,
                $this->options->cultureName,
                $this->options->usePhpCAInfo,
                $this->options->caInfoPath
            );
        }
        if (!empty($customRequestHeaders)) {
            $this->_restClient->customRequestHeaders = $customRequestHeaders;
        }
        return $this->_restClient;
    }
}
