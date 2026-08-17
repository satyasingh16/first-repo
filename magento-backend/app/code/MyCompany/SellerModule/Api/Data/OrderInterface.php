<?php
namespace MyCompany\SellerModule\Api\Data;

interface OrderInterface
{
    const ENTITY_ID = 'entity_id';
    const SELLER_ID = 'seller_id';
    const ORDER_ID = 'order_id';
    const COMMISSION = 'commission';

    /**
     * @return int|null
     */
    public function getEntityId();

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * @return int
     */
    public function getSellerId();

    /**
     * @param int $sellerId
     * @return $this
     */
    public function setSellerId($sellerId);

    /**
     * @return int
     */
    public function getOrderId();

    /**
     * @param int $orderId
     * @return $this
     */
    public function setOrderId($orderId);

    /**
     * @return float
     */
    public function getCommission();

    /**
     * @param float $commission
     * @return $this
     */
    public function setCommission($commission);
}
