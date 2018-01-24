<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Server;


use Emico\RobinHqLib\DataProvider\DataProviderInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\JsonResponse;

class RestApiServer
{
    /**
     * @param RequestInterface $request
     * @param DataProviderInterface $dataProvider
     * @return ResponseInterface
     */
    public function handleRequest(RequestInterface $request, DataProviderInterface $dataProvider): ResponseInterface
    {
        $data = $dataProvider->fetchData($request);
        return new JsonResponse($data);
    }
}