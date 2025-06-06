<?php

$input = file_get_contents("input.txt");

// Outputs an array delimited by new line character
function changeInputFileToArray($input)
{
    $inputItemized = explode("\n", $input); // Splits the challenge input into an array of box dimensions by HxWxL

    return $inputItemized;
}

function getPaperArea($boxdimensions)
{
    $dimensionParts = explode("x", $boxdimensions); // Splits the box dimensions into 3 separate units
    sort($dimensionParts);
    //$dimensionsSorted = sort($dimensionParts);

    $x = $dimensionParts[0];
    $y = $dimensionParts[1];
    $z = $dimensionParts[2];

    $smallest = min($x, $y, $z);

    $area_needed = 3*$x*$y + 2*$y*$z + 2*$z*$x;
    echo "This is Area Needed per box: " . $area_needed . "\n";
    return $area_needed;
}



$area = 0;

foreach (changeInputFileToArray($input) as $x)
{
    echo "This is x: ".$x."\n";
    $area += getPaperArea($x);
    echo "New Total Area: " . $area."\n";
}

// Part one is done. Finally. Stupid math.