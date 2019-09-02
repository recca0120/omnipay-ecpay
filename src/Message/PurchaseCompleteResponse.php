<?php

namespace Omnipay\Ecpay\Message;

class PurchaseCompleteResponse extends Response
{
    public function isSuccessful()
    {
        try {
            $this->ecpay->CheckOutFeedback();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Response Message.
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->data['RtnMsg'];
    }

    /**
     * Response code.
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->data['RtnCode'];
    }

    /**
     * Gateway Reference.
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->data['TradeNo'];
    }

    /**
     * Get the transaction ID as generated by the merchant website.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->data['MerchantTradeNo'];
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        $data = $this->data;
        unset($data['HashKey']);
        unset($data['HashIV']);
        unset($data['EncryptType']);

        return $data;
    }
}
