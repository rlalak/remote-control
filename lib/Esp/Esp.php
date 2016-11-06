<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 15.10.16
 * Time: 21:43
 */
class Esp
{
    private $id = null;
    private $description = null;
    private $ip = null;
    private $number_of_states = null;

    private $is_reverted_state = false;

    private $state = null;

    public function __construct($id, $description, $ip, $number_of_states)
    {
        $this->id = $id;
        $this->description = $description;
        $this->ip = $ip;
        $this->number_of_states = $number_of_states;
    }

    public function setIsRevertedState($is_reverted_state)
    {
        $this->is_reverted_state = $is_reverted_state;
    }

    protected function call($path, array $parameters = [])
    {
        $url = 'http://' . $this->ip . '/' . $path;

        if (!empty($parameters)) {
            $url .= "?" . http_build_query($parameters);
        }

        $response = @file_get_contents($url);
//var_dump($url, $parameters,$response);
        if (false === $response || false !== strpos($response, 'File Not Found')) {
            throw new InvalidArgumentException("Incorrect path `$path` for ip `{$this->ip}`.");
        }

        if ($this->is_reverted_state) {
            $this->state = $response == '1' ? '0' : '1';
        } else {
            $this->state = $response;
        }
    }

    protected function getStateBit(StateNumber $state_number)
    {
        if ($state_number->val() > $this->number_of_states) {
            throw new InvalidArgumentException("Incorrect state number `$state_number`.");
        }

        return pow(2, $state_number->val() - 1);
    }

    protected function loadState()
    {
        $this->call('get-state');
    }

    public function getState()
    {
        if (null === $this->state) {
            $this->loadState();
        }

        return $this->state;
    }

    public function setState($state)
    {
        $this->call('set-state', ['state' => $state]);
    }

    public function getSingleState(StateNumber $state_number)
    {
        $state_bit = $this->getStateBit($state_number);

        $and_state = $this->getState() & $state_bit;

        return $and_state == $state_bit ? 1 : 0;
    }

    public function setSingleState(StateNumber $state_number, SingleState $state_value)
    {
        // 'set-one-state' not exist yet
        if ($this->getSingleState($state_number) != $state_value->val()) {
            $this->toggleSingleState($state_number);
        }

        //$this->call('set-one-state', ['state_number' => $state_number->val(), 'state_value' => $state_value->val()]);
    }

    public function toggleSingleState(StateNumber $state_number)
    {
        $this->call('toogle-one-state', ['state_number' => $state_number->val()]);
    }
}