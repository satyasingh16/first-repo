<?php
namespace MyCompany\SellerModule\Model\ResourceModel\SellerPayment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MyCompany\SellerModule\Model\SellerPayment as Model;
use MyCompany\SellerModule\Model\ResourceModel\SellerPayment as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
