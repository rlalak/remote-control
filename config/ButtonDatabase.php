<?php
/**
 * BUTTON_ID => [ESP_ID, NAME, POSITION_X, POSITION_Y]
 */


return [
    ButtonRepository::ID_CHRISTMAS_TREE => [
        EspRepository::ID_LIVING_ROOM,
        'Choinka',
        690,
        375,
        ButtonType::SINGLE_STATE(),
        StateNumber::get(1)
    ],
    ButtonRepository::ID_WARDROBE_LIGHT=> [
        EspRepository::ID_WARDROBE,
        'Garderoba - światło',
        150,
        600,
        ButtonType::SINGLE_STATE(),
        StateNumber::get(1)
    ],
    ButtonRepository::ID_WARDROBE_FAN => [
        EspRepository::ID_WARDROBE,
        'Garderba - wentylator',
        150,
        700,
        ButtonType::SINGLE_STATE(),
        StateNumber::get(2)
    ],
];
