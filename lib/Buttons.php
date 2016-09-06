<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 07.08.16
 * Time: 15:51
 */
class Buttons
{
    private static $buttons = [];

    public static function registerButton($name, $x, $y, $ip)
    {
        $button = new Button($name, $x, $y, $ip);

        static::$buttons[$name] = $button;

        return $button;
    }

    /**
     * @param $name
     * @return Button
     * @throws Exception
     */
    public static function getButton($name)
    {
        if (array_key_exists($name, static::$buttons)) {
            return static::$buttons[$name];
        }

        throw new Exception("Button with name `$name` doesn't exist!");
    }

    public static function getAll()
    {
        return static::$buttons;
    }
}