<?php
class Asnaf extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_asnaf');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_asnaf->tampilkan_data();
        $this->template->load('template','asnaf/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('nama_asnaf');


            $data           = array('nama_asnaf'=>$nama


            );

            $this->model_asnaf->post($data);
            redirect('Asnaf');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','asnaf/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_asnaf');
          $nama = $this->input->post('nama_asnaf');


            $data           = array('nama_asnaf'=>$nama

            );
            $this->model_asnaf->edit($data,$id);
            redirect('Asnaf');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_asnaf');
            $data['record']     =  $this->model_asnaf->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','asnaf/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_asnaf->delete($id);
        redirect('Asnaf');
    }
}
