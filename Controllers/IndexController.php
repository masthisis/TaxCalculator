<?php
require_once 'vendor/autoload.php';


use src\County;
use src\State;
use src\Country;


$c1 = new County('birjand');
    $c1->setIncome(1000)
        ->setTaxRate(0.5)
        ->setDiscount(0.4);


$state1 = new State('khorasan');
$state1->setCounties($c1);

$country = new Country('IRAN');
$country->setStates($state1);

