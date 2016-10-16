<?php

include '../../lib/Controller.php';

$button = $button_repository->get($_GET['id']);

$button->loadState();

echo $button->getState() ? '1' : '0';
