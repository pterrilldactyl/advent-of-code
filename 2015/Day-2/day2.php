<?php

$input = file_get_contents("input.txt");

// Outputs an array delimited by new line character
function changeInputFileToArray($input)
{
    $input_itemized = explode("\n", $input); // Splits the challenge input into an array of box dimensions by HxWxL

    return $input_itemized;
}

function getPaperArea($dimensions)
{
    $parts = explode("x", $dimensions); // Splits the box dimensions into 3 separate units
    sort($parts);

    $x = $parts[0];
    $y = $parts[1];
    $z = $parts[2];

    $smallest = min($x, $y, $z);

    $area_needed = 3*$x*$y + 2*$y*$z + 2*$z*$x;
    //echo "This is Area Needed per box: " . $area_needed . "\n";
    return $area_needed;
}


function getTotalArea($input)
{
    $area = 0;

    foreach (changeInputFileToArray($input) as $x)
    {
        //echo "This is x: ".$x."\n";
        $area += getPaperArea($x);
        //echo "New Total Area: " . $area."\n";
    }
    return $area;
}

echo getTotalArea($input);
// Part one is done. Finally. Stupid math.
