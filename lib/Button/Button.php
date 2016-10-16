<?php

class Button
{
    private $id;
    private $name;
    private $position_x;
    private $position_y;

    /**
     * @var ESP
     */
    private $esp;

    private $state = null;

    public function __construct($id, ESP $esp, $name, $position_x, $position_y)
    {
        $this->id = $id;
        $this->esp = $esp;
        $this->name = $name;
        $this->position_x = $position_x;
        $this->position_y = $position_y;
    }

    public function loadState()
    {
        $this->state = (bool)$this->callEsp('status');
    }

    public function toogle()
    {
        $this->state = (bool)$this->callEsp('toogle');
    }

    public function on()
    {
        $this->state = (bool)$this->callEsp('on');
    }

    public function off()
    {
        $this->state = (bool)$this->callEsp('off');
    }

    public function getState()
    {
        return $this->state;
    }

    protected function callEsp($path)
    {
        return $this->esp->call($path);
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
            '<div class="' . implode(" ", $button_class) .
            '" style="' . $style . '" data-id="' . $this->id .
            '" left="' . $this->position_x . '"' .
            '" top="' . $this->position_y . '"' .
            '>'
            . $html .
            '</div>';
    }
}
