<?php declare(strict_types=1);

require_once '../vendor/autoload.php';

use Faker\Factory;
use Money\Money;
use Tax\County;
use Tax\State;
use Tax\Country;

$faker = Factory::create();
$country = new Country();
$country->setName('United State Of America');
for ($i = 0; $i < 5; $i++) {
    $state = new State();
    $state->setName($faker->unique()->state);
    for ($j = 0; $j < 5; $j++) {
        $county = new County();
        $county->setName($faker->city);
        $county->setIncome(Money::IRR($faker->numberBetween(1000, 100000))->getAmount())
            ->setTaxRate($faker->randomFloat(2, 0, 1))
            ->setDiscount($faker->randomFloat(2, 0, 1));
        $state->setCounties($county);
        $county = '';
    }
    $country->setStates($state);
    $state = '';
}

