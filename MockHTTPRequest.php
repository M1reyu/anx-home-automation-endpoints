<?php
require_once('./Functions.php');

/**
 * @param $event
 * @param $context
 *
 * @return array
 * @throws Exception
 */
function mockHTTPRequest($event, $context): array
{
    return [
        'status_code' => 200,
        'body' => 'request success',
    ];
}

/**
 * @param $event
 * @param $context
 *
 * @return array
 * @throws Exception
 */
function mockLongRunningHTTPRequest($event, $context): array
{
    sleep(10);

    return mockHTTPRequest($event, $context);
}

