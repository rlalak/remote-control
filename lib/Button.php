<?php

class Button
{
    private $name = null;
    private $position_x = null;
    private $position_y = null;
    private $esp_ip = null;
    private $state = null;

    private $is_reverted_state = false;

    public function __construct($name, $x, $y, $ip)
    {
        $this->name = $name;
        $this->position_x = $x;
        $this->position_y = $y;
        $this->esp_ip = $ip;
    }

    public function setIsRevertedState($is_reverted_state)
    {
        $this->is_reverted_state = $is_reverted_state;
    }

    public function loadState()
    {
        $this->state = (bool)$this->loadFromEsp('status');
    }

    public function toogle()
    {
        $this->state = (bool)$this->loadFromEsp('toogle');
    }

    public function on()
    {
        $this->state = (bool)$this->loadFromEsp('on');
    }

    public function off()
    {
        $this->state = (bool)$this->loadFromEsp('off');
    }

    public function getState()
    {
        return $this->state;
    }

    protected function loadFromEsp($path)
    {
        $state = @file_get_contents('http://' . $this->esp_ip . '/' . $path);

        if ($this->is_reverted_state) {
            return $state == '1' ? '0' : '1';
        } else {
            return $state;
        }
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
            '" style="' . $style . '" name="' . $this->name .
            '" left="' . $this->position_x . '"' .
            '" top="' . $this->position_y . '"' .
            '>'
            . $html .
            '</div>';
    }
}