<?php

/**
 * Created by PhpStorm.
 * User: siri
 * Date: 2018-01-04
 * Time: 오후 2:31
 */
class Hello extends CI_Controller
{
    public function why_index(){
        $this->load->database();

        $this->load->model('Hello_M');

        $test['title'] = "Model example";

        $test['users'] = $this->Hello_M->get_users();

        $this->load->view('hello_view01', $test);
    }
}