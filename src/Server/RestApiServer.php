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
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class RestApiServer
{
    /**
     * @param ServerRequestInterface $request
     * @param DataProviderInterface $dataProvider
     * @return ResponseInterface
     */
    public function handleRequest(ServerRequestInterface $request, DataProviderInterface $dataProvider): ResponseInterface
    {
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
}