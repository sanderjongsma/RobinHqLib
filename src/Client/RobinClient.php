<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Client;


use Emico\RobinHqLib\Model\Collection;
use Emico\RobinHqLib\Model\Customer;
use Emico\RobinHqLib\Model\Order;
use GuzzleHttp\Client;
use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

class RobinClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiSecret;

    /**
     * RobinClient constructor.
     * @param Client $httpClient
     * @param string $apiKey
     * @param string $apiSecret
     */
    public function __construct(Client $httpClient, string $apiKey, string $apiSecret)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    /**
     * @param Collection $orders
     * @return ResponseInterface
     * @see https://developers.robinhq.com/api/#!/Orders/Orders_Post
     */
    public function postOrders(Collection $orders): ResponseInterface
    {
        return $this->post('orders', $orders);
    }

    /**
     * @param Collection $orders
     * @return ResponseInterface
     * @see https://developers.robinhq.com/api/#!/Dynamic/Dynamic_Orders
     */
    public function postDynamicOrders(Collection $orders): ResponseInterface
    {
        return $this->post('dynamic/orders', ['orders' => $orders]);
    }

    /**
     * @param Order $order
     * @return ResponseInterface
     */
    public function postDynamicOrder(Order $order): ResponseInterface
    {
        return $this->postDynamicOrders(new Collection([$order]));
    }

    /**
     * @param Collection $customers
     * @return ResponseInterface
     * @see https://developers.robinhq.com/api/#!/Customers/Customers_Post
     */
    public function postCustomers(Collection $customers): ResponseInterface
    {
        return $this->post('customers', $customers);
    }

    /**
     * @param Collection $customers
     * @return ResponseInterface
     * @see https://developers.robinhq.com/api/#!/Dynamic/Dynamic_Customers
     */
    public function postDynamicCustomers(Collection $customers): ResponseInterface
    {
        return $this->post('dynamic/customers', ['customers' => $customers]);
    }

    /**
     * @param Customer $customer
     * @return ResponseInterface
     */
    public function postDynamicCustomer(Customer $customer): ResponseInterface
    {
        return $this->postDynamicCustomers(new Collection([$customer]));
    }

    /**
     * @param string $path
     * @param JsonSerializable|array $payload
     * @return ResponseInterface
     * @throws \Exception
     */
    protected function post(string $path, $payload): ResponseInterface
    {
        $response = $this->httpClient->post($path, [
            'auth' => [ $this->apiKey, $this->apiSecret ],
            'json' => $payload
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new InvalidApiResponseException('Invalid statuscode received ' . $response->getStatusCode());
        }

        return $response;
    }
}