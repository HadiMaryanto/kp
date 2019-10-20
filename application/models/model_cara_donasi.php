<?php
class model_cara_donasi extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('cara_donasi');
    }


    function post($data)
    {
        $this->db->insert('cara_donasi',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_cara'=>$id);
        return $this->db->get_where('cara_donasi',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_cara',$id);
        $this->db->update('cara_donasi',$data);
    }


    function delete($id)
    {
        $this->db->where('id_cara',$id);
        $this->db->delete('cara_donasi');
    }

    function get_by_id($id)
    {
      $this->db->where('cara_donasi',$id);

      return $this->db->get('cara_donasi')->row();
    }
}
