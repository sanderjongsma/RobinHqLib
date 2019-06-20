<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Client;


use Emico\RobinHqLib\Config\Config;
use Emico\RobinHqLib\Config\ConfigInterface;
use Emico\RobinHqLib\Model\Collection;
use Emico\RobinHqLib\Model\Customer;
use Emico\RobinHqLib\Model\Order;
use GuzzleHttp\Client;
use JsonSerializable;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class RobinClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var Config
     */
    private $config;

    /**
     * RobinClient constructor.
     * @param ConfigInterface $config
     * @param LoggerInterface $logger
     */
    public function __construct(ConfigInterface $config, LoggerInterface $logger)
    {
        $this->httpClient = new Client(['base_uri' => $config->getApiUri()]);
        $this->logger = $logger;
        $this->config = $config;
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
     * @throws InvalidApiResponseException
     */
    protected function post(string $path, $payload): ResponseInterface
    {
        $this->logger->debug('Payload: ' . \GuzzleHttp\json_encode($payload));

        $response = $this->httpClient->post($path, [
            'auth' => [ $this->config->getApiKey(), $this->config->getApiSecret() ],
            'json' => $payload
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new InvalidApiResponseException('Invalid statuscode received ' . $response->getStatusCode());
        }

        return $response;
    }
}