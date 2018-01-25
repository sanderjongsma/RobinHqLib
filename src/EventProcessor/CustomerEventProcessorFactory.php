<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Queue\EventInterface;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class CustomerEventProcessorFactory
{
    /**
     * @param ContainerInterface $container
     * @return CustomerEventProcessor
     */
    public function __invoke(ContainerInterface $container)
    {
        return new CustomerEventProcessor($container->get(RobinClient::class));
    }
}