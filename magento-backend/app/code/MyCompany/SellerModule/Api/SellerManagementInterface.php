<?php
namespace MyCompany\SellerModule\Api;

interface SellerManagementInterface
{
    /**
     * Get seller products
     *
     * @param int $sellerId
     * @return \MyCompany\SellerModule\Api\Data\ProductInterface[]
     */
    public function getProducts($sellerId);

    /**
     * Save a seller product
     *
     * @param int $sellerId
     * @param \MyCompany\SellerModule\Api\Data\ProductInterface $product
     * @return \MyCompany\SellerModule\Api\Data\ProductInterface
     */
    public function saveProduct($sellerId, \MyCompany\SellerModule\Api\Data\ProductInterface $product);

    /**
     * Delete a seller product
     *
     * @param int $sellerId
     * @param int $entityId
     * @return bool
     */
    public function deleteProduct($sellerId, $entityId);

    /**
     * Get seller orders
     *
     * @param int $sellerId
     * @return \MyCompany\SellerModule\Api\Data\OrderInterface[]
     */
    public function getOrders($sellerId);

    /**
     * Save a seller order
     *
     * @param int $sellerId
     * @param \MyCompany\SellerModule\Api\Data\OrderInterface $order
     * @return \MyCompany\SellerModule\Api\Data\OrderInterface
     */
    public function saveOrder($sellerId, \MyCompany\SellerModule\Api\Data\OrderInterface $order);

    /**
     * Delete a seller order
     *
     * @param int $sellerId
     * @param int $entityId
     * @return bool
     */
    public function deleteOrder($sellerId, $entityId);

    /**
     * Get seller payments
     *
     * @param int $sellerId
     * @return \MyCompany\SellerModule\Api\Data\PaymentInterface[]
     */
    public function getPayments($sellerId);

    /**
     * Save a seller payment
     *
     * @param int $sellerId
     * @param \MyCompany\SellerModule\Api\Data\PaymentInterface $payment
     * @return \MyCompany\SellerModule\Api\Data\PaymentInterface
     */
    public function savePayment($sellerId, \MyCompany\SellerModule\Api\Data\PaymentInterface $payment);

    /**
     * Delete a seller payment
     *
     * @param int $sellerId
     * @param int $entityId
     * @return bool
     */
    public function deletePayment($sellerId, $entityId);
}
