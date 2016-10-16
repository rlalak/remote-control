<?php

declare(strict_types=1);

set_include_path(
    get_include_path()
    . PATH_SEPARATOR . "/home/rlalak/Projects/remote-control/"
);

include "config/config.php";

$esp_repository = new EspRepository('config/EspDatabase.php');

$button_repository = new ButtonRepository('config/ButtonDatabase.php', $esp_repository);
