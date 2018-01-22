<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Service;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Queue\Serializer\EventSerializer;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class EventProcessingServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new EventProcessingService(
            $container->get(RobinClient::class),
            new NullLogger()
        );
    }
}