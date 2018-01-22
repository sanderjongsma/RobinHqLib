<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Queue\Serializer;


use Emico\RobinHqLib\Event\EventInterface;

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
        // @todo check allowed classes
        return unserialize($event);
    }
}