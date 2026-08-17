<?php
namespace MyCompany\SellerModule\Model;

use Magento\Framework\Model\AbstractModel;
use MyCompany\SellerModule\Api\Data\PaymentInterface;

class SellerPayment extends AbstractModel implements PaymentInterface
{
    protected function _construct()
    {
        $this->_init(\MyCompany\SellerModule\Model\ResourceModel\SellerPayment::class);
    }

    public function getEntityId() { return $this->getData(self::ENTITY_ID); }
    public function setEntityId($entityId) { return $this->setData(self::ENTITY_ID, $entityId); }

    public function getSellerId() { return $this->getData(self::SELLER_ID); }
    public function setSellerId($sellerId) { return $this->setData(self::SELLER_ID, $sellerId); }

    public function getAmount() { return $this->getData(self::AMOUNT); }
    public function setAmount($amount) { return $this->setData(self::AMOUNT, $amount); }

    public function getPaymentDate() { return $this->getData(self::PAYMENT_DATE); }
    public function setPaymentDate($paymentDate) { return $this->setData(self::PAYMENT_DATE, $paymentDate); }
}
