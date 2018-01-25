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
     * @var string
     */
    protected $caption;

    /**
     * DetailsView constructor.
     * @param string $displayAs
     * @param array $data
     */
    public function __construct(string $displayAs, array $data)
    {
        $this->displayAs = $displayAs;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getDisplayAs(): string
    {
        return $this->displayAs;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
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
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption)
    {
        $this->caption = $caption;
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
        $data = [
            'display_as' => $this->displayAs,
            'data' => $this->data,
        ];

        if ($this->caption) {
            $data['caption'] = $this->caption;
        }

        return $data;
    }
}