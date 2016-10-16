<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 16.10.16
 * Time: 19:51
 */
class PhpFileRepository
{
    private $database = [];

    public function __construct($file_path)
    {
        $this->database = include $file_path;
    }

    /**
     * @param $id
     * @return Esp
     * @throws Exception
     */
    public function get($id)
    {
        if (array_key_exists($id, $this->database)) {
            $parameters = $this->database[$id];
            array_unshift($parameters, $id);

            return call_user_func_array(
                [$this, 'create'],
                $parameters
            );
        }

        return null;
    }

    public function getAll()
    {
        $list = [];

        foreach ($this->database as $esp_id => $esp_parameters) {
            array_unshift($esp_parameters, $esp_id);

            $list[$esp_id] = call_user_func_array(
                [$this, 'create'],
                $esp_parameters
            );
        }

        return $list;
    }
}
