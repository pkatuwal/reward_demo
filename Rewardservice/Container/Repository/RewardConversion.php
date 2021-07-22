<?php

namespace Container\Repository;

use Container\Exception\InvalidCurrencyException;
use Exception;
use Container\Traits\Currency;

class RewardConversion
{
    use Currency;
    const CONVERSION_RATE = 0.01;
    const POINT_CONVERSION_RATE = 1;
    const DEFAULT_CURRENCY = 'usd_dollar';
    private $currency;
    private $amount;
    public function __construct($amount, $currency = self::DEFAULT_CURRENCY)
    {
        $this->currency = $currency;
        $this->amount = $amount;
    }
    /**
     * Get Point as per client spent total amount
     *
     * @return void
     */
    public function getConversionPoint()
    {
        if (!$this->isUsdDollar())
                $this->convertToDollar();
        if ($this->amount >= 1) {
            return $this->amount / (self::POINT_CONVERSION_RATE);
        }
        return 0;
    }

    /**
     * Get Total Point Amount
     *
     * @return void
     */
    public function getConversionRateAmount()
    {
        if (!$this->isUsdDollar())
                $this->convertToDollar();
        if ($this->amount >= 1) {
            return $this->amount * (self::CONVERSION_RATE);
        }
        return 0;
    }

    public function convertToDollar()
    {
        try {
            $actualRate = $this->currencyConversionList()[$this->currency];
            $this->currency = self::DEFAULT_CURRENCY;
            $this->amount = $actualRate * $this->amount;
        } catch (InvalidCurrencyException $e) {
            throw new InvalidCurrencyException;
        } catch (\Throwable $th) {
            throw new Exception("Error Processing Request", 500);
        }
    }

    private function isUsdDollar()
    {
        return ($this->currency === self::DEFAULT_CURRENCY);
    }
}
