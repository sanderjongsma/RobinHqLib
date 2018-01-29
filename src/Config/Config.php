<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Config;


class Config
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiSecret;

    /**
     * @var string
     */
    protected $apiUri = 'https://api.robinhq.com/';

    /**
     * @var string
     */
    protected $apiServerKey;

    /**
     * @var string
     */
    protected $apiServerSecret;

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    /**
     * @param string $apiSecret
     */
    public function setApiSecret(string $apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return string
     */
    public function getApiUri(): string
    {
        return $this->apiUri;
    }

    /**
     * @param string $apiUri
     */
    public function setApiUri(string $apiUri)
    {
        $this->apiUri = $apiUri;
    }

    /**
     * @return string
     */
    public function getApiServerKey(): string
    {
        return $this->apiServerKey;
    }

    /**
     * @param string $apiServerKey
     */
    public function setApiServerKey(string $apiServerKey)
    {
        $this->apiServerKey = $apiServerKey;
    }

    /**
     * @return string
     */
    public function getApiServerSecret(): string
    {
        return $this->apiServerSecret;
    }

    /**
     * @param string $apiServerSecret
     */
    public function setApiServerSecret(string $apiServerSecret)
    {
        $this->apiServerSecret = $apiServerSecret;
    }
}