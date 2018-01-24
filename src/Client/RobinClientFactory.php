<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Client;


use Emico\RobinHqLib\Config\Config;
use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

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
        $guzzleClient = new Client(
            [
                'base_uri' => $config->getApiUri()
            ]
        );
        return new RobinClient($guzzleClient, $config->getApiKey(), $config->getApiSecret());
    }
}