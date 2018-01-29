<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Server;


use Emico\RobinHqLib\DataProvider\DataProviderInterface;
use Emico\RobinHqLib\DataProvider\Exception\DataNotFoundException;
use Emico\RobinHqLib\DataProvider\Exception\InvalidRequestException;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\JsonResponse;

class RestApiServer
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiSecret;

    /**
     * RestApiServer constructor.
     * @param string $apiKey
     * @param string $apiSecret
     */
    public function __construct(string $apiKey, string $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DataProviderInterface $dataProvider
     * @return ResponseInterface
     */
    public function handleRequest(ServerRequestInterface $request, DataProviderInterface $dataProvider): ResponseInterface
    {
        if (!$this->authenticateRequest($request)) {
            return new JsonResponse(['message' => 'Authentication failed'], 401);
        }

        try {
            $data = $dataProvider->fetchData($request);
        } catch (DataNotFoundException $e) {
            return new JsonResponse(['message' => $e->getMessage()], 404);
        } catch (InvalidRequestException $e) {
            return new JsonResponse(['message' => $e->getMessage()], 400);
        } catch (Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 500);
        }
        return new JsonResponse($data);
    }

    /**
     * Authenticate request using Basic Authentication
     *
     * @param ServerRequestInterface $request
     * @return bool
     */
    protected function authenticateRequest(ServerRequestInterface $request): bool
    {
        $serverParams = $request->getServerParams();

        if (!isset($serverParams["PHP_AUTH_USER"]) || !isset($serverParams["PHP_AUTH_PW"])) {
            return false;
        }

        $key = $serverParams["PHP_AUTH_USER"];
        $secret = $serverParams["PHP_AUTH_PW"];

        if ($key !== $this->apiKey || $secret !== $this->apiSecret) {
            return false;
        }

        return true;
    }
}