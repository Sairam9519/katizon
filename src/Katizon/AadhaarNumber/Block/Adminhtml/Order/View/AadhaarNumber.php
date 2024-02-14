<?php

namespace Katizon\AadhaarNumber\Block\Adminhtml\Order\View;

class AadhaarNumber extends \Magento\Sales\Block\Adminhtml\Order\View
{
    /**
     * @return string|null
     */
    public function getAadhaarNumber():?string
    {
        return $this->getOrder()->getAadhaarNumber();
    }
}

