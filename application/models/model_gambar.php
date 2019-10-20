<?php
class model_gambar extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
  


    function post($data)
    {
        $this->db->insert('gambar',$data);
    }

   

}
