<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

use Emico\RobinHqLib\Event\CustomerEvent;
use Emico\RobinHqLib\Model\Customer;
use Emico\RobinHqLib\Queue\FileQueue;
use Emico\RobinHqLib\Queue\QueueInterface;
use Emico\RobinHqLib\Queue\Serializer\EventSerializer;

require __DIR__ . '/../vendor/autoload.php';
$container = require __DIR__ . '/container.php';

/** @var QueueInterface $queue */
$queue = $container->get(FileQueue::class);
/** @var EventSerializer $eventSerializer */
$eventSerializer = new EventSerializer();

$customer = new Customer();
$customer->setEmailAddress('piet@foo.bar');

$event = new CustomerEvent($customer);

$queue->pushEvent($eventSerializer->serializeEvent($event));

$queue->processQueue(100);