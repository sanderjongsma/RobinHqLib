<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\EventProcessor;


use Emico\RobinHqLib\Event\EventInterface;

interface EventProcessorInterface
{
    /**
     * @param EventInterface $event
     * @return bool
     */
    public function processEvent(EventInterface $event);
}