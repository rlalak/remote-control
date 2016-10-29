<?php

abstract class Button
{
    protected $id;
    protected $name;
    protected $position_x;
    protected $position_y;

    /**
     * @var ESP
     */
    protected $esp;

    protected $state = null;

    public function __construct($id, ESP $esp, $name, $position_x, $position_y)
    {
        $this->id = $id;
        $this->esp = $esp;
        $this->name = $name;
        $this->position_x = $position_x;
        $this->position_y = $position_y;
    }

    abstract public function loadState();

    abstract public function toggle();

    abstract public function on();

    abstract public function off();

    public function getState()
    {
        if (null === $this->state) {
            $this->loadState();
        }

        return $this->state;
    }

    public function render()
    {
        $button_class = array('button');

        if ($this->state) {
            $html = 'on';
            $button_class[] = 'button-on';
        } else {
            $html = 'off';
            $button_class[] = 'button-off';
        }

        $style = "left: {$this->position_x}px; top: {$this->position_y}px;";

        return
            '<div'.
            ' class="' .  implode(" ", $button_class) . '"' .
            ' style="' . $style . '"' .
            ' data-id="' . $this->id . '"' .
            ' data-left="' . $this->position_x . '"' .
            ' data-top="' . $this->position_y . '"' .
            ' alt="' . $this->name. '"' .
            '>'
            . $html .
            '</div>';
    }
}
