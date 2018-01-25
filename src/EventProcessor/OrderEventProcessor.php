<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Event\EventInterface;
use Emico\RobinHqLib\Event\OrderEvent;
use Psr\Log\LoggerInterface;

class OrderEventProcessor implements EventProcessorInterface
{
    /**
     * @var RobinClient
     */
    private $robinClient;

    /**
     * OrderEventProcessor constructor.
     * @param RobinClient $robinClient
     */
    public function __construct(RobinClient $robinClient)
    {
        $this->robinClient = $robinClient;
    }

    /**
     * @param EventInterface|OrderEvent $event
     * @return bool
     */
    public function processEvent(EventInterface $event)
    {
        $this->robinClient->postDynamicOrder($event->getOrder());
        return true;
    }
}