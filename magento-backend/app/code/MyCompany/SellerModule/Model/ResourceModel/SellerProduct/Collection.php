<?php
namespace MyCompany\SellerModule\Model\ResourceModel\SellerProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MyCompany\SellerModule\Model\SellerProduct as Model;
use MyCompany\SellerModule\Model\ResourceModel\SellerProduct as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
