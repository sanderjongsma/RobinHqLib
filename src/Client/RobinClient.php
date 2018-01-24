<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Client;


use Emico\RobinHqLib\Model\Order;
use GuzzleHttp\Client;

class RobinClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * RobinClient constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param Order[] $orders
     */
    public function postDynamicOrders(array $orders = [])
    {
        echo 'POST dynamic' . PHP_EOL;
    }
}