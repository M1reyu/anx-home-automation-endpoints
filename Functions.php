<?php
const STATE_ERROR = -1;
const STATE_PENDING = 0;
const STATE_SUCCESS = 1;

/**
 * @param int    $length
 * @param string $keyspace
 *
 * @return string
 * @throws Exception
 */
function buildRandomString(
    int $length = 32,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException('Length must be a positive integer');
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces [] = $keyspace[random_int(0, $max)];
    }

    return implode('', $pieces);
}

/**
 * @param string $taskIdentifier
 *
 * @return int
 */
function getProgressForTask(string $taskIdentifier = ''): int
{
    $progress = time() % 120;

    return min(100, $progress);
}

/**
 * @param string $taskIdentifier
 *
 * @return int
 */
function getProgressStartTime(string $taskIdentifier = ''): int
{
    $time = time();

    return $time - ($time % 120);
}

/**
 * @param string $taskIdentifier
 *
 * @return int
 */
function getProgressFinishedTime(string $taskIdentifier = ''): int
{
    return getProgressStartTime($taskIdentifier) + 100;
}
