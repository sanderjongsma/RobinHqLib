<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Event\EventInterface;
use Emico\RobinHqLib\Event\OrderEvent;

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
     * @param EventInterface $event
     * @return bool
     * @todo logging
     */
    public function processEvent(EventInterface $event)
    {
        if (!$event instanceof OrderEvent) {
            return false;
        }
        try {
            $this->robinClient->postDynamicOrder($event->getOrder());
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }
}