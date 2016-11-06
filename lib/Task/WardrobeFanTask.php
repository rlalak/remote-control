<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 30.10.16
 * Time: 11:38
 */
class WardrobeFanTask extends TaskBase
{
    public function run()
    {
        /* @var $button_repository ButtonRepository */
        global $button_repository;

        $fun_button = $button_repository->get(ButtonRepository::ID_WARDROBE_FAN);

        $minute = date('i');

        if ($minute % 2 == 0) {
            $fun_button->on();

            $this->log("Fun on.");
        } else {
            $fun_button->off();

            $this->log("Fun off.");
        }

    }
}