<?php

namespace src;

use interfaces\TaxInterface;


class County implements TaxInterface
{

    /**
     * a number between  0 - 1.
     * @var float
     */
    public float $taxRate;

    /**
     * @var float
     */
    public float $income;

    /**
     * @var string
     */
    public string $name;

    /**
     * a number between  0 - 1.
     * @var float
     */
    public float $discount;


    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $taxRate
     * @return $this
     */
    public function setTaxRate($taxRate)
    {
        $this->taxRate = $taxRate;
        return $this;
    }


    /**
     * @param $income
     * @return $this
     */
    public function setIncome($income)
    {
        $this->income = $income;
        return $this;
    }


    /**
     * @param $discount
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }



    /**
     * get taxable income according to discount.
     *
     * @return int
     */
    public function Income() :int
    {
        return ( $this->income - ($this->income * $this->discount) );
    }

    /**
     * get Tax amount for the county.
     *
     * @return int
     */
    public function Tax() :int
    {
        return ($this->Income() * $this->taxRate);
    }


}






