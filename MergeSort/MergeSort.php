<?php

namespace App\MergeSort;

class MergeSort
{
    public function __construct()
    {
        echo str_repeat('-', 50) . "\n";
        echo __class__."\n";
    }

    public function partition(array $arrayOfNumbers): array
    {
        if (count($arrayOfNumbers) <= 1) {
            return $arrayOfNumbers;
        }

        $totalIndexes = count($arrayOfNumbers) - 1;
        $middleIndex = ceil($totalIndexes / 2);
        $leftPartition = array_slice($arrayOfNumbers, 0, $middleIndex);
        $rightPartition = array_slice($arrayOfNumbers, $middleIndex, $totalIndexes);

        $leftPartition = $this->partition($leftPartition);
        $rightPartition = $this->partition($rightPartition);

        return $this->mergeSorted($leftPartition, $rightPartition);
    }

    private function mergeSorted($leftPartition, $rightPartition): array
    {
        $mergedArray = [];

        while (!empty($leftPartition) && !empty($rightPartition)) {
            $leftPartitionNumber = $leftPartition[0];
            $rightPartitionNumber = $rightPartition[0];
            if ($leftPartitionNumber >= $rightPartitionNumber) {
                $mergedArray[] = $rightPartitionNumber;
                array_shift($rightPartition);
            }

            if ($rightPartitionNumber > $leftPartitionNumber) {
                $mergedArray[] = $leftPartitionNumber;
                array_shift($leftPartition);
            }
        }

        while (!empty($leftPartition)) {
            $partitionNumber = $leftPartition[0];
            $mergedArray[] = $partitionNumber;
            array_shift($leftPartition);
        }

        while (!empty($rightPartition)) {
            $partitionNumber = $rightPartition[0];
            $mergedArray[] = $partitionNumber;
            array_shift($rightPartition);
        }

        return $mergedArray;
    }

    public function sort(array $arrayOfNumbers): array
    {
        if (count($arrayOfNumbers) <= 1) {
            return $arrayOfNumbers;
        }

        return $this->partition($arrayOfNumbers);
    }
}