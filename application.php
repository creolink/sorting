<?php
namespace App;

use App\MergeSort\MergeSort;
use App\QuickSort\QuickSort;
use App\Utils\Utils;

require_once ("QuickSort/QuickSort.php");
require_once ("MergeSort/MergeSort.php");
require_once ("Utils/Utils.php");

$casesToSort = [
    [
        "unsorted" =>    [42, 56, 55, 67, 11, -57, 88, 99, 93, 58, 55],
        "expectation" => [-57, 11, 42, 55, 55, 56, 58, 67, 88, 93, 99]
    ],
    [
        "unsorted" =>    [4, 55, 6, 11, 57, 88, 99, 93, 5],
        "expectation" => [4, 5, 6, 11, 55, 57, 88, 93, 99]
    ],
];

foreach ($casesToSort as $case) {
    $caseToSort = $case['unsorted'];
    $expectedResult = $case['expectation'];

    $utils = new Utils();
    echo 'To sort:  '; $utils->printArray($caseToSort);
    echo 'Expected: '; $utils->printArray($expectedResult);

    $quickSort = new QuickSort();
    $result = $quickSort->sort($caseToSort);
    $utils->printArray($result);
    assertEqual($utils, $result, $expectedResult);

    $mergeSort = new MergeSort();
    $result = $mergeSort->sort($caseToSort);
    $utils->printArray($result);
    assertEqual($utils, $result, $expectedResult);
}

function assertEqual(Utils $utils, array $result, array $expectedResult): void
{
    if ($result != $expectedResult) {
        echo '     !!!!! INCORRECT !!!!!      ' . "\n";
        echo '     Expected result: '; $utils->printArray($expectedResult);
        die();
    }
}