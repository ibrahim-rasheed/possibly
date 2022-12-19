<?php
require_once("Possibly.php");

// elements
$elements = array('A', 'B', 'C', 'D');

// elements count
$elementsCount = count($elements);

// length of combinations
$length = 3;

// initialize Combinations class
$Combinations = new Possibly($elements);

// get combinations count
echo "<p>" . $Combinations->getCombinationsCount($elementsCount, $length, false) . "</p>";

// get permutations count
echo "<p>" . $Combinations->getPermutationsCount($elementsCount, $length, false) . "</p>";
