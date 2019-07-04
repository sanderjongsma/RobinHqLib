<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Config;


interface ConfigInterface
{
    /**
     * @return string
     */
    public function getApiKey(): string;

    /**
     * @return string
     */
    public function getApiSecret(): string;

    /**
     * @return string
     */
    public function getApiUri(): string;

    /**
     * @return string
     */
    public function getApiServerKey(): string;

    /**
     * @return string
     */
    public function getApiServerSecret(): string;

    /**
     * @return bool
     */
    public function isApiEnabled(): bool;
}