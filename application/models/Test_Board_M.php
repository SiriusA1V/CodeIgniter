<?php

/**
 * Created by PhpStorm.
 * User: siri
 * Date: 2018-01-05
 * Time: 오후 2:26
 */
class Test_Board_M extends CI_Model
{
    function modify2($searchid, $userid, $classification, $name, $gender, $password, $phone, $email){
        $query = $this->db->query("UPDATE `userinfo` SET `userid` = '$userid', `classification` = '$classification', `name` = '$name',
                  `gender` = '$gender', `password` = '$password', `phone` = '$phone', `email` = '$email' WHERE `userid` = '$searchid'");
    }

    function registerationProcess($userid, $classification, $name, $gender, $password, $phone, $email){
        $query = $this->db->query("insert into `userinfo` (`userid`, `classification`, `name`, `gender`, `password`, `phone`, `email`)
                  VALUES ('$userid', '$classification', '$name', '$gender', '$password', '$phone', '$email')");
    }

    function modify($searchid){
        $query = $this->db->query("select * from `userinfo` where userid = '$searchid'");
        $array = $query->result();

        return $array;
    }

    function delete($userid){
        $query = $this->db->query("delete from `userinfo` where `userid` = '$userid'");
    }

    function info_list(){
        $query = $this->db->query("select * from `userinfo`");
        $array = $query->result_array();

        return $array;
    }
}