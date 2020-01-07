<?php declare(strict_types=1);


namespace Tax;

use Tax\BaseEntity;
use Money\Money;


class County extends BaseEntity
{
    /**
     * a number between  0 - 1.
     * @var float
     */
    public float $taxRate;

    /**
     * @var Money
     */
    public  $income;

    /**
     * a number between  0 - 1.
     * @var float
     */
    public float $discount;

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
     * @param float $discount
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
     * @return Money.
     */
    public function Income()
    {
        $income = Money::USD($this->income);
        $discount = $income->multiply($this->discount);
        $income->subtract($discount);

        return $income;
    }

    /**
     * get Tax amount for the county.
     *
     * @return float
     */
    public function calculateTax()
    {
        return $this->Income() * $this->taxRate;
    }

}
