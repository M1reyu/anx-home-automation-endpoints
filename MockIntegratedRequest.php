<?php
require_once('./Functions.php');

/**
 * @param $event
 * @param $context
 *
 * @return array
 * @throws Exception
 */
function getMockTaskInfoObject($event, $context): array
{
    $taskIdentifier = $event['data']['taskIdentifier'] ?? buildRandomString();
    $progress = getProgressForTask($taskIdentifier);
    $timeStartedAt = getProgressStartTime($taskIdentifier);
    $state = $progress >= 100 ? STATE_SUCCESS : STATE_PENDING; // <-1=FAILED, 0=PENDING, 1=SUCCESS>

    $taskInfo = [
        'id' => $taskIdentifier,
        'progress' => $progress,
        'status' => $state,
        'startedAt' => $timeStartedAt,
    ];

    if ($state === STATE_SUCCESS) {
        $timeFinishedAt = getProgressFinishedTime($taskIdentifier);
        $taskInfo['finishedAt'] = $timeFinishedAt;
    }

    return [
        'status' => 200,
        'taskInfo' => $taskInfo,
    ];
}

