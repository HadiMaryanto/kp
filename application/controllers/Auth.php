<?php
class Auth extends CI_Controller{

   function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
    }



    function cek_login()
    {
        if(isset($_POST['submit'])){

            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $md5pass = md5($password);
            $hasil= $this->model_operator->login($username,$password)->row_array();



            if($username == $hasil['username'] && $md5pass = $hasil['password'])
            {
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username,'level'=>$hasil['level']));
                $_SESSION['Login'] = $username;
                $this->session->set_flashdata('success');
                $pesanSukses = "Selamat Datang ".$username;
                $this->session->set_flashdata('sukses',$pesanSukses);
                redirect('Home','refresh');
            // if ($data == false) {
            //     $this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
            //     redirect('Auth');


            }

        else{

           // $messge = array('message' => 'Wrong password enter','class' => 'alert alert-danger fade in');
           $messge = "username dan password salah";
           $this->session->set_flashdata('error',$messge );


            // $this->session->keep_flashdata('error',$messge);
            redirect('Welcome');
        }


    }
}

    function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome');
    }
    
    function register(){
        $this->load->view('register');
    }
    function post_reg(){
        if (isset($_POST['submit'])) {


        $first = $this->model_operator->select_max();
        $noAnggota = $first+1;
        $createdate = date("Y/m/d h:i:sa");
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jk = $this->input->post('jk');

        $data           = Array('noAnggota'=>$noAnggota,
                                'Fullname'=>$nama,
                                'EmailAddress'=>$email,
                                'tgl_lahir'=>$tgl_lahir,
                                'jk'=>$jk,
                                'password'=>$password,
                                'CreateDate'=>$createdate);

        if ($password == $repassword) {
           $this->model_operator->new_member($data);
           $this->load->view('login/pendaftaran_berhasil',$data);
        }
        else{
            $this->load->view('login/pendaftaran_gagal');
        }




    }
}

}
