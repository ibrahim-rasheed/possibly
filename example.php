<?php
require_once("Possibly.php");

// elements
$elements = array('i', 'b', 'b', 'e');

//a-z array
$az = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

// elements count
$elementsCount = count($elements);

// length of combinations
$length = 3;

// initialize Combinations class
$Combinations = new Possibly($elements);

// get combinations count
//echo "<p>" . $Combinations->getCombinationsCount($elementsCount, $length, false) . "</p>";

// get permutations count
//echo "<p>" . $Combinations->getPermutationsCount($elementsCount, $length, false) . "</p>";

// open file dictionaries/3-az.txt and filter lines that has the given array of strings
//echo "<p>" . implode('<br>', $Combinations->hasAnyRepeated("dictionaries/4-az.txt", array('i', 'b', 'r'), 2)) . "</p>";

$results = $Combinations->fileToArray("dictionaries/4-az-19.txt")
    ->hasAnyRepeated($az, 3)
    ->hasConsecutive(3)
    //->hasAny(['i', 'b', 'e', 'r', 's'])
    //->hasAll(['ib', 'br', 'be', 'ir', 'ra'])
    ->toArray();

echo "<p>" . count($results) . "</p>";
echo "<p>" . implode("<br>", $results) . "</p>";
