<?php
class Cara_Donasi extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_cara_donasi');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_cara_donasi->tampilkan_data();
        $this->template->load('template','cara_donasi/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('cara_donasi');


            $data           = array('cara_donasi'=>$nama


            );

            $this->model_cara_donasi->post($data);
            redirect('Cara_Donasi');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','cara_donasi/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_cara');
          $nama = $this->input->post('cara_donasi');


            $data           = array('cara_donasi'=>$nama

            );
            $this->model_cara_donasi->edit($data,$id);
            redirect('Cara_Donasi');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_cara_donasi');
            $data['record']     =  $this->model_cara_donasi->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','cara_donasi/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_cara_donasi->delete($id);
        redirect('Cara_Donasi');
    }
}
