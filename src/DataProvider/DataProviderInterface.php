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
    /**
     * @param ServerRequestInterface $request
     * @return JsonSerializable
     */
    public function fetchData(ServerRequestInterface $request): JsonSerializable;
}