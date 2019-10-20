<?php
class Jenis_Donasi extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_jenis_donasi');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_jenis_donasi->tampilkan_data();
        $this->template->load('template','jenis_donasi/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('jenis_donasi');


            $data           = array('jenis_donasi'=>$nama


            );

            $this->model_jenis_donasi->post($data);
            redirect('Jenis_Donasi');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','jenis_donasi/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_jenis');
          $nama = $this->input->post('jenis_donasi');


            $data           = array('jenis_donasi'=>$nama

            );
            $this->model_jenis_donasi->edit($data,$id);
            redirect('Jenis_Donasi');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_jenis_donasi');
            $data['record']     =  $this->model_jenis_donasi->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','jenis_donasi/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_jenis_donasi->delete($id);
        redirect('Jenis_Donasi');
    }
}
