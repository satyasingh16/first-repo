<?php
namespace MyCompany\SellerModule\Model;

use MyCompany\SellerModule\Api\SellerManagementInterface;
use MyCompany\SellerModule\Model\ResourceModel\SellerProduct\CollectionFactory as ProductCollectionFactory;
use MyCompany\SellerModule\Model\ResourceModel\SellerOrder\CollectionFactory as OrderCollectionFactory;
use MyCompany\SellerModule\Model\ResourceModel\SellerPayment\CollectionFactory as PaymentCollectionFactory;
use MyCompany\SellerModule\Model\SellerProductFactory;
use MyCompany\SellerModule\Model\ResourceModel\SellerProduct as ProductResource;
use MyCompany\SellerModule\Model\SellerOrderFactory;
use MyCompany\SellerModule\Model\ResourceModel\SellerOrder as OrderResource;
use MyCompany\SellerModule\Model\SellerPaymentFactory;
use MyCompany\SellerModule\Model\ResourceModel\SellerPayment as PaymentResource;
use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\Exception\AuthorizationException;

class SellerManagement implements SellerManagementInterface
{
    protected $productCollectionFactory;
    protected $orderCollectionFactory;
    protected $paymentCollectionFactory;

    protected $productFactory;
    protected $productResource;
    protected $orderFactory;
    protected $orderResource;
    protected $paymentFactory;
    protected $paymentResource;

    /**
     * @var UserContextInterface
     */
    protected $userContext;

    public function __construct(
        ProductCollectionFactory $productCollectionFactory,
        OrderCollectionFactory $orderCollectionFactory,
        PaymentCollectionFactory $paymentCollectionFactory,
        SellerProductFactory $productFactory,
        ProductResource $productResource,
        SellerOrderFactory $orderFactory,
        OrderResource $orderResource,
        SellerPaymentFactory $paymentFactory,
        PaymentResource $paymentResource,
        UserContextInterface $userContext
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->paymentCollectionFactory = $paymentCollectionFactory;

        $this->productFactory = $productFactory;
        $this->productResource = $productResource;
        $this->orderFactory = $orderFactory;
        $this->orderResource = $orderResource;
        $this->paymentFactory = $paymentFactory;
        $this->paymentResource = $paymentResource;
        $this->userContext = $userContext;
    }

    protected function validateUser($sellerId)
    {
        $userId = $this->userContext->getUserId();
        if (!$userId || $userId != $sellerId) {
            throw new AuthorizationException(__('You are not authorized to access this resource.'));
        }
    }

    public function getProducts($sellerId) {
        $this->validateUser($sellerId);
        $collection = $this->productCollectionFactory->create();
        $collection->addFieldToFilter('seller_id', $sellerId);
        return $collection->getItems();
    }

    public function saveProduct($sellerId, \MyCompany\SellerModule\Api\Data\ProductInterface $product) {
        $this->validateUser($sellerId);

        if ($product->getEntityId()) {
            $existingProduct = $this->productFactory->create();
            $this->productResource->load($existingProduct, $product->getEntityId());
            if ($existingProduct->getSellerId() != $sellerId) {
                throw new AuthorizationException(__('You are not authorized to modify this resource.'));
            }
        }

        $product->setSellerId($sellerId);
        $this->productResource->save($product);
        return $product;
    }

    public function deleteProduct($sellerId, $entityId) {
        $this->validateUser($sellerId);
        $product = $this->productFactory->create();
        $this->productResource->load($product, $entityId);
        if ($product->getEntityId() && $product->getSellerId() == $sellerId) {
            $this->productResource->delete($product);
            return true;
        }
        return false;
    }

    public function getOrders($sellerId) {
        $this->validateUser($sellerId);
        $collection = $this->orderCollectionFactory->create();
        $collection->addFieldToFilter('seller_id', $sellerId);
        return $collection->getItems();
    }

    public function saveOrder($sellerId, \MyCompany\SellerModule\Api\Data\OrderInterface $order) {
        $this->validateUser($sellerId);

        if ($order->getEntityId()) {
            $existingOrder = $this->orderFactory->create();
            $this->orderResource->load($existingOrder, $order->getEntityId());
            if ($existingOrder->getSellerId() != $sellerId) {
                throw new AuthorizationException(__('You are not authorized to modify this resource.'));
            }
        }

        $order->setSellerId($sellerId);
        $this->orderResource->save($order);
        return $order;
    }

    public function deleteOrder($sellerId, $entityId) {
        $this->validateUser($sellerId);
        $order = $this->orderFactory->create();
        $this->orderResource->load($order, $entityId);
        if ($order->getEntityId() && $order->getSellerId() == $sellerId) {
            $this->orderResource->delete($order);
            return true;
        }
        return false;
    }

    public function getPayments($sellerId) {
        $this->validateUser($sellerId);
        $collection = $this->paymentCollectionFactory->create();
        $collection->addFieldToFilter('seller_id', $sellerId);
        return $collection->getItems();
    }

    public function savePayment($sellerId, \MyCompany\SellerModule\Api\Data\PaymentInterface $payment) {
        $this->validateUser($sellerId);

        if ($payment->getEntityId()) {
            $existingPayment = $this->paymentFactory->create();
            $this->paymentResource->load($existingPayment, $payment->getEntityId());
            if ($existingPayment->getSellerId() != $sellerId) {
                throw new AuthorizationException(__('You are not authorized to modify this resource.'));
            }
        }

        $payment->setSellerId($sellerId);
        $this->paymentResource->save($payment);
        return $payment;
    }

    public function deletePayment($sellerId, $entityId) {
        $this->validateUser($sellerId);
        $payment = $this->paymentFactory->create();
        $this->paymentResource->load($payment, $entityId);
        if ($payment->getEntityId() && $payment->getSellerId() == $sellerId) {
            $this->paymentResource->delete($payment);
            return true;
        }
        return false;
    }
}
