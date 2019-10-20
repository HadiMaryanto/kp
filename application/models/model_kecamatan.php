<?php
class model_kecamatan extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('kecamatan');
    }


    function post($data)
    {
        $this->db->insert('kecamatan',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_kec'=>$id);
        return $this->db->get_where('kecamatan',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_kec',$id);
        $this->db->update('kecamatan',$data);
    }


    function delete($id)
    {
        $this->db->where('id_kec',$id);
        $this->db->delete('kecamatan');
    }

    function get_by_id($id)
    {
      $this->db->where('kecamatan',$id);

      return $this->db->get('kecamatan')->row();
    }
}
