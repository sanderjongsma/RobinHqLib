<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Event\CustomerEvent;
use Emico\RobinHqLib\Event\EventInterface;
use Exception;
use Psr\Log\LoggerInterface;

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
     * @param EventInterface|CustomerEvent $event
     * @return bool
     */
    public function processEvent(EventInterface $event)
    {
        $this->robinClient->postDynamicCustomer($event->getCustomer());
        return true;
    }
}