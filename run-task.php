<?php
/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 30.10.16
 * Time: 11:38
 */

include 'lib/Controller.php';

if (empty($argv[1])) {
    echo 'Argument needed!';
    exit;
}

$task_name = $argv[1];
$task_class = $task_name . 'Task';

if (class_exists($task_class)) {
    $arguments = array_slice($argv, 2);

    /**
     * @var $task TaskBase
     */
    $task = new $task_class($arguments);

    try {
        $task->run();
    } catch (Exception $e) {
        echo "ERROR: " . $e->__toString();
    }
} else {
    echo "Task `$task_name` does not exist!";
}
