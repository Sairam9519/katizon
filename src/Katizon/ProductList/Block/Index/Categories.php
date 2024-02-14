<?php
declare(strict_types=1);

namespace Katizon\ProductList\Block\Index;

use Magento\Catalog\Api\Data\CategoryTreeInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Api\CategoryManagementInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * @Categories
 */
class Categories extends Template
{
    /**
     * @var CategoryManagementInterfaceFactory
     */
    protected CategoryManagementInterfaceFactory $categoryManagementInterfaceFactory;

    /**
     * @var StoreManagerInterface
     */
    protected StoreManagerInterface $storeManager;

    /**
     * @param CategoryManagementInterfaceFactory $categoryManagementInterfaceFactory
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        CategoryManagementInterfaceFactory $categoryManagementInterfaceFactory,
        Context $context,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->categoryManagementInterfaceFactory = $categoryManagementInterfaceFactory;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * @return CategoryTreeInterface
     * @throws NoSuchEntityException
     */
    public function getCategories()
    {
        $categoryManagement = $this->categoryManagementInterfaceFactory->create();
        $rootNodeId = $this->storeManager->getStore()->getRootCategoryId();
        return $categoryManagement->getTree($rootNodeId);;
    }
}
