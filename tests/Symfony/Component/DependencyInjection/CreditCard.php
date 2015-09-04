<?php

namespace JurijVeresciaka\Laboratory\Tests\Symfony\Component\DependencyInjection;

class CreditCard
{
    /**
     * @var string
     */
    protected $uniqueNumber;

    /**
     * @param string $uniqueNumber
     */
    public function __construct($uniqueNumber)
    {
        $this->uniqueNumber = $uniqueNumber;
    }

    /**
     * @param string $uniqueNumber
     */
    public function setUniqueNumber($uniqueNumber)
    {
        $this->uniqueNumber = $uniqueNumber;
    }

    /**
     * @return string
     */
    public function getUniqueNumber()
    {
        return $this->uniqueNumber;
    }
}
