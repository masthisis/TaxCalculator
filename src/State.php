<?php declare(strict_types = 1);

namespace src;

use src\interfaces\TaxInterface;


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
     * get total taxable Incomes for the state.
     * @return float
     */
    public function Income() :float
    {
        return array_reduce($this->counties,
            function ($sum, $county) {
                $sum += $county->Income();
                return $sum;
            },
            0);

    }


    /**
     * get total taxes from the state.
     * @return float
     */
    public function Tax() :float
    {
        return array_reduce($this->counties,
            function ($sum, $county) {
                $sum += $county->Tax();
                return $sum;
            },
            0);
    }


    /**
     * get tax average for the state;
     * @return float
     */
    public function AvgTax() :float
    {
        return $this->Tax() / count($this->counties);
    }

    /**
     * get average tax rate for the state;
     * @return float
     */
    public function AvgTaxRate() :float
    {
        return ($this->Tax() / $this->Income());
    }



}
