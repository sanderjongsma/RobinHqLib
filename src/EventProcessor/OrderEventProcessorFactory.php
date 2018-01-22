<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Psr\Container\ContainerInterface;

class OrderEventProcessorFactory
{
    /**
     * @param ContainerInterface $container
     * @return OrderEventProcessor
     */
    public function __invoke(ContainerInterface $container)
    {
        return new OrderEventProcessor($container->get(RobinClient::class));
    }
}