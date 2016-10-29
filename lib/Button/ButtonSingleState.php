<?php

class ButtonSingleState extends Button
{
    protected $state_number;

    public function setStateNumber(StateNumber $state_number)
    {
        $this->state_number = $state_number;
    }

    public function loadState()
    {
        $this->state = $this->esp->getSingleState($this->state_number);
    }

    public function toggle()
    {
        $this->esp->toggleSingleState($this->state_number);

        $this->loadState();
    }

    public function on()
    {
        $this->esp->setSingleState($this->state_number, SingleState::ON());

        $this->loadState();
    }

    public function off()
    {
        $this->esp->setSingleState($this->state_number, SingleState::OFF());

        $this->loadState();
    }
}
