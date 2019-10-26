<?php
class Kelompok4_model extends CI_Model{

    public function get_merek_randis(){
        $q = $this->db->query("select * from merekran where flag_del='0'");
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
        $q = $this->db->query("select * from pemegangran where flag_del='0'");
        return $q->result();
    }
    public function get_jenis_randis(){
        $q = $this->db->query("select * from jenisran where flag_del='0'");
        return $q->result();
    }

    public function get_all_randis_filter_by_flag_del(){
        
        $this->db->select();
        $this->db->from('randis');
        $this->db->where('flag_del',0);
        $this->db->order_by("NO", "desc");
        $q = $this->db->get();
        return $q->result();
    }

        public function get_randis_filter_by_flag_del($id){
        
        $this->db->select();
        $this->db->from('randis');
        $this->db->where('NO',$id);
        $q = $this->db->get();
        return $q->result();
    }


    public function get_randis_by_id($id){
        
        $this->db->select();
        $this->db->from('randis');
        $this->db->where('NO',$id);
        $q = $this->db->get();
        return $q->row();
    }
}
?>