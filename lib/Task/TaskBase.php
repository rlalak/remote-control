<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 30.10.16
 * Time: 11:36
 */
abstract class TaskBase
{
    protected $arguments;

    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    abstract public function run();

    protected function log($message)
    {
        $message = date('Y-m-d H:i:s - ') . $message . "\n";

        file_put_contents('/var/www/remote-control/log/' . get_called_class() . '.log', $message, FILE_APPEND);
    }
}