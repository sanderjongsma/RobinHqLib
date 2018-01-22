<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Client;


use Psr\Container\ContainerInterface;

class RobinClientFactory
{
    /**
     * @param ContainerInterface $container
     * @return RobinClient
     */
    public function __invoke(ContainerInterface $container)
    {
        return new RobinClient();
    }
}