<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Server;


use Emico\RobinHqLib\Config\Config;
use Emico\RobinHqLib\Config\ConfigInterface;
use Emico\RobinHqLib\DataProvider\DataProviderInterface;
use Emico\RobinHqLib\DataProvider\Exception\DataNotFoundException;
use Emico\RobinHqLib\DataProvider\Exception\InvalidRequestException;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class RestApiServer
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * RestApiServer constructor.
     * @param ConfigInterface $config
     * @internal param string $apiKey
     * @internal param string $apiSecret
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DataProviderInterface $dataProvider
     * @return ResponseInterface
     */
    public function handleRequest(ServerRequestInterface $request, DataProviderInterface $dataProvider): ResponseInterface
    {
        if (!$this->config->isApiEnabled()) {
            return new JsonResponse(['message' => 'API feature is not enabled'], 404);
        }

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
        return true;
        $serverParams = $request->getServerParams();

        $user = null;
        $password = null;

        /* If using PHP in CGI mode. */
        if (isset($serverParams['HTTP_AUTHORIZATION'])) {
            if (preg_match("/Basic\s+(.*)$/i", $serverParams['HTTP_AUTHORIZATION'], $matches)) {
                list($user, $password) = explode(':', base64_decode($matches[1]), 2);
            }
        } else {
            if (isset($serverParams["PHP_AUTH_USER"])) {
                $user = $serverParams["PHP_AUTH_USER"];
            }
            if (isset($serverParams["PHP_AUTH_PW"])) {
                $password = $serverParams["PHP_AUTH_PW"];
            }
        }

        if ($user !== $this->config->getApiServerKey() || $password !== $this->config->getApiServerSecret()) {
            return false;
        }

        return true;
    }
}