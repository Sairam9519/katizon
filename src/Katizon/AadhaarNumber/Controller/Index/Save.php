<?php
declare(strict_types=1);

namespace Katizon\AadhaarNumber\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Quote\Model\QuoteFactory;

/**
 * @Save
 */
class Save extends Action
{
    /**
     * @var \Magento\Framework\App\Action\Contex
     */
    private $context;

    /**
     * @var QuoteFactory
     */
    private QuoteFactory $quoteFactory;

    /**
     * @param Context $context
     * @param QuoteFactory $quoteFactory
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        Context $context,
        QuoteFactory $quoteFactory,
        ResultFactory $resultFactory
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->quoteFactory = $quoteFactory;
        $this->resultFactory = $resultFactory;
    }

    /**
     * @return json
     */
    public function execute()
    {
        $params = $this->context->getRequest()->getParams();
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        try {
            $quoteModel = $this->quoteFactory->create()->load($params['id']);
            if ($quoteModel->getId()) {
                $quoteModel->setAadhaarNumber($params['aadhaarNumber']);
                $quoteModel->save();
                $msg = "Aadhaar Number Saved";
                $response = true;
            } else {
                $response = false;
                $msg = "Quote Id not Exist";
            }
        } catch (\Exception $e) {
            $response = false;
            $msg = $e->getMessage();
        }
        $resultJson->setData(["message" => ($msg), "response" => $response]);
        return $resultJson;
    }
}

