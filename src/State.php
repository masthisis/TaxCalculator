<?php declare(strict_types=1);


namespace Tax;

use Tax\BaseEntity;

class State extends BaseEntity
{
    public  $counties = [];

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
    public function calculateTax() :float
    {
        return array_reduce($this->counties,
            function ($sum, $county) {
                $sum += $county->calculateTax();
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
        return $this->calculateTax() / count($this->counties);
    }

    /**
     * get average tax rate for the state;
     * @return float
     */
    public function AvgTaxRate() :float
    {
        return $this->calculateTax() / $this->Income();
    }

}
