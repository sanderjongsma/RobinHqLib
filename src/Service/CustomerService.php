<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Service;


use Emico\RobinHqLib\Event\CustomerEvent;
use Emico\RobinHqLib\Model\Customer;
use Emico\RobinHqLib\Queue\QueueInterface;
use Emico\RobinHqLib\Queue\Serializer\EventSerializer;

class CustomerService
{
    /**
     * @var QueueInterface
     */
    private $queue;

    /**
     * @var EventSerializer
     */
    private $eventSerializer;

    /**
     * CustomerService constructor.
     * @param QueueInterface $queue
     */
    public function __construct(QueueInterface $queue)
    {
        $this->queue = $queue;
        $this->eventSerializer = new EventSerializer();
    }

    /**
     * @param Customer $customer
     */
    public function postCustomer(Customer $customer)
    {
        $event = new CustomerEvent($customer);
        $this->queue->pushEvent($this->eventSerializer->serializeEvent($event));
    }
}