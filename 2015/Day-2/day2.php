<?php

$input = file_get_contents("input.txt");

function getPaperArea($x, $y, $z)
{
    $smallest = min($x, $y, $z);

    $area_needed = 2*$smallest + 2*$x + 2*$y + 2*$z;

    return $area_needed;
}

//echo getPaperArea(2,3,4);