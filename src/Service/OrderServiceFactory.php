<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Service;


use Emico\RobinHqLib\Queue\QueueInterface;
use Psr\Container\ContainerInterface;

class OrderServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return OrderService
     */
    public function __invoke(ContainerInterface $container)
    {
        return new OrderService($container->get(QueueInterface::class));
    }
}