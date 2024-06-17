<?php
namespace Tax;

use Tax\Contracts\HasNameInterface;
use Tax\Contracts\HasTaxInterface;

abstract class BaseEntity implements HasNameInterface, HasTaxInterface
{
    /**
     * @var string
     */
    protected string $name;

    /**
     * @param string $name
     * @return BaseEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    public function getName()
    {
        
        return $this->name;

    }

}

