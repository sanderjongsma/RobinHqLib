<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Client\RobinClient;
use Emico\RobinHqLib\Event\EventInterface;

class OrderEventProcessor implements EventProcessorInterface
{
    /**
     * @var RobinClient
     */
    private $robinClient;

    public function __construct(RobinClient $robinClient)
    {
        $this->robinClient = $robinClient;
    }

    /**
     * @param EventInterface $event
     * @return bool
     */
    public function processEvent(EventInterface $event)
    {
        
    }
}