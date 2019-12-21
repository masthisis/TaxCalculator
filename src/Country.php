<?php declare(strict_types = 1);

namespace src;

use src\interfaces\TaxInterface;

class Country implements TaxInterface
{
    public $states = [];

    public  $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

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
        return  $this->Tax() / $this->Income();

    }

    /**
     * get total taxes for the current country.
     *
     * @return float
     */
    public function Tax() :float
    {

        return array_reduce($this->states,
            function ($sum, $state) {
                $sum += $state->Tax();
                return $sum;
            },
            0);
    }



}

