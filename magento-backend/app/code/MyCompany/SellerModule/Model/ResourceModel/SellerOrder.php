<?php
namespace MyCompany\SellerModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SellerOrder extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('seller_order', 'entity_id');
    }
}
