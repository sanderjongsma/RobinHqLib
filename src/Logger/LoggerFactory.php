<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Logger;


use Psr\Container\ContainerInterface;
use Psr\Log\NullLogger;

class LoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return NullLogger
     */
    public function __invoke(ContainerInterface $container)
    {
        return new NullLogger();
    }
}