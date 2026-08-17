<?php
namespace MyCompany\SellerModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SellerProduct extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('seller_product', 'entity_id');
    }
}
