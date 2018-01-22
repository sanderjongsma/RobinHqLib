<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Queue;


use Emico\RobinHqLib\Service\EventProcessingService;

interface QueueInterface
{
    /**
     * @param string $event
     * @return bool
     */
    public function pushEvent(string $event): bool;

    /**
     * @param int $maxItems
     */
    public function processQueue($maxItems = 100);

    /**
     * @param EventProcessingService $eventProcessingService
     * @return void
     */
    public function setEventProcessingService(EventProcessingService $eventProcessingService);
}