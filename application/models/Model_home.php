<?php
class model_home extends ci_model{

function get_progMustahik($bulan){
	$query = "SELECT COUNT(id_mus) FROM mustahik where bulan='$bulan'";
	return $this->db->query($query);
}
    function get_program_mustahik()
    {
      $this->db->select('*');
      $this->db->from('program_mustahik');
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $query = $this->db->get();
      return $query->result_array();
    }

    function get_program_muzakki()
    {
      $this->db->select('*');
      $this->db->from('program_muzakki');
      $this->db->join('muzakki','muzakki.id_muzakki = program_muzakki.id_muzakki');
      $this->db->join('program','program.id_program = program_muzakki.id_program');
      $query = $this->db->get();
      return $query->result_array();
    }
    function getAllSaldo(){
      $this->db->select_sum('saldo');
    $query = $this->db->get('rekening');
    return $query->result_array();
    }
    function countProgram($id){
      $this->db->where('id_program',$id);
      $this->db->from('program_mustahik');
      return $this->db->count_all_results();
    }
 
}
