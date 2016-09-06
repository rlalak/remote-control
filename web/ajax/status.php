<?php
include '../../lib/Controller.php';

$button = Buttons::getButton($_GET['name']);

$button->loadState();

echo $button->getState() ? '1' : '0';