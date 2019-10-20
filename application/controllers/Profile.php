<?php
class Profile extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_operator->tampildata();
        $this->template->load('template','profile/tampil',$data);
    }
}