<?php

namespace Katizon\AadhaarNumber\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Model\Quote;
use Magento\Sales\Model\Order;

class SalesModelServiceQuoteSubmitBefore implements ObserverInterface
{

    public function execute(Observer $observer)
    {
        /** @var Order $order */
        $order = $observer->getEvent()->getData('order');
        /** @var Quote $quote */
        $quote = $observer->getEvent()->getData('quote');
        $order->setAadhaarNumber($quote->getAadhaarNumber());
    }
}
