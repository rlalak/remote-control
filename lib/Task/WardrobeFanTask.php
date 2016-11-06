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

        $hour = date('h');

        if ($hour == 7) {
            $fun_button->on();

            $this->log("Fun on.");
        } elseif ($hour == 22) {
            $fun_button->off();

            $this->log("Fun off.");
        } else {
            $this->log("Is hour `$hour` I do not know what should I do.");
        }

    }
}