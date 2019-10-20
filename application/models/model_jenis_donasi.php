<?php
class model_jenis_donasi extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('jenis_donasi');
    }


    function post($data)
    {
        $this->db->insert('jenis_donasi',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_jenis'=>$id);
        return $this->db->get_where('jenis_donasi',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_jenis',$id);
        $this->db->update('jenis_donasi',$data);
    }


    function delete($id)
    {
        $this->db->where('id_jenis',$id);
        $this->db->delete('jenis_donasi');
    }

    function get_by_id($id)
    {
      $this->db->where('jenis_donasi',$id);

      return $this->db->get('jenis_donasi')->row();
    }
}
