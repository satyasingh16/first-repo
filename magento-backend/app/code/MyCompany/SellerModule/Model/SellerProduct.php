<?php
namespace MyCompany\SellerModule\Model;

use Magento\Framework\Model\AbstractModel;
use MyCompany\SellerModule\Api\Data\ProductInterface;

class SellerProduct extends AbstractModel implements ProductInterface
{
    protected function _construct()
    {
        $this->_init(\MyCompany\SellerModule\Model\ResourceModel\SellerProduct::class);
    }

    public function getEntityId() { return $this->getData(self::ENTITY_ID); }
    public function setEntityId($entityId) { return $this->setData(self::ENTITY_ID, $entityId); }

    public function getSellerId() { return $this->getData(self::SELLER_ID); }
    public function setSellerId($sellerId) { return $this->setData(self::SELLER_ID, $sellerId); }

    public function getProductId() { return $this->getData(self::PRODUCT_ID); }
    public function setProductId($productId) { return $this->setData(self::PRODUCT_ID, $productId); }
}
