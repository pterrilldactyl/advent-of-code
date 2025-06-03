<?php

$tower = file_get_contents("input.txt");

// ( = up one level and ) = down one level

// Counts levels up
function countUp($text)
{
    $up = substr_count($text, "(");
//    echo $up;
    return $up;
}

// Counts levels down
function countDown($text)
{
    $down = substr_count($text, ")");
//    echo $down;
    return $down;
}

// Compares Up vs Down for final floor number
function whereIsSanta($text)
{
    return countUp($text) - countDown($text);
}

//echo whereIsSanta($tower);

function firstToBasement($text)
{
    $newtext = str_split($text);
    $counter = 0;
    $level = 0;
    foreach ($newtext as $x)
    {
//        echo $x;
        if ($x === "(")
        {
            $counter += 1;
            $level += 1;
            if ($level < 0)
            {
                echo $counter;
                return $counter;
            }
        }
        elseif ($x === ")")
        {
            $counter += 1;
            $level -= 1;
            if ($level < 0)
            {
                echo $counter;
                return $counter;
            }
        }
        else
        {
            echo "Ha";
        }
    }

}

firstToBasement($tower);