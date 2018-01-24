<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\DataProvider;

use JsonSerializable;
use Psr\Http\Message\ServerRequestInterface;

interface DataProviderInterface
{
    public function fetchData(ServerRequestInterface $request): JsonSerializable;
}