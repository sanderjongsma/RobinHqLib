<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Service;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\EventProcessor\CustomerEventProcessor;
use Emico\RobinHqLib\EventProcessor\EventProcessorInterface;
use Emico\RobinHqLib\Queue\Serializer\EventSerializer;
use Psr\Log\LoggerInterface;

class EventProcessingService
{
    /**
     * @var EventSerializer
     */
    private $eventSerializer;

    /**
     * @var EventProcessorInterface[]|array
     */
    private $eventProcessors;

    /**
     * @var RobinClient
     */
    private $robinClient;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param RobinClient $robinClient
     * @param LoggerInterface $logger
     */
    public function __construct(RobinClient $robinClient, LoggerInterface $logger = null)
    {
        $this->robinClient = $robinClient;
        $this->logger = $logger;
    }

    /**
     * @param string $event
     */
    public function processEvent(string $event)
    {
        $event = $this->getEventSerializer()->unserializeEvent($event);

        $this->logger->info('Processing ' . $event . ' event');

        echo 'Handling ' . $event->getAction() . ' => ' . $event . PHP_EOL;

        switch ($event->getAction()) {
            case 'customer':
                $eventProcessor = new CustomerEventProcessor();
        }

        $eventProcessor->processEvent($event);
    }

    /**
     * @param string $action
     * @param EventProcessorInterface $eventProcessor
     */
    public function registerEventProcessor(string $action, EventProcessorInterface $eventProcessor)
    {
        $this->eventProcessors[$action] = $eventProcessor;
    }

    /**
     * @return EventSerializer
     */
    public function getEventSerializer(): EventSerializer
    {
        if (!isset($this->eventSerializer)) {
            $this->eventSerializer = new EventSerializer();
        }
        return $this->eventSerializer;
    }
}