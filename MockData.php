<?php

require_once('./Functions.php');

function mockString($event, $context): array
{
    $length = getIntegerFromData($event, 'length', 8);

    return [
        'status' => 200,
        'data' => buildRandomString($length),
    ];
}

function mockInteger($event, $context): array
{
    $min = getIntegerFromData($event, 'min', 0);
    $max = getIntegerFromData($event, 'max', 100);

    if ($min > $max) {
        $tmp = $min;
        $min = $max;
        $max = $tmp;
    }

    return [
        'status' => 200,
        'data' => random_int($min, $max),
    ];
}
