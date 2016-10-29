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

    protected function create($id, $description, $ip, $number_of_states, $old_type)
    {
        if ($old_type) {
            $esp = new EspOld($id, $description, $ip, $number_of_states);
            $esp->setIsRevertedState(true);

            return $esp;
        } else {
            return new Esp($id, $description, $ip, $number_of_states);
        }
    }
}
