<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Server;

use Emico\RobinHqLib\Config\Config;
use Psr\Container\ContainerInterface;

class RestApiServerFactory
{
    /**
     * @param ContainerInterface $container
     * @return RestApiServer
     */
    public function __invoke(ContainerInterface $container)
    {
        /** @var Config $config */
        $config = $container->get(Config::class);
        return new RestApiServer($config);
    }
}