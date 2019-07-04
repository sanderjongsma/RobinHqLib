<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Client;


use Emico\RobinHqLib\Config\Config;
use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class RobinClientFactory
{
    /**
     * @param ContainerInterface $container
     * @return RobinClient
     */
    public function __invoke(ContainerInterface $container)
    {
        /** @var Config $config */
        $config = $container->get(Config::class);

        if (!$config->isApiEnabled()) {
            throw new \RuntimeException('Cannot instantiate Robin REST client. API is not enabled in configuration');
        }

        return new RobinClient($config, $container->get(LoggerInterface::class));
    }
}