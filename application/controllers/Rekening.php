<?php
class Rekening extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_rekening');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_rekening->tampilkan_data();
        $this->template->load('template','rekening/lihat_data',$data);
        // $this->template->load('template','homes/lihat_data',$data);
    }
function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('nama_bank');
          $no_rek = $this->input->post('no_rek');
          $saldo = $this->input->post('saldo');
          $tgl_aktivasi = $this->input->post('tgl_aktivasi');


            $data           = array('nama_bank'=>$nama,
                                    'no_rek'=>$no_rek,
                                    'saldo'=>$saldo,
                                    'tgl_aktivasi'=>$tgl_aktivasi


            );

            $this->model_rekening->post($data);
            redirect('Rekening');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','rekening/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
        $id = $this->input->post('id_rek');
         $nama = $this->input->post('nama_bank');
         $no_rek = $this->input->post('no_rek');
         $saldo = $this->input->post('saldo');
         $tgl_aktivasi = $this->input->post('tgl_aktivasi');


         $data           = array('nama_bank'=>$nama,
                                 'no_rek'=>$no_rek,
                                 'saldo'=>$saldo,
                                 'tgl_aktivasi'=>$tgl_aktivasi


         );
            $this->model_rekening->edit($data,$id);
            redirect('Rekening');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_rekening');
            $data['record']     =  $this->model_rekening->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','rekening/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_rekening->delete($id);
        redirect('Rekening');
    }
}
