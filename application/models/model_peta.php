
<?php
class model_peta extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
    // function tampilkan_data(){
    //   $this->db->select('*');
    //   $this->db->from('program_mustahik');
    //   $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
    //   $this->db->join('program','program.id_program = program_mustahik.id_program');
    //   $query = $this->db->get();
    //   return $query->result_array();
    // }

    function get_mustahik()
    {
      $this->db->select('*');
      $this->db->from('mustahik');
      $query = $this->db->get();

      return $query->result_array();
    }
    function get_programs($id)
    {
      $this->db->select('*');
      $this->db->from('program_mustahik');
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $this->db->where('program_mustahik.id_mustahik',$id);
      $query = $this->db->get();
      return $query->result_array();
    }
    function get_program_mustahik1()
    {
      $this->db->select('*');
      $this->db->from('program_mustahik','mustahik');
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $query = $this->db->get();
      return $query->result_array();
    }
    function get_join_penerima($idPenerima)
    {
      $this->db->select('*');
      $this->db->from('program_mustahik');
      $this->db->where('program_mustahik.id_mustahik',$idPenerima);
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $query = $this->db->get();
      return $query->result_array();
    }
    function get_program_mustahik()
    {
      $this->db->select('*');
      $this->db->from('mustahik');
      $query = $this->db->get();
      return $query->result_array();
    }
    function detail_pro($idMustahik){
      $this->db->select('*');
      $this->db->from('program_mustahik');
      $this->db->where('program_mustahik.id_mustahik',$idMustahik);
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $query = $this->db->get();
      return $query->result_array();

    }
    public function insertdata($data)
  {
    $this->db->insert_batch('mustahik', $data);
  }
    // function detail_promus($idMustahik)
    // {
    //   $this->db->select('*');
    //   $this->db->from('program_mustahik');
    //   $this->db->where('program_mustahik.id_mustahik',$idMustahik);
    //   $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
    //   $this->db->join('program','program.id_program = program_mustahik.id_program');
    //   $query = $this->db->get();
    //   return $query->result_array();
    // }
    function detail_promus()
    {
      $this->db->select('*');
      $this->db->from('program_mustahik');
      // $this->db->where('program_mustahik.id_mustahik',);
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $query = $this->db->get();
      return $query->result_array();
    }
    // function tampilkan_data(){
    //   return $this->db->get('mustahik');
    // }
    function getPenerimaId($id){
      $this->db->where('id_mustahik',$id);
      $this->db->from('mustahik');
      return $this->db->get();
    }
    function getProgramById($id){
      $this->db->select('*');
      $this->db->from('program_mustahik');
      $this->db->where('id_mustahik',$id);
      return $this->db->get();
    }
  }
