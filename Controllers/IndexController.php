<?php declare(strict_types = 1);

require_once '../vendor/autoload.php';


use src\County;
use src\State;
use src\Country;


$c1 = new County('birjand');
    $c1->setIncome(1000)
        ->setTaxRate(0.5)
        ->setDiscount(0.2);

$c2 = new County('birjand');
    $c2->setIncome(1000)
        ->setTaxRate(0.5)
        ->setDiscount(0.2);

$c3 = new County('birjand');
    $c3->setIncome(1000)
        ->setTaxRate(0.5)
        ->setDiscount(0.2);



$state1 = new State('khorasan');
$state1->setCounties($c1);
$state1->setCounties($c2);
$state1->setCounties($c3);


$state2 = new State('tehran');
$state2->setCounties($c1);
$state2->setCounties($c2);
$state2->setCounties($c3);

$state3 = new State('tabriz');
$state3->setCounties($c1);
$state3->setCounties($c2);
$state3->setCounties($c3);



$country = new Country('IRAN');
$country->setStates($state1);
$country->setStates($state2);
$country->setStates($state3);

