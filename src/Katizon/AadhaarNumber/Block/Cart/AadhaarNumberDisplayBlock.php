<?php
declare(strict_types=1);

namespace Katizon\AadhaarNumber\Block\Cart;

use Magento\Checkout\Block\Cart\AbstractCart;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\ScopeInterface;

/**
 * @AadhaarNumberDisplayBlock
 */
class AadhaarNumberDisplayBlock extends AbstractCart
{
    const XML_PATH_AADHAAR_LABEL = "aadhaar_number/general/label";
    const XML_PATH_AADHAAR_ENABLE = "aadhaar_number/general/enable";

    /**
     * @param Context $context
     * @param Session $customerSession
     * @param CheckoutSession $checkoutSession
     * @param array $data
     * @codeCoverageIgnore
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        CheckoutSession $checkoutSession,
        array $data = []
    ) {
        parent::__construct($context, $customerSession, $checkoutSession, $data);
    }

    /**
     * @return string|null
     */
    public function getAadhaarNumber():?string
    {
        return $this->getQuote()->getAadhaarNumber();
    }

    /**
     * @return bool
     */
    public function isEnable():bool
    {
        return $this->_scopeConfig->isSetFlag(self::XML_PATH_AADHAAR_ENABLE, ScopeInterface::SCOPE_WEBSITE);
    }

    /**
     * @return string
     */
    public function getLabel():string
    {
        return $this->_scopeConfig->getValue(self::XML_PATH_AADHAAR_LABEL, ScopeInterface::SCOPE_STORE)??"Aadhaar Number";
    }

    /**
     * @return void
     */
    public function getAadhaarSaveUrl():string
    {
        return $this->getUrl("aadhaar_number/index/save");
    }
}

