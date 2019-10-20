<?php
class model_mustahik extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
    function tampilkan_data(){

        return $this->db->get('mustahik');
    }
    function tampilkan_rekening(){

        return $this->db->get('rekening');
    }

    function tampilkan_petugas(){

        return $this->db->get('petugas');
    }

    function detail_data($id){
        $this->db->where('id_mustahik',$id);
        $query = $this->db->get('mustahik');
        return $query->row_array();
    }

    function get_detail_mustahik($id){

        $this->db->where('id_mustahik',$id);
        $query = $this->db->get('mustahik');
        return $query->row_array();

    }


    function getKatAsnaf(){
      return  $this->db->get('asnaf');
    }

    function getKecamatan(){
      return  $this->db->get('kecamatan');
    }
    function getKelurahan(){
      return  $this->db->get('kelurahan');
    }

    function getPetugas(){
      return  $this->db->get('petugas');
    }

    function getProDonasi(){
      return  $this->db->get('program');
    }
    function getSaldo($id){
      $this->db->where('id_rek',$id);
      $this->db->from('rekening');
      return $this->db->get();
    }

    function kurangSaldo($id,$data){

        $this->db->where('id_rek',$id);
        $this->db->update('rekening',$data);

    }

    function post($data)
    {
        $this->db->insert('mustahik',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_mustahik'=>$id);
        return $this->db->get_where('mustahik',$param);
    }

    function get_tambah_mustahik($idMustahik)
    {
      $this->db->from('mustahik');
      $this->db->where('id_mustahik',$idMustahik);
      $query = $this->db->get();

      return $query->row_array();
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

    function detail_promus($idMustahik)
    {
      $this->db->select('*');
      $this->db->from('program_mustahik');
      $this->db->where('program_mustahik.id_mustahik',$idMustahik);
      $this->db->join('mustahik','mustahik.id_mustahik = program_mustahik.id_mustahik');
      $this->db->join('program','program.id_program = program_mustahik.id_program');
      $query = $this->db->get();
      return $query->result_array();
    }

    function tambah_data_program($program_mustahik)
    {
      $this->db->insert('program_mustahik',$program_mustahik);
    }

    function edit($data,$id)
    {
        $this->db->where('id_mustahik',$id);
        $this->db->update('mustahik',$data);
    }


    function delete($id)
    {
        $this->db->where('id_mustahik',$id);
        $this->db->delete('mustahik');
    }

    function deletePromus($id)
    {
        $this->db->where('id_promus',$id);
        $this->db->delete('program_mustahik');
    }

    function get_by_id($id)
    {
      $this->db->where('id_mustahik',$id);

      return $this->db->get('mustahik')->row();
    }

    public function total_rows(){
      $data = $this->db->get('mustahik');

      return $data->num_rows();
    }

    public function select_all() {
		$data = $this->db->get('mustahik');

		return $data->result();
	}
}
