<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 26.10.16
 * Time: 20:09
 */
class ButtonType
{
    const SINGLE_STATE = 1;
    const FULL_STATE = 2;

    private $type;

    protected function __construct($type)
    {
        $this->type = $type;
    }

    public static function SINGLE_STATE()
    {
        return new self(static::SINGLE_STATE);
    }

    public static function FULL_STATE()
    {
        return new self(static::FULL_STATE);
    }

    public function __toString()
    {
        return $this->type;
    }
}