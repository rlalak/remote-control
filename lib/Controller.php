<?php

declare(strict_types=1);

include 'Button.php';
include 'Buttons.php';

$button = Buttons::registerButton('choinka', 690, 375, '192.168.1.210');
$button->setIsRevertedState(true);


