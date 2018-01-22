<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\DataProvider;

use Traversable;

interface DataProviderInterface
{
    public function fetchData(): Traversable;
}