<?php

class ButtonFullState extends Button
{
    public function loadState()
    {
        $this->state = $this->esp->getState();
    }

    public function toggle()
    {
        throw new BadMethodCallException("Toggle is not available for full state button!");
    }

    public function on()
    {
        $this->esp->setState(1);

        $this->loadState();
    }

    public function off()
    {
        $this->esp->setState(0);

        $this->loadState();
    }
}
