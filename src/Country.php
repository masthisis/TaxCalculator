<?php declare(strict_types=1);


namespace Tax;


use Tax\BaseEntity;
use Money\Money;

class Country extends BaseEntity
{
    public $states = [];

    /**
     * @param State $state
     */
    public function setStates(State $state): void
    {
        $this->states[] = $state;
    }

    /**
     * get  income for the country.
     *
     * @return float
     */
    public function Income() :float
    {
        return array_reduce($this->states,
            function ($sum, $state) {
                $sum += $state->Income();
                return $sum;
            },
            0);
    }


    /**
     * get average tax Rate for the country.
     *
     * @return float
     */
    public function AvgTaxRate() :float
    {
        return  $this->calculateTax() / $this->Income();
    }

    /**
     * get total taxes for the current country.
     *
     * @return float
     */
    public function calculateTax() :float
    {

        return array_reduce($this->states,
            function ($sum, $state) {
                $sum += $state->calculateTax();
                return $sum;
            },
            0);
    }



}
