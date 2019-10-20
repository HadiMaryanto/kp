<?php
class Petugas extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_petugas');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_petugas->tampilkan_data();
        $this->template->load('template','petugas/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama_petugas = $this->input->post('nama_petugas');
          $jabatan = $this->input->post('jabatan');

            $data           = array('nama_petugas'=>$nama_petugas,
                                    'jabatan'=>$jabatan


            );

            $this->model_petugas->post($data);
            redirect('Petugas');
        }
        else{
            
            $this->template->load('template','petugas/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_petugas');
          $nama_petugas = $this->input->post('nama_petugas');
          $jabatan = $this->input->post('jabatan');


            $data           = array('nama_petugas'=>$nama_petugas,
                                    'jabatan'=>$jabatan

            );
            $this->model_petugas->edit($data,$id);
            redirect('Petugas');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_petugas');
            $data['record']     =  $this->model_petugas->get_one($id)->row_array();
            
            $this->template->load('template','petugas/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_petugas->delete($id);
        redirect('Petugas');
    }
}
