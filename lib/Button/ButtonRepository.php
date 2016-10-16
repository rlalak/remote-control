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

    protected function create($id, $esp_id, $name, $position_x, $position_y)
    {
        $esp = $this->esp_repository->get($esp_id);

        return new Button($id, $esp, $name, $position_x, $position_y);
    }
}