<?php
namespace MyCompany\SellerModule\Model\ResourceModel\SellerOrder;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MyCompany\SellerModule\Model\SellerOrder as Model;
use MyCompany\SellerModule\Model\ResourceModel\SellerOrder as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
