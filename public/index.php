<?php require_once 'Controllers/IndexController.php'; ?>

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

        <div class="bg-gray-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-100 m-4">Total taxes for country :</span>
            <?=$country->tax()?>
        </div>
        <div class="bg-gray-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-100 m-4">Total average tax Rate : <?=$country->AvgTaxRate()?> </span></div>
        <div class="bg-gray-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-100 m-4">Average tax Rate for each state :
            <?php foreach ($country->states as $state){echo $state->AvgTaxRate();}?>
            </span><br></div>
        <div class="bg-gray-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-100 m-4">Average tax for each state :
             <?php foreach ($country->states as $state){echo $state->AvgTax();}?>
            </span><br></div>
        <div class="bg-gray-400 rounded border-2 p-2 mt-1"><span class="font-bold bg-red-100 m-4">Total tax amount for each state:
              <?php foreach ($country->states as $state){echo $state->Tax();}?>
            </span><br></div>
    </div>
</div>
</body>
</html>
