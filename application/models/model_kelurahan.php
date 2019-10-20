<?php
class model_kelurahan extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('kelurahan');
    }


    function post($data)
    {
        $this->db->insert('kelurahan',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_kel'=>$id);
        return $this->db->get_where('kelurahan',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_kel',$id);
        $this->db->update('kelurahan',$data);
    }


    function delete($id)
    {
        $this->db->where('id_kel',$id);
        $this->db->delete('kelurahan');
    }

    function get_by_id($id)
    {
      $this->db->where('kelurahan',$id);

      return $this->db->get('kelurahan')->row();
    }
}
