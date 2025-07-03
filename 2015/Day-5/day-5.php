<?php
/*
--- Day 5: Doesn't He Have Intern-Elves For This? ---

Santa needs help figuring out which strings in his text file are naughty or nice.

A nice string is one with all of the following properties:

    It contains at least three vowels (aeiou only), like aei, xazegov, or aeiouaeiouaeiou.
    It contains at least one letter that appears twice in a row, like xx, abcdde (dd), or aabbccdd (aa, bb, cc, or dd).
    It does not contain the strings ab, cd, pq, or xy, even if they are part of one of the other requirements.

For example:

    ugknbfddgicrmopn is nice because it has at least three vowels (u...i...o...), a double letter (...dd...), and none of the disallowed substrings.
    aaa is nice because it has at least three vowels and a double letter, even though the letters used by different rules overlap.
    jchzalrnumimnmhp is naughty because it has no double letter.
    haegwjzuvuyypxyu is naughty because it contains the string xy.
    dvszwmarrgswjxmb is naughty because it contains only one vowel.

How many strings are nice?
*/

function checkVowels ($line) //Checks a string of alpha characters for at least 3 vowels
{
    $vowels = ["a", "e", "i", "o", "u"];
    $split = str_split($line);
    $count = 0;
    $done = 0;
    $notyet = 0;
    foreach ($split as $char)
    {
        if (in_array($char, $vowels))
        {
            $count++;
        }
        if ($count > 2)
        {
            return TRUE;
        }
        else
        {
            continue;
        }
    }

    return FALSE;
}

function checkRepeats ($line) // Checks a string of alpha characters for any repeating characters
{
    preg_match_all('/(.)\1/', $line, $matches);
    $matchcount = count($matches[0]);
    if ($matchcount == 0)
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

function checkBadPairs($line, $pairs = ["ab", "cd", "pq", "xy"]) //Makes sure that string doesn't contain the unwanted pairs. So naughty.
{
    foreach ($pairs as $pair)
    {
        if (str_contains($line, $pair))
        {
            return FALSE;
        }
        else
        {
            continue;
            //return TRUE;
        }
    }
    return TRUE;
}

$url = "https://adventofcode.com/2015/day/5/input";
$filename = "input.txt";
$nice = 0;
$naughty = 0;
// Open file for reading
$handle = fopen($filename, 'r');

if ($handle) 
{
    // Loop until end-of-file is reached
    while (!feof($handle)) 
    {

        $line = fgets($handle); // Read a line

        if ($line !== false) 
        {
            if (checkVowels($line) && checkBadPairs($line) && checkRepeats($line))
            {
                $nice++;
            }
            else
            {
                $naughty++;
            }
        }

    }

    fclose($handle); // Always remember to close the file
}
//echo "Total Nice Strings: " . $nice;
//echo "\n";
//echo "Total Naughty Strings: " . $naughty;
/*

RegEx Solution Options from Chris

// bad characters — stop early if found
if (preg_match("/ab|cd|pq|xy/i", $line)) {
    echo "bad characters - {$line} \n\n";
    continue;
}

// check for repeated characters
preg_match_all('/(.)\1/', $line, $matches);

// check for vowels
preg_match_all("/[aeiou]/", $line, $vow);

// only echo counts or inspect arrays properly
echo "Repeated pairs: " . count($matches[0]) . "\n";
echo "Vowel count: " . count($vow[0]) . "\n";

// check criteria
if (count($vow[0]) >= 3 && count($matches[0]) > 0)
    echo "nice string - {$line} \n\n";
else
    echo "bad string - {$line} \n\n";
*/

/*
--- Part Two ---

Realizing the error of his ways, Santa has switched to a better model of determining whether a string is naughty or nice. None of the old rules apply, as they are all clearly ridiculous.

Now, a nice string is one with all of the following properties:

    It contains a pair of any two letters that appears at least twice in the string without overlapping, like xyxy (xy) or aabcdefgaa (aa), but not like aaa (aa, but it overlaps).
    It contains at least one letter which repeats with exactly one letter between them, like xyx, abcdefeghi (efe), or even aaa.

For example:

    qjhvhtzxzqqjkmpb is nice because is has a pair that appears twice (qj) and a letter that repeats with exactly one letter between them (zxz).
    xxyxx is nice because it has a pair that appears twice and a letter that repeats with one between, even though the letters used by each rule overlap.
    uurcxstgmygtbstg is naughty because it has a pair (tg) but no repeat with a single letter between them.
    ieodomkazucvgmuy is naughty because it has a repeating letter with one between (odo), but no pair that appears twice.

How many strings are nice under these new rules?

*/