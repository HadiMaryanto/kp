<?php
class Kecamatan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_kecamatan');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_kecamatan->tampilkan_data();
        $this->template->load('template','kecamatan/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('nama_kec');


            $data           = array('nama_kec'=>$nama


            );

            $this->model_kecamatan->post($data);
            redirect('Kecamatan');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','kecamatan/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_kec');
          $nama = $this->input->post('nama_kec');


            $data           = array('nama_kec'=>$nama

            );
            $this->model_kecamatan->edit($data,$id);
            redirect('Kecamatan');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kecamatan');
            $data['record']     =  $this->model_kecamatan->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','kecamatan/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_kecamatan->delete($id);
        redirect('Kecamatan');
    }
}
