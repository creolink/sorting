<?php

namespace App\QuickSort;

class QuickSort
{
    public function __construct()
    {
        echo str_repeat('-', 50) . "\n";
        echo __class__."\n";
    }

    public function getPivot(array &$arrayOfNumbers): int
    {
        return array_pop($arrayOfNumbers);
    }

    public function partition(&$arrayOfNumbers, $lowLeftIndex, $topRightIndex, $pivot): array
    {
        $lowIndex = $lowLeftIndex;
        $highIndex = $topRightIndex;

        $leftArray = [];
        $rightArray = [];

        while ($lowIndex <= $highIndex) {
            if ($arrayOfNumbers[$lowIndex] > $pivot && $arrayOfNumbers[$highIndex] < $pivot) {
                $leftArray[] = $arrayOfNumbers[$highIndex];
                $rightArray[] = $arrayOfNumbers[$lowIndex];
                $lowIndex++;
                $highIndex--;
            } else {
                if ($arrayOfNumbers[$lowIndex] <= $pivot) {
                    $leftArray[] = $arrayOfNumbers[$lowIndex];
                    $lowIndex++;
                }

                if ($arrayOfNumbers[$highIndex] > $pivot) {
                    array_unshift($rightArray,$arrayOfNumbers[$highIndex]);
                    $highIndex--;
                }
            }
        }

        return [$leftArray, $rightArray];
    }

    public function sort(array $partition): array
    {
        if (count($partition) < 1) {
            return $partition;
        }

        $pivot = $this->getPivot($partition);
        $lowIndex = 0;
        $highIndex = count($partition) - 1;

        [$leftPartition, $rightPartition] = $this->partition($partition, $lowIndex, $highIndex, $pivot);

        $leftPartition = $this->sort($leftPartition);
        $rightPartition = $this->sort($rightPartition);

        return array_merge($leftPartition, [$pivot], $rightPartition);
    }
}


