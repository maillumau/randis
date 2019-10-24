<?php
class Kelompok3_model extends CI_Model{

    public function get_merek_randis(){
        $q = $this->db->query("select * from merekran");
        return $q->result();
    }
   
    public function get_silinder_randis(){
        $q = $this->db->query("select * from silinder");
        return $q->result();
    }

    public function get_type_kendaraan(){
        $q = $this->db->query("select * from typeran where flag_del='0'");
        return $q->result();
    }
    public function get_jabatan(){
        $q = $this->db->query("select * from pemegangran");
        return $q->result();
    }
    public function get_jenis_randis(){
        $q = $this->db->query("select * from jenisran where flag_del='0'");
        return $q->result();
    }

    public function get_all_randis_filter_by_flag_del(){
        
        $this->db->select();
        $this->db->from('kuatalmat');
        $this->db->where('flag_del',0);
        $this->db->order_by("id", "desc");
        $q = $this->db->get();
        return $q->result();
    }

        public function get_randis_filter_by_flag_del($id){
        
        $this->db->select();
        $this->db->from('kuatalmat');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $q->result();
    }

    public function get_type_by_code($code){
         $q = $this->db->query("select * from typeran where  kode = '".$code."' limit 1");
        return $q->row();
    }

}
?>