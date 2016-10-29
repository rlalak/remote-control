<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 15.10.16
 * Time: 22:02
 *
 * @method Button get($id)
 */
class ButtonRepository extends PhpFileRepository
{
    const ID_CHRISTMAS_TREE = 1;
    const ID_WARDROBE_LIGHT = 2;
    const ID_WARDROBE_FAN = 3;

    private $esp_repository;

    public function __construct($file_path, EspRepository $esp_repository)
    {
        $this->esp_repository = $esp_repository;

        parent::__construct($file_path);
    }

    protected function create(
        $id,
        $esp_id,
        $name,
        $position_x,
        $position_y,
        ButtonType $type,
        StateNumber $state_number = null
    ) {
        $esp = $this->esp_repository->get($esp_id);

        if (ButtonType::SINGLE_STATE == $type->__toString()) {
            $button = new ButtonSingleState($id, $esp, $name, $position_x, $position_y);
            $button->setStateNumber($state_number);

            return $button;
        } elseif (ButtonType::FULL_STATE == $type) {
            return new ButtonFullState($id, $esp, $name, $position_x, $position_y);
        }
    }
}