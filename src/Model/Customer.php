<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Model;

use DateTime;
use DateTimeInterface;
use JsonSerializable;

class Customer implements JsonSerializable
{
    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var DateTimeInterface
     */
    protected $customerSince;

    /**
     * @var int
     */
    protected $orderCount;

    /**
     * @var float
     */
    protected $totalRevenue;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var DateTimeInterface
     */
    protected $lastOrderDate;

    /**
     * @var array
     */
    protected $panelView;

    /**
     * Customer constructor.
     * @param string $emailAddress
     */
    public function __construct(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress(string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCustomerSince(): DateTimeInterface
    {
        return $this->customerSince;
    }

    /**
     * @param DateTimeInterface $customerSince
     */
    public function setCustomerSince(DateTimeInterface $customerSince)
    {
        $this->customerSince = $customerSince;
    }

    /**
     * @return int
     */
    public function getOrderCount(): int
    {
        return $this->orderCount;
    }

    /**
     * @param int $orderCount
     */
    public function setOrderCount(int $orderCount)
    {
        $this->orderCount = $orderCount;
    }

    /**
     * @return float
     */
    public function getTotalRevenue(): float
    {
        return $this->totalRevenue;
    }

    /**
     * @param float $totalRevenue
     */
    public function setTotalRevenue(float $totalRevenue)
    {
        $this->totalRevenue = $totalRevenue;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return DateTimeInterface
     */
    public function getLastOrderDate(): DateTimeInterface
    {
        return $this->lastOrderDate;
    }

    /**
     * @param DateTimeInterface $lastOrderDate
     */
    public function setLastOrderDate(DateTimeInterface $lastOrderDate)
    {
        $this->lastOrderDate = $lastOrderDate;
    }

    /**
     * @return array
     */
    public function getPanelView(): array
    {
        return $this->panelView;
    }

    /**
     * @param array $panelView
     */
    public function setPanelView(array $panelView)
    {
        $this->panelView = $panelView;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getEmailAddress();
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        $data = [
            'email_address' => $this->emailAddress,
            'customer_since' => $this->customerSince->format(DateTime::ISO8601),
            'order_count' => $this->orderCount,
            'total_revenue' => $this->totalRevenue,
            'currency' => $this->currency,
            'last_order_date' => $this->lastOrderDate->format(DateTime::ISO8601)
        ];

        if ($this->panelView) {
            $data['panel_view'] = $this->panelView;
        }

        return $data;
    }
}