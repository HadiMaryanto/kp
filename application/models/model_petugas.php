<?php
class model_petugas extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('petugas');
    }
    

    function post($data)
    {
        $this->db->insert('petugas',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_petugas'=>$id);
        return $this->db->get_where('petugas',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_petugas',$id);
        $this->db->update('petugas',$data);
    }


    function delete($id)
    {
        $this->db->where('id_petugas',$id);
        $this->db->delete('petugas');
    }

    function get_by_id($id)
    {
      $this->db->where('petugas',$id);

      return $this->db->get('petugas')->row();
    }
}
