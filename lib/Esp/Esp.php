<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 15.10.16
 * Time: 21:43
 */
class Esp
{
    private $id = null;
    private $desription = null;
    private $ip = null;
    private $number_of_states = null;

    private $is_reverted_state = false;

    public function __construct($id, $description, $ip, $number_of_states)
    {
        $this->id = $id;
        $this->description = $description;
        $this->ip = $ip;
        $this->number_of_states = $number_of_states;
    }

    public function setIsRevertedState($is_reverted_state)
    {
        $this->is_reverted_state = $is_reverted_state;
    }

    public function call($path)
    {
        $state = @file_get_contents('http://' . $this->ip . '/' . $path);

        if ($this->is_reverted_state) {
            return $state == '1' ? '0' : '1';
        } else {
            return $state;
        }
    }
}