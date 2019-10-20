<?php
class bank extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_bank');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_bank->tampilkan_data();
        $this->template->load('template','bank/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
            $nama_bank    = $this->input->post('nama_bank');
            $telepon    = $this->input->post('telepon');
            
           
            
            $data           = array('nama_bank'=>$nama_bank,
                                    'telepon'=>$telepon,
                                    
            );
            
            ;
            $this->model_bank->post($data);
            redirect('bank');
        }
        else{
            //$this->load->view('uangkeluar/form_input');
           
            
            $this->template->load('template','bank/form_input');
        }
    }
   


    function edit()
    {
       if(isset($_POST['submit'])){
                // proses siswa
            $id =         $this->input->post('id_bank') ;
            $nama_bank      =   $this->input->post('nama_bank') ;
            $telepon      =   $this->input->post('telepon') ; 
            $data       = array('nama_bank'=>$nama_bank,'telepon'=>$telepon
                                );
            $this->model_bank->edit($data,$id);
            redirect('bank');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_bank');
            $data['record']     =  $this->model_bank->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','bank/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_bank->delete($id);
        redirect('bank');
    }
}
