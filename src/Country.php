<?php

namespace src;

use interfaces\TaxInterface;

class Country implements TaxInterface
{
    public $states = [];

    public string $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param State $state
     */
    public function setStates(State $state): void
    {
        $this->states = $state;
    }

    /**
     * get  income for the current country.
     *
     * @return int
     */
    public function Income() :int
    {
        return array_reduce($this->states,
            function ($sum, $state) {
                $sum += $state->Income();
                return $sum;
            },
            0);
    }


    /**
     * get average tax Rate for the current country.
     *
     * @return int
     */
    public function AvgTaxRate() :int
    {
        return array_reduce($this->states,
            function ($sum, $state) {
                $sum += $state->Tax() / $state->Income();
                return $sum;
            },
            0);
    }

    /**
     * get total taxes for the current country.
     *
     * @return int
     */
    public function Tax() :int
    {
        return array_reduce($this->states,
            function ($sum, $state) {
                $sum += $state->Tax();
                return $sum;
            },
            0);
    }



}

