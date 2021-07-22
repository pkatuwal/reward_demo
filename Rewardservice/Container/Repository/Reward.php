<?php

namespace Container\Repository;

class Reward
{
    protected $amount;
    protected $currency;

    protected $point;
    protected $pointRateAmount;
    protected $requestType;
    protected $rewardConversionRepoitory;
    public function __construct($amount, $currency = 'usd_dollar')
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->rewardConversionRepoitory = new RewardConversion($this->amount, $this->currency);
    }

    public function get($requestType = 'point')
    {
        
        $this->requestType = $requestType;
        return $this->setReward();
    }

    public function setReward()
    {
        $methodName = $this->requestMethodName();
        $convertedPoint = $this->rewardConversionRepoitory->{$methodName}();

        if ($this->requestType === 'point')
            $this->point = $convertedPoint;
        else
            $this->pointRateAmount = $convertedPoint;
        return $convertedPoint;
    }

    private function requestMethodName()
    {
        return $this->requestType === 'point' ? 'getConversionPoint' : 'getConversionRateAmount';
    }
}
