<?php
class model_pengguna extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }

    function tampilkan_data(){

        return $this->db->get('user');
    }
     function post($data)
    {
        $this->db->insert('user',$data);
    }

    function delete($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }


    
}
