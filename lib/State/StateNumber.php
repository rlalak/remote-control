<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 26.10.16
 * Time: 21:46
 */
class StateNumber
{
    private $state_number;

    protected function __construct($state_number)
    {
        if (!is_int($state_number) || $state_number < 1) {
            throw new InvalidArgumentException("Incorrect state number");
        }

        $this->state_number = $state_number;
    }

    public static function get($state_number)
    {
        return new self($state_number);
    }

    public function val()
    {
        return $this->state_number;
    }
}