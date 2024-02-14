<?php
declare(strict_types=1);

namespace Katizon\Categories\Block;

use Magento\Catalog\Api\Data\CategoryTreeInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Api\CategoryManagementInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * @Categories
 */
class Categories extends Template
{
    /**
     * @var CategoryFactory
     */
    protected CategoryFactory $categoryFactory;

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
     * @param CategoryFactory $categoryFactory
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        CategoryManagementInterfaceFactory $categoryManagementInterfaceFactory,
        CategoryFactory $categoryFactory,
        Context $context,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->categoryFactory = $categoryFactory;
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

    /**
     * @param $categoryId
     * @return string|null
     */
    public function getInfo($categoryId):?string
    {
        $categoryModel = $this->categoryFactory->create();
        $category = $categoryModel->load($categoryId);
        return $category->getAdditionalInformation();
    }

    /**
     * @param $categoryId
     * @return string|null
     * @throws LocalizedException
     */
    public function getImageUrl($categoryId)
    {
        $categoryModel = $this->categoryFactory->create();
        $category = $categoryModel->load($categoryId);
        return $category->getImageUrl("category_banner");
    }

    /**
     * @param string $categoryId
     * @return string
     */
    public function getProductUrl($categoryId=""):string
    {
        $params = ["category_id" => $categoryId];
        return $this->getUrl('productlist/index/index', $params);
    }
}
