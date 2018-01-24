<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Model;


use DateTime;
use DateTimeInterface;

class Order implements \JsonSerializable
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
     * @var array
     */
    protected $listView;

    /**
     * @var array
     */
    protected $detailsView;

    /**
     * Order constructor.
     * @param string $orderNumber
     */
    public function __construct(string $orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

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
     * @return DateTimeInterface
     */
    public function getOrderDate(): DateTimeInterface
    {
        return $this->orderDate;
    }

    /**
     * @param DateTimeInterface $orderDate
     */
    public function setOrderDate(DateTimeInterface $orderDate)
    {
        $this->orderDate = $orderDate;
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

    /**
     * @return array
     */
    public function getListView(): array
    {
        return $this->listView;
    }

    /**
     * @param array $listView
     */
    public function setListView(array $listView)
    {
        $this->listView = $listView;
    }

    /**
     * @return array
     */
    public function getDetailsView(): array
    {
        return $this->detailsView;
    }

    /**
     * @param array $detailsView
     */
    public function setDetailsView(array $detailsView)
    {
        $this->detailsView = $detailsView;
    }

    /**
     * @param DetailsView $detailsView
     */
    public function addDetailsView(DetailsView $detailsView)
    {
        $this->detailsView[] = $detailsView;
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
            'order_number' => $this->orderNumber,
            'email_address' => $this->emailAddress,
            'revenue' => $this->revenue,
            'old_revenue' => $this->oldRevenue,
            'order_date' => $this->orderDate->format(DateTime::ISO8601),
            'is_first_order' => $this->firstOrder
        ];

        if ($this->oldProfit !== null) {
            $data['old_profit'] = $this->oldProfit;
        }

        if ($this->profit !== null) {
            $data['profit'] = $this->profit;
        }

        return $data;
    }
}