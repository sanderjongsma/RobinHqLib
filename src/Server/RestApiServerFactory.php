<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Server;


use Emico\RobinHqLib\DataProvider\DataProviderInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class RestApiServerFactory
{
    /**
     * @param ContainerInterface $container
     * @return RestApiServer
     */
    public function __invoke(ContainerInterface $container)
    {
        return new RestApiServer();
    }
}