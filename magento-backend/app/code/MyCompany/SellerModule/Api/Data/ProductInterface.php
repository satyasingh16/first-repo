<?php
namespace MyCompany\SellerModule\Api\Data;

interface ProductInterface
{
    const ENTITY_ID = 'entity_id';
    const SELLER_ID = 'seller_id';
    const PRODUCT_ID = 'product_id';

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
     * @return int
     */
    public function getProductId();

    /**
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);
}
