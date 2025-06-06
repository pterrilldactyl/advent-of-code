<?php

$input = file_get_contents("input.txt");

function getPaperArea($boxdimensions)
{
    $x = $boxdimensions[0];
    $y = $boxdimensions[1];
    $z = $boxdimensions[2];
    $smallest = min($x, $y, $z);

    //echo $x."\n".$y."\n".$z."\n";

    $area_needed = 2*$smallest + 2*$x + 2*$y + 2*$z;

    return $area_needed;
}




$inputItemized = explode("\n", $input); // Splits the challenge input into an array of box dimensions by HxWxL
$package = $inputItemized[0]; // $package is one box from the list
$packageParts = explode("x", $package); // Splits the box dimensions into 3 separate units

/*
foreach ($inputItemized as $x)
{
    echo $x."!\n";
}
*/

$a = $packageParts[0]+$packageParts[1];
//echo var_dump($inputItemized);
//echo $package;
//echo var_dump($packageParts);
//echo "\n";
//echo $a;
//echo gettype($packageParts[0]*2);
echo getPaperArea($packageParts);