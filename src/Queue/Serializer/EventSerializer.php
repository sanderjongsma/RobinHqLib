<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Queue\Serializer;


use DateTimeImmutable;
use Emico\RobinHqLib\Event\CustomerEvent;
use Emico\RobinHqLib\Event\EventInterface;
use Emico\RobinHqLib\Event\OrderEvent;
use Emico\RobinHqLib\Model\Customer;
use Emico\RobinHqLib\Model\Order;

class EventSerializer
{
    /**
     * @param EventInterface $event
     * @return string
     */
    public function serializeEvent(EventInterface $event): string
    {
        return serialize($event);
    }

    /**
     * @param string $event
     * @return EventInterface
     */
    public function unserializeEvent(string $event): EventInterface
    {
        return unserialize(
            $event,
            [
                'allowed_classes' => [
                    CustomerEvent::class,
                    Customer::class,
                    OrderEvent::class,
                    Order::class,
                    DateTimeImmutable::class
                ]
            ]
        );
    }
}