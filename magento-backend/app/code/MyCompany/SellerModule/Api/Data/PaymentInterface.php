<?php
namespace MyCompany\SellerModule\Api\Data;

interface PaymentInterface
{
    const ENTITY_ID = 'entity_id';
    const SELLER_ID = 'seller_id';
    const AMOUNT = 'amount';
    const PAYMENT_DATE = 'payment_date';

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
     * @return float
     */
    public function getAmount();

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount($amount);

    /**
     * @return string
     */
    public function getPaymentDate();

    /**
     * @param string $paymentDate
     * @return $this
     */
    public function setPaymentDate($paymentDate);
}
