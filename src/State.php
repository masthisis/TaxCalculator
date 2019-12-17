<?php

namespace src;

use interfaces\TaxInterface;


class State implements TaxInterface
{
    public  $counties = [];

    public string $name;


    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param County $county
     * @return $this
     */
    public function setCounties(County $county)
    {
        $this->counties[] = $county;
        return $this;
    }


    /**
     * @return int
     */
    public function Income() :int
    {
        return array_reduce($this->counties,
            function ($sum, $county) {
                $sum = $county->Income();
                return $sum;
            },
            0);

    }


    /**
     * get's total taxes from current state.
     * @return integer
     */
    public function Tax() :int
    {
        return array_reduce($this->counties,
            function ($sum, $county) {
                $sum = $county->Tax();
                return $sum;
            },
            0);
    }


    /**
     * get tax average for current state;
     * @return int
     */
    public function AvgTax() :int
    {
        return $this->Tax() / count($this->counties);
    }

    /**
     * get average tax rate for current state;
     * @return int
     */
    public function AvgTaxRate() :int
    {
        return $this->Tax() * $this->Income();
    }



}
