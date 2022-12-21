<?php
// include Possibly class
require_once("Possibly.php");

// initialize Possibly class
$Combinations = new Possibly();

// open file and process text
$results = $Combinations->fileToArray("dictionaries/english_words_370k.txt")
    //->hasAnyRepeated(['b'], 2)
    //->hasConsecutive(3)
    //->hasAny(['i', 'b', 'b', 'e'])
    ->hasAll(['i', 'b', 'e', 'r'])
    ->toArray();

// print results
echo "<p>" . count($results) . "</p>";
echo "<p>" . implode("<br>", $results) . "</p>";


//OTHER POSSIBLY STUFF

//a-z array
//$az = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

// get combinations count
//echo "<p>" . $Combinations->getCombinationsCount($elementsCount, $length, false) . "</p>";

// get permutations count
//echo "<p>" . $Combinations->getPermutationsCount($elementsCount, $length, false) . "</p>";

// open file dictionaries/3-az.txt and filter lines that has the given array of strings
//echo "<p>" . implode('<br>', $Combinations->hasAnyRepeated("dictionaries/4-az.txt", array('i', 'b', 'r'), 2)) . "</p>";
