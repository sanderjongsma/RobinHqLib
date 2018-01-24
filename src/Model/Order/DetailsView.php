<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Model;

use JsonSerializable;

class DetailsView implements JsonSerializable
{
    /**
     * @var string
     */
    protected $displayAs;

    /**
     * @var array
     */
    protected $data;

    /**
     * @return string
     */
    public function getDisplayAs(): string
    {
        return $this->displayAs;
    }

    /**
     * @param string $displayAs
     */
    public function setDisplayAs(string $displayAs)
    {
        $this->displayAs = $displayAs;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addData(string $key, string $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'display_as' => $this->displayAs,
            'data' => $this->data
        ];
    }
}