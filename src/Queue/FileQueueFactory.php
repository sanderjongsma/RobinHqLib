<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Queue;

use Emico\RobinHqLib\Service\EventProcessingService;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

class FileQueueFactory
{
    /**
     * @param ContainerInterface $container
     * @return FileQueue
     */
    public function __invoke(ContainerInterface $container)
    {
        $queue = new FileQueue(
            __DIR__ . '/../../var/queue',
            $container->get(EventProcessingService::class),
            $container->get(LoggerInterface::class)
        );

        return $queue;
    }
}