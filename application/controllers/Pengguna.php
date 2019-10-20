<?php
class Pengguna extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_pengguna');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_pengguna->tampilkan_data();
        $this->template->load('template','pengguna/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $nama_lengkap = $this->input->post('nama_lengkap');
          $level = $this->input->post('level');


            $data           = array('username'=>$username,
                                    'password'=>md5($password),
                                    'nama_lengkap'=>$nama_lengkap,
                                    'level'=>$level



            );

            $this->model_pengguna->post($data);
            redirect('Pengguna');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','pengguna/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_user');
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $nama_lengkap = $this->input->post('nama_lengkap');
          $level = $this->input->post('level');


            $data           = array('username'=>$username,
                                    'password'=>$password,
                                    'nama_lengkap'=>$nama_lengkap,
                                    'level'=>$level

            );
            $this->model_pengguna->edit($data,$id);
            redirect('Pengguna');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_pengguna');
            $data['record']     =  $this->model_pengguna->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','pengguna/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_pengguna->delete($id);
        redirect('Pengguna');
    }
}
