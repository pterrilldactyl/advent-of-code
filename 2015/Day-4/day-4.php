<?php

/*
--- Day 4: The Ideal Stocking Stuffer ---

Santa needs help mining some AdventCoins (very similar to bitcoins) to use as gifts for all the economically forward-thinking little girls and boys.

To do this, he needs to find MD5 hashes which, in hexadecimal, start with at least five zeroes. The input to the MD5 hash is some secret key (your puzzle input, given below) followed by a number in decimal. To mine AdventCoins, you must find Santa the lowest positive number (no leading zeroes: 1, 2, 3, ...) that produces such a hash.

For example:

    If your secret key is abcdef, the answer is 609043, because the MD5 hash of abcdef609043 starts with five zeroes (000001dbbfa...), and it is the lowest such number to do so.
    If your secret key is pqrstuv, the lowest number it combines with to make an MD5 hash starting with five zeroes is 1048970; that is, the MD5 hash of pqrstuv1048970 looks like 000006136ef....

Your puzzle input is ckczppom.

--- Part Two ---

Now find one that starts with six zeroes.

*/

//echo substr(md5("ckczppom1"), 0, 5);

//I know this is just brute force
$x = 1;
$secret = "ckczppom";
set_time_limit(60);
$start_time = microtime(true);
while (substr(md5($secret.$x), 0, 6) !== "000000")
{
    $x++;
    //$secret;
}
$end_time = microtime(true);
$run_time = $end_time - $start_time;
$formatted_time = number_format($run_time, 3, ".", "");
echo "This took " . $formatted_time . " seconds to complete. \n";
echo $x;