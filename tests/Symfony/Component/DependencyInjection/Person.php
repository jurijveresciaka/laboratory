<?php

namespace JurijVeresciaka\Laboratory\Tests\Symfony\Component\DependencyInjection;

class Person
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $secondName;

    /**
     * @var CreditCard
     */
    protected $creditCard;

    /**
     * @param string $firstName
     * @param string $secondName
     * @param CreditCard $creditCard
     */
    public function __construct($firstName, $secondName, $creditCard)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->creditCard = $creditCard;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    /**
     * @return string
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param CreditCard $creditCard
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
    }

    /**
     * @return CreditCard
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }
}
