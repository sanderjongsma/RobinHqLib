<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Event\CustomerEvent;
use Emico\RobinHqLib\Event\EventInterface;

class CustomerEventProcessor implements EventProcessorInterface
{
    /**
     * @var RobinClient
     */
    private $robinClient;

    /**
     * CustomerEventProcessor constructor.
     * @param RobinClient $robinClient
     */
    public function __construct(RobinClient $robinClient)
    {
        $this->robinClient = $robinClient;
    }

    /**
     * @param EventInterface $event
     * @return bool
     * @todo Logging
     */
    public function processEvent(EventInterface $event)
    {
        if (!$event instanceof CustomerEvent) {
            return false;
        }
        try {
            $this->robinClient->postDynamicCustomer($event->getCustomer());
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }
}