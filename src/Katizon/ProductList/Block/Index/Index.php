<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Katizon\ProductList\Block\Index;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Helper\Image as ImageHelper;

/**
 * @Index
 */
class Index extends Template
{
    /**
     * @var CategoryFactory
     */
    private CategoryFactory $categoryFactory;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * @var ImageHelper
     */
    private ImageHelper $imageHelper;

    /**
     * Constructor
     *
     * @param CategoryFactory $categoryFactory
     * @param CollectionFactory $collectionFactory
     * @param Context $context
     * @param ImageHelper $imageHelper
     * @param array $data
     */
    public function __construct(
        CategoryFactory $categoryFactory,
        CollectionFactory $collectionFactory,
        Context $context,
        ImageHelper $imageHelper,
        array $data = []
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->collectionFactory = $collectionFactory;
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollection()
    {
        $categoryId = $this->getRequest()->getParam('category_id');
        $productCollection = $this->collectionFactory->create()->addAttributeToSelect('*');
        if ($categoryId) {
            $categoryModel = $this->categoryFactory->create()->load($categoryId);
            $productCollection->addCategoryFilter($categoryModel);
        }
        return $productCollection;
    }

    /**
     * @param \Magento\Catalog\Model\Product $product
     * @return string
     */
    public function getImageUrl(\Magento\Catalog\Model\Product $product)
    {
        return $this->imageHelper->init($product, 'product_thumbnail_image')->getUrl();
    }

    /**
     * @param \Magento\Catalog\Model\Product $product
     * @return mixed
     */
    public function getProductPrice(\Magento\Catalog\Model\Product $product)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $priceHelper = $objectManager->create('Magento\Framework\Pricing\Helper\Data'); // Instance of Pricing Helper
        return $priceHelper->currency($product->getPrice(), true, false);
    }
}

