<?php

/**
 * Created by PhpStorm.
 * User: rlalak
 * Date: 15.10.16
 * Time: 22:12
 *
 * @method Esp get($id)
 */
class EspRepository extends PhpFileRepository
{
    const ID_LIVING_ROOM = 1;
    const ID_WARDROBE = 2;

    protected function create($id, $description, $ip, $number_of_states)
    {
        return new Esp($id, $description, $ip, $number_of_states);
    }
}
