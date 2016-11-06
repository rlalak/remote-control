<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 26.10.16
 * Time: 20:09
 */
class SingleState
{
    const ON = 1;
    const OFF = 0;

    private $state;

    protected function __construct($state)
    {
        $this->state = $state;
    }

    public static function ON()
    {
        return new self(static::ON);
    }

    public static function OFF()
    {
        return new self(static::OFF);
    }

    public function val()
    {
        return $this->state;
    }

    public function __toString()
    {
        return $this->state;
    }
}