<?php
class model_muzakki extends ci_model{

    function __construct(){
      parent::__construct();
        $this->load->database();

    }
    function tampilkan_data(){

        return $this->db->get('muzakki');
    }
    function export(){
        return $this->db->get('muzakki')->result();
    }

    function import(){
        return $this->db->get('muzakki')->result();
    }

    function kurangSaldo($data){
        $this->db->insert('rekening',$data);
    }


    function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('muzakki', $data);
  }

    function cari_muzakki($key){
          $this->db->from('muzakki');
          $this->db->or_like(array('nama_muz' => $key,'no_npwp' => $key, 'no_hp' => $key ));
          $query = $this->db->get();
          return $query->result_array();
     }

    function detail_data($id){
        $this->db->where('id_muzakki',$id);
        $query = $this->db->get('muzakki'); 
        return $query->row_array();
    }

    function get_detail_muzakki($id){

        $this->db->where('id_muzakki',$id);
        $query = $this->db->get('muzakki'); 
        return $query->row_array();   

    }

    function get_program_muzakki()
    {
      $this->db->select('*');
      $this->db->from('program_muzakki');
      $this->db->join('muzakki','muzakki.id_muzakki = program_muzakki.id_muzakki');
      $this->db->join('program','program.id_program = program_muzakki.id_program');
      $this->db->join('jenis_donasi','jenis_donasi.id_jenis = program_muzakki.id_jenis');
      $this->db->join('cara_donasi','cara_donasi.id_cara = program_muzakki.id_cara');
      $query = $this->db->get();
      return $query->result_array();
    }

    function detail_promuz($idMuzakki)
    {
      $this->db->select('*');
      $this->db->from('program_muzakki');
      $this->db->where('program_muzakki.id_muzakki',$idMuzakki);
      $this->db->join('muzakki','muzakki.id_muzakki = program_muzakki.id_muzakki');
      $this->db->join('program','program.id_program = program_muzakki.id_program');
      $this->db->join('jenis_donasi','jenis_donasi.id_jenis = program_muzakki.id_jenis');
      $this->db->join('cara_donasi','cara_donasi.id_cara = program_muzakki.id_cara');
      $query = $this->db->get();
      return $query->result_array();
    }

    function tambah_data_program($program_muzakki)
    {
      $this->db->insert('program_muzakki',$program_muzakki);
      return $this->db->affected_rows();
    }

    function get_tambah_muzakki($idMuzakki)
    {
      $this->db->from('muzakki');
      $this->db->where('id_muzakki',$idMuzakki);
      $query = $this->db->get();

      return $query->row_array();
    }



    function getProgDonasi(){
      return  $this->db->get('program');
    }

    function getCaraDonasi(){
      return  $this->db->get('cara_donasi');
    }

    function getJenDonasi(){
      return  $this->db->get('jenis_donasi');
    }

    function post($data)
    {
        $this->db->insert('muzakki',$data);
    }

    function get_one($id)
    {
        $param  =   array('id_muzakki'=>$id);
        return $this->db->get_where('muzakki',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('id_muzakki',$id);
        $this->db->update('muzakki',$data);
    }


    function delete($id)
    {
        $this->db->where('id_muzakki',$id);
        $this->db->delete('muzakki');
    }

    // function get_by_id($id)
    // {
    //   $this->db->where('nis',$id);
    //
    //   return $this->db->get('datasiswa')->row();
    // }
    public function total_rows(){
      $data = $this->db->get('muzakki');

      return $data->num_rows();
    }
}
