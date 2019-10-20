<?php
class model_operator extends CI_Model{



    function login($username,$password)
    {
        $cek=  array('username'=>$username,'password'=>md5($password));
        return $this->db->get_where('user',$cek);
        
    } 


    function tampildata()
    {
        return $this->db->get('user');
    } 

    function get_one($id)
    {
        $param  =   array('usename'=>$id);
        return $this->db->get_where('operator',$param);
    }

     function editLastLogin($data,$id)
    {

        $this->db->where('noAnggota',$id);
        $this->db->update('users',$data);
    }
    function new_member($data){
        $this->db->insert('users',$data);
    }
    
    
    function select_max() {
    $result = $this->db->select_max('noAnggota')->get('users')->result_array();
    return (int) $result[0]['noAnggota'];
}

}
