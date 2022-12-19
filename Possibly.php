<?php

/**
 * @author Ibrahim Rasheed <ibrahim@kangathi.com>
 * version 0.0.1 - 2022-12-19
 *
 * 
 * 
 */
class Possibly
{
    //properties
    public $elements = array();

    //calculate the number of possible combinations
    public function getCombinationsCount($n, $r, $withRepetition = false)
    {
        if ($withRepetition) {
            return pow($n, $r);
        } else {
            return $this->getFactorial($n) / ($this->getFactorial($r) * $this->getFactorial($n - $r));
        }
    }

    //calculate the number of possible permutations
    public function getPermutationsCount($n, $r, $withRepetition = false)
    {
        if ($withRepetition) {
            return pow($n, $r);
        } else {
            return $this->getFactorial($n) / $this->getFactorial($n - $r);
        }
    }

    //getFactorial
    public function getFactorial($n)
    {
        $factorial = 1;
        for ($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }
}
