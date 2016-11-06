<?php

set_include_path(
    get_include_path()
    . PATH_SEPARATOR . "/var/www/remote-control/"
);

include "config/config.php";

$esp_repository = new EspRepository('config/EspDatabase.php');

$button_repository = new ButtonRepository('config/ButtonDatabase.php', $esp_repository);
