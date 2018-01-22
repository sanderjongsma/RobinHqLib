<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Model;


use DateTimeInterface;

class Order
{
    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var string
     */
    protected $emailAddress;

    /**
     * @var float
     */
    protected $revenue;

    /**
     * @var float
     */
    protected $oldRevenue;

    /**
     * @var float
     */
    protected $profit;

    /**
     * @var float
     */
    protected $oldProfit;

    /**
     * @var DateTimeInterface
     */
    protected $orderDate;

    /**
     * @var bool
     */
    protected $firstOrder;

    /**
     * @return string
     */
    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     */
    public function setOrderNumber(string $orderNumber)
    {
        $this->orderNumber = $orderNumber;
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return DateTimeInterface
     */
    public function getOrderDate(): DateTimeInterface
    {
        return $this->orderDate;
    }

    /**
     * @param DateTimeInterface $orderByData
     */
    public function setOrderDate(DateTimeInterface $orderByData)
    {
        $this->orderDate = $orderByData;
    }

    /**
     * @return float
     */
    public function getRevenue(): float
    {
        return $this->revenue;
    }

    /**
     * @param float $revenue
     */
    public function setRevenue(float $revenue)
    {
        $this->revenue = $revenue;
    }

    /**
     * @return float
     */
    public function getOldRevenue(): float
    {
        return $this->oldRevenue;
    }

    /**
     * @param float $oldRevenue
     */
    public function setOldRevenue(float $oldRevenue)
    {
        $this->oldRevenue = $oldRevenue;
    }

    /**
     * @return float
     */
    public function getProfit(): float
    {
        return $this->profit;
    }

    /**
     * @param float $profit
     */
    public function setProfit(float $profit)
    {
        $this->profit = $profit;
    }

    /**
     * @return float
     */
    public function getOldProfit(): float
    {
        return $this->oldProfit;
    }

    /**
     * @param float $oldProfit
     */
    public function setOldProfit(float $oldProfit)
    {
        $this->oldProfit = $oldProfit;
    }

    /**
     * @return bool
     */
    public function isFirstOrder(): bool
    {
        return $this->firstOrder;
    }

    /**
     * @param bool $firstOrder
     */
    public function setFirstOrder(bool $firstOrder)
    {
        $this->firstOrder = $firstOrder;
    }
}