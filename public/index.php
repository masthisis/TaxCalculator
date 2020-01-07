<?php declare(strict_types=1);


require_once '../Controllers/IndexController.php';
?>

<?php 
$counties = 0;
foreach($country->states as $state) {
    $counties += count($state->counties);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax information's </title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="container flex items-center ">
    <div class="border-1 m-auto mt-4 w-4/6">
        <div class="bg-gray-600 rounded border-2 text-xl text-white p-4 text-center">tax information's</div>

        <div class="bg-green-400 rounded border-2 p-2 mt-1 "><span class="font-bold bg-red-300 m-4">Total taxes for <?=$country->getName()?> :</span>
           <span class="pl-2 pr-2 font-bold mr-64"><?=$country->calculateTax()?></span>
            states : <span class="ml-2 bg-blue-500 text-black font-semibold pr-2 pl-2 rounded"><?=count($country->states)?></span>    
            counties :<span class="ml-2 bg-red-500 text-black font-semibold pr-2 pl-2 rounded"><?=$counties?></span>    
        </div>
        <div class="bg-blue-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-300 m-4">Total average tax Rate : <?=$country->AvgTaxRate()?> </span></div>
        <div class="bg-red-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-300 m-4">Average tax Rate for each state : <br>
            <?php foreach ($country->states as $state) {
                echo $state->getName() . ': ';
                echo $state->AvgTaxRate();
                echo '<br>';
                }?>
            </span><br></div>
        <div class="bg-gray-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-300 m-4">Average tax for each state : <br/>
             <?php foreach ($country->states as $state) {
                 echo $state->getName() . ': ';
                 echo $state->AvgTax();
                 echo '<br>';
                 }?>
            </span><br></div>
        <div class="bg-indigo-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-300 m-4">Total tax amount for each state: <br/>
              <?php foreach ($country->states as $state) {
                  echo $state->getName() . ': ';
                  echo $state->calculateTax();
                  echo '<br>';
                  }?>
            </span><br></div>
    </div>
</div>
</body>
</html>
