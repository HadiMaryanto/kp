<?php
class model_asnaf extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('asnaf');
    }


    function post($data)
    {
        $this->db->insert('asnaf',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_asnaf'=>$id);
        return $this->db->get_where('asnaf',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_asnaf',$id);
        $this->db->update('asnaf',$data);
    }


    function delete($id)
    {
        $this->db->where('id_asnaf',$id);
        $this->db->delete('asnaf');
    }

    function get_by_id($id)
    {
      $this->db->where('asnaf',$id);

      return $this->db->get('asnaf')->row();
    }
}
