<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Model;


use DateTimeInterface;

class Customer
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->getEmailAddress();
    }
}