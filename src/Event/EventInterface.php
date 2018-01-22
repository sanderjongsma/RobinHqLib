<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Event;


interface EventInterface
{
    /**
     * @return string
     */
    public function getAction(): string;

    /**
     * @return string
     */
    public function __toString(): string;
}