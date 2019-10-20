<?php 

class model_anggota extends ci_model
{
	function tampil_data($id){
   	$param  =   array('penerima'=>$id);
    return $this->db->get_where('pemberitahuan',$param);
   }


}


 ?>