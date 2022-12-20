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
    public $result;

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

    //get all possible combinations
    public function getCombinations($elements, $r, $withRepetition = false)
    {
        $this->elements = $elements;
        $this->combinations = array();
        $this->getCombinationsRecursive($r, array(), 0, $withRepetition);
        return $this->combinations;
    }

    //get all possible permutations
    public function getPermutations($elements, $r, $withRepetition = false)
    {
        $this->elements = $elements;
        $this->permutations = array();
        $this->getPermutationsRecursive($r, array(), 0, $withRepetition);
        return $this->permutations;
    }

    //get all possible combinations recursively
    private function getCombinationsRecursive($r, $combination, $index, $withRepetition)
    {
        if ($r == 0) {
            $this->combinations[] = $combination;
            return;
        }
        for ($i = $index; $i < count($this->elements); $i++) {
            $combination[] = $this->elements[$i];
            $this->getCombinationsRecursive($r - 1, $combination, $i + ($withRepetition ? 0 : 1), $withRepetition);
            array_pop($combination);
        }
    }

    //get all possible permutations recursively
    private function getPermutationsRecursive($r, $permutation, $index, $withRepetition)
    {
        if ($r == 0) {
            $this->permutations[] = $permutation;
            return;
        }
        for ($i = 0; $i < count($this->elements); $i++) {
            if ($withRepetition || !in_array($this->elements[$i], $permutation)) {
                $permutation[] = $this->elements[$i];
                $this->getPermutationsRecursive($r - 1, $permutation, $i + ($withRepetition ? 0 : 1), $withRepetition);
                array_pop($permutation);
            }
        }
    }

    //read file and get all the lines to an array. Method chainable.
    public function fileToArray($file)
    {
        $this->result = file($file);
        return $this;
    }

    //read file line by line and filter all the lines that has any of the given array of strings
    // public function hasAny($file, $strings)
    // {
    //     $lines = array();
    //     $handle = fopen($file, "r");
    //     if ($handle) {
    //         while (($line = fgets($handle)) !== false) {
    //             $line = trim($line);
    //             foreach ($strings as $string) {
    //                 if (strpos($line, $string) !== false) {
    //                     $lines[] = $line;
    //                     break;
    //                 }
    //             }
    //         }
    //         fclose($handle);
    //     } else {
    //         // error opening the file.
    //     }
    //     return $lines;
    // }

    //get values that has any of the given array of strings
    public function hasAny($strings)
    {
        $lines = array();
        foreach ($this->result as $line) {
            $line = trim($line);
            foreach ($strings as $string) {
                if (strpos($line, $string) !== false) {
                    $lines[] = $line;
                    break;
                }
            }
        }
        $this->result = (object) $lines;
        return $this;
    }

    //get values that has all the given array of strings
    public function hasAll($strings)
    {
        $matches = array();
        foreach ($this->result as $item) {
            $item = trim($item);
            $hasAll = true;
            foreach ($strings as $string) {
                if (strpos($item, $string) === false) {
                    $hasAll = false;
                    break;
                }
            }
            if ($hasAll) {
                $matches[] = $item;
            }
        }
        $this->result = (object) $matches;
        return $this;
    }



    //get values that has any of the
    //given array of strings more than or equal to
    //given number of times
    public function hasAnyRepeated($strings, $times)
    {
        $lines = array();
        foreach ($this->result as $line) {
            $line = trim($line);
            foreach ($strings as $string) {
                if (substr_count($line, $string) >= $times) {
                    $lines[] = $line;
                    break;
                }
            }
        }
        $this->result = (object) $lines;
        return $this;
    }

    //convert object to array and return
    public function toArray()
    {
        return (array) $this->result;
    }

    //get values that has given number of consecutive characters
    public function hasConsecutive($count)
    {
        $lines = array();
        foreach ($this->result as $line) {
            $line = trim($line);
            $consecutive = 0;
            for ($i = 0; $i < strlen($line); $i++) {
                if ($i > 0 && $line[$i] == $line[$i - 1]) {
                    $consecutive++;
                } else {
                    $consecutive = 1;
                }
                if ($consecutive >= $count) {
                    $lines[] = $line;
                    break;
                }
            }
        }
        $this->result = (object) $lines;
        return $this;
    }
}
