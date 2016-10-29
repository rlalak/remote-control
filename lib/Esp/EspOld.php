<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 15.10.16
 * Time: 21:43
 */
class EspOld extends Esp
{
    protected function loadState()
    {
        $this->call('status');
    }

    public function setState($state)
    {
        if ($state) {
            $this->call('on');
        } else {
            $this->call('off');
        }
    }

    public function getSingleState(StateNumber $state_number)
    {
        return $this->getState() & $this->getStateBit($state_number);
    }

    public function setSingleState(StateNumber $state_number, SingleState $state_value)
    {
        $this->setState($state_value->val());
    }

    public function toggleSingleState(StateNumber $state_number)
    {
        $this->call('toogle');
    }
}