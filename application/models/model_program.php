<?php
class model_program extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('program');
    }
    

    function post($data)
    {
        $this->db->insert('program',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_program'=>$id);
        return $this->db->get_where('program',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_program',$id);
        $this->db->update('program',$data);
    }


    function delete($id)
    {
        $this->db->where('id_program',$id);
        $this->db->delete('program');
    }

    function get_by_id($id)
    {
      $this->db->where('program',$id);

      return $this->db->get('program')->row();
    }
}
