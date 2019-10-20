<?php
class Kelurahan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_kelurahan');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_kelurahan->tampilkan_data();
        $this->template->load('template','kelurahan/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('nama_kel');


            $data           = array('nama_kel'=>$nama


            );

            $this->model_kelurahan->post($data);
            redirect('Kelurahan');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','kelurahan/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_kel');
          $nama = $this->input->post('nama_kel');


            $data           = array('nama_kel'=>$nama

            );
            $this->model_kelurahan->edit($data,$id);
            redirect('Kelurahan');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kelurahan');
            $data['record']     =  $this->model_kelurahan->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','kelurahan/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_kelurahan->delete($id);
        redirect('Kelurahan');
    }
}
