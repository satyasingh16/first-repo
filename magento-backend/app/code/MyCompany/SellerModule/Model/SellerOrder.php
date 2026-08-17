<?php
namespace MyCompany\SellerModule\Model;

use Magento\Framework\Model\AbstractModel;
use MyCompany\SellerModule\Api\Data\OrderInterface;

class SellerOrder extends AbstractModel implements OrderInterface
{
    protected function _construct()
    {
        $this->_init(\MyCompany\SellerModule\Model\ResourceModel\SellerOrder::class);
    }

    public function getEntityId() { return $this->getData(self::ENTITY_ID); }
    public function setEntityId($entityId) { return $this->setData(self::ENTITY_ID, $entityId); }

    public function getSellerId() { return $this->getData(self::SELLER_ID); }
    public function setSellerId($sellerId) { return $this->setData(self::SELLER_ID, $sellerId); }

    public function getOrderId() { return $this->getData(self::ORDER_ID); }
    public function setOrderId($orderId) { return $this->setData(self::ORDER_ID, $orderId); }

    public function getCommission() { return $this->getData(self::COMMISSION); }
    public function setCommission($commission) { return $this->setData(self::COMMISSION, $commission); }
}
