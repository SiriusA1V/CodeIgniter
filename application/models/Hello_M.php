<?php

/**
 * Created by PhpStorm.
 * User: siri
 * Date: 2018-01-04
 * Time: 오후 4:09
 */
class Hello_M extends CI_Model
{
    public function get_users(){
        $query = $this->db->get('s_board');

        return $query->result();
    }
}