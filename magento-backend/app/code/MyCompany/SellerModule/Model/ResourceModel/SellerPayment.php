<?php
namespace MyCompany\SellerModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SellerPayment extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('seller_payment', 'entity_id');
    }
}
