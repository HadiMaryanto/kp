<?php
class model_rekening extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
 function tampilkan_data(){

        return $this->db->get('rekening');
    }


    function post($data)
    {
        $this->db->insert('rekening',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_rek'=>$id);
        return $this->db->get_where('rekening',$param);
    }

    function get_saldo_rekening($idRek)
    {
        $this->db->from('rekening');
        $this->db->select('saldo');
        $this->db->where('id_rek',$idRek);
        $query = $this->db->get();
        return $query->row_array();
    }

    function edit($data,$id)
    {
        $this->db->where('id_rek',$id);
        $this->db->update('rekening',$data);
    }

    function tambah_saldo($data,$idRek)
    {
        $this->db->where('id_rek',$idRek);
        $this->db->update('rekening',$data);

    }


    function delete($id)
    {
        $this->db->where('id_rek',$id);
        $this->db->delete('rekening');
    }

    function get_by_id($id)
    {
      $this->db->where('rekening',$id);

      return $this->db->get('rekening')->row();
    }

    public function total_rows(){
      $data = $this->db->get('rekening');

      return $data->num_rows();
    }
}
