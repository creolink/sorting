<?php

namespace App\Utils;

class Utils
{
    public function __construct()
    {
        echo str_repeat('-', 100) . "\n";
    }

    public function printArray(array $arrayOfNumbers): void
    {
        print '[';
        foreach ($arrayOfNumbers as $index => $number) {
            print $number . (isset($arrayOfNumbers[++$index]) ? ', ' : '');
        }
        print ']' . "\n";
    }
}