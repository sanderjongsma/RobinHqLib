<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\DataProvider;

use Emico\RobinHqLib\DataProvider\Exception\DataNotFoundException;
use Emico\RobinHqLib\DataProvider\Exception\InvalidRequestException;
use JsonSerializable;
use Psr\Http\Message\ServerRequestInterface;

interface DataProviderInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return JsonSerializable
     * @throws DataNotFoundException
     * @throws InvalidRequestException
     */
    public function fetchData(ServerRequestInterface $request): JsonSerializable;
}