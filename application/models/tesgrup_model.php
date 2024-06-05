<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tesgrup_model extends CI_Model{
	public $table = 'tesgrup';
	
	
    function save($data){
        $this->db->insert($this->table, $data);
    }
    
    function delete($kolom, $isi){
        $this->db->where($kolom, $isi)
                 ->delete($this->table);
    }
    
    function update($kolom, $isi, $data){
        $this->db->where($kolom, $isi)
                 ->update($this->table, $data);
    }
    
    function count_by_kolom($kolom, $isi){
        $this->db->select('COUNT(*) AS hasil')
                 ->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }

    function count_by_tes_and_group($tes, $group){
        $this->db->select('COUNT(*) AS hasil')
                 ->where('(tstgrp_tes_id="'.$tes.'" AND tstgrp_grup_id="'.$group.'" )')
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom($kolom, $isi){
        $this->db->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_tes_id($tes_id){
        $this->db->where('tstgrp_tes_id', $tes_id)
				 ->join('user_grup', 'tesgrup.tstgrp_grup_id = user_grup.grup_id')
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom_limit($kolom, $isi, $limit){
        $this->db->where($kolom, $isi)
                 ->from($this->table)
				 ->limit($limit);
        return $this->db->get();
    }

    function get_by_tanggal($tglawal, $tglakhir){
        $this->db->where('(DATE(tes_begin_time)>="'.$tglawal.'" AND DATE(tes_begin_time)<="'.$tglakhir.'")')
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
                 ->order_by('tes_begin_time ASC, tes_nama ASC')
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_tanggal_and_grup($tglawal, $tglakhir, $grup_id){
        $this->db->where('tstgrp_grup_id="'.$grup_id.'")')
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
                 ->order_by('tes_nama ASC')
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_datatable($start, $rows, $grup_id){
		$now = date('Y-m-d H:i:s');
		$this->db->where('(tstgrp_grup_id="'.$grup_id.'")')
                 ->from($this->table)
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
                 ->order_by('tes_nama ASC')
                 ->limit($rows, $start);
        return $this->db->get();
	}
    
    function get_datatable_count($grup_id){
		$this->db->select('COUNT(*) AS hasil')
                 ->where('(tstgrp_grup_id="'.$grup_id.'")')
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
                 ->from($this->table);
        return $this->db->get();
	}
}