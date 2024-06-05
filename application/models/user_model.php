<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model{
	public $table = 'cc_user';
	
	
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

    public function edit_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    function update_exp_user($id) {
        $this->db->select("exp_user")
        ->where("user_id=$id")
        ->join('cc_user', 'tes_user.tesuser_user_id = cc_user.user_id')
        ->update('cc_user', 'exp_user=30');
        return $this->db->get();
    }

    function get_usr($id)
    {
        $this->db->select('*');
        $this->db->from('cc_user');
        $this->db->where('cc_user.user_id', $id);
        $hasil = $this->db->get();

        return $hasil->result();
    }

    function get_leaderboard()
    {
        $this->db->select('nama_user, exp_user, email_user');
        $this->db->from('cc_user')->order_by('exp_user DESC');
        $hasil = $this->db->get();

        return $hasil->result();
    }

    function get_leaderboard_num()
    {
        $this->db->select('COUNT(*)');
        $this->db->from('cc_user')->order_by('exp_user DESC');
        $hasil = $this->db->get();

        return $hasil->result();
    }

    function get_transaksi_user($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.user_id', $id);
        $hasil = $this->db->get();

        return $hasil->result();
    }

    function get_transaksi_all()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('cc_user', 'cc_user.user_id = transaksi.user_id');
        $hasil = $this->db->get();

        return $hasil->result();
    }

    function get_transaksi($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.user_id', $id);
        $this->db->join('cc_user', 'cc_user.user_id = transaksi.user_id');
        $hasil = $this->db->get();

        return $hasil->result();
    }

    function get_transaksi_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $hasil = $this->db->where('id_transaksi', $id)->get();
        
        if ($hasil->num_rows() > 0) {
            return $hasil->result()[0];
        } else {
            return false;
        }
    }

    public function edit_data_transaksi($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    
    function count_by_kolom($kolom, $isi){
        $this->db->select('COUNT(*) AS hasil')
                 ->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }

    public function hapus_data_transaksi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
	
	function get_by_kolom($kolom, $isi){
        $this->db->select('user_id,user_grup_id,password_user,email_user,nama_user,user_regdate')
                 ->where($kolom, $isi)
                 ->from($this->table);
        return $this->db->get();
    }
	
	function get_by_kolom_limit($kolom, $isi, $limit){
        $this->db->select('user_id,user_grup_id,password_user,email_user,nama_user,user_regdate')
                 ->where($kolom, $isi)
                 ->from($this->table)
				 ->limit($limit);
        return $this->db->get();
    }

    function count_by_email_password($email, $password){
        $this->db->select('COUNT(*) AS hasil')
                 ->where('(email_user="'.$email.'" AND password_user="'.$password.'")')
                 ->from($this->table);
        return $this->db->get()->row()->hasil;
    }

    function get_by_email($email){
        $this->db->join('user_grup', 'cc_user.user_grup_id = user_grup.grup_id')
        ->where('email_user',$email)
        ->limit(1);
        $query = $this->db->get($this->table);
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    function get_transaksi_by_email($email){
        $this->db->join('transaksi', 'cc_user.user_id = transaksi.user_id')
        ->where('email_user',$email)
        ->order_by('id_transaksi DESC')
        ->limit(1);
        $query = $this->db->get($this->table);
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
	
	function get_datatable($start, $rows, $kolom, $isi, $group){
        $query = '';
        if($group!='semua'){
            $query = 'AND user_grup_id='.$group;
        }
		$this->db->where('('.$kolom.' LIKE "%'.$isi.'%" '.$query.')')
                 ->from($this->table)
				 ->order_by($kolom, 'ASC')
                 ->limit($rows, $start);
        return $this->db->get();
	}
    
    function get_datatable_count($kolom, $isi, $group){
        $query = '';
        if($group!='semua'){
            $query = 'AND user_grup_id='.$group;
        }
		$this->db->select('COUNT(*) AS hasil')
                 ->where('('.$kolom.' LIKE "%'.$isi.'%" '.$query.')')
                 ->from($this->table);
        return $this->db->get();
	}
	
	/**
	* export data user yang belum mengerjakan
	*/
	function get_by_tes_group_urut_tanggal($tes_id, $grup_id, $urutkan, $tanggal, $keterangan){
        $sql = 'tes_begin_time>="'.$tanggal[0].'" AND tes_end_time<="'.$tanggal[1].'" AND tesuser_id IS NULL';
		
        if($tes_id!='semua'){
            $sql = $sql.' AND tes_id="'.$tes_id.'"';
        }
        if($grup_id!='semua'){
            $sql = $sql.' AND user_grup_id="'.$grup_id.'"';
        }
        $order = '';
        if($urutkan=='nama'){
            $order = 'nama_user ASC';
        }else if($urutkan=='waktu'){
            $order = 'tes_begin_time DESC';
        }else{
            $order = 'tes_id ASC';
        }
		
		// if(!empty($keterangan)){
		// 	$sql = $sql.' AND user_detail LIKE "%'.$keterangan.'%"';
		// }
				 
		$this->db->select('tes.*,user_grup.grup_nama, tes.*, cc_user.*, "0" AS nilai, "Belum mengerjakan" AS tesuser_creation_time')
                 ->where('( '.$sql.' )')
                 ->from($this->table)
                 ->join('user_grup', 'cc_user.user_grup_id = user_grup.grup_id')
				 ->join('tesgrup', 'tesgrup.tstgrp_grup_id = user_grup.grup_id')
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
				 ->join('tes_user', '(tes_user.tesuser_tes_id = tes.tes_id) AND (tes_user.tesuser_user_id = cc_user.user_id)', 'left')
				 ->order_by($order);
        return $this->db->get();
    }
	
	/**
	* datatable untuk hasil tes yang belum mengerjakan
	*
	*/
	function get_datatable_hasiltes($start, $rows, $tes_id, $grup_id, $urutkan, $tanggal, $keterangan, $search){
        $sql = 'tes_begin_time>="'.$tanggal[0].'" AND tes_end_time<="'.$tanggal[1].'" AND tesuser_id IS NULL AND nama_user LIKE "%'.$search.'%"';
		
        if($tes_id!='semua'){
            $sql = $sql.' AND tes_id="'.$tes_id.'"';
        }
        if($grup_id!='semua'){
            $sql = $sql.' AND user_grup_id="'.$grup_id.'"';
        }
        $order = '';
        if($urutkan=='nama'){
            $order = 'nama_user ASC';
        }else if($urutkan=='waktu'){
            $order = 'tes_begin_time DESC';
        }else{
            $order = 'tes_id ASC';
        }
		
		// if(!empty($keterangan)){
		// 	$sql = $sql.' AND user_detail LIKE "%'.$keterangan.'%"';
		// }

		$this->db->select('tes.*,user_grup.grup_nama, tes.*, user.*, "0" AS nilai')
                 ->where('( '.$sql.' )')
                 ->from($this->table)
                 ->join('user_grup', 'cc_user.user_grup_id = user_grup.grup_id')
				 ->join('tesgrup', 'tesgrup.tstgrp_grup_id = user_grup.grup_id')
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
				 ->join('tes_user', '(tes_user.tesuser_tes_id = tes.tes_id) AND (tes_user.tesuser_user_id = cc_user.user_id)', 'left')
				 ->order_by($order)
                 ->limit($rows, $start);
        return $this->db->get();
	}
    
    function get_datatable_hasiltes_count($tes_id, $grup_id, $urutkan, $tanggal, $keterangan, $search){
        $sql = '(tes_begin_time>="'.$tanggal[0].'" AND tes_end_time<="'.$tanggal[1].'") AND tesuser_id IS NULL AND nama_user LIKE "%'.$search.'%"';
		
        if($tes_id!='semua'){
            $sql = $sql.' AND tes_id="'.$tes_id.'"';
        }
        if($grup_id!='semua'){
            $sql = $sql.' AND user_grup_id="'.$grup_id.'"';
        }
		
		// if(!empty($keterangan)){
		// 	$sql = $sql.' AND user_detail LIKE "%'.$keterangan.'%"';
		// }

		$this->db->select('COUNT(*) AS hasil')
                 ->where('( '.$sql.' )')
                 ->join('user_grup', 'cc_user.user_grup_id = user_grup.grup_id')
				 ->join('tesgrup', 'tesgrup.tstgrp_grup_id = user_grup.grup_id')
                 ->join('tes', 'tesgrup.tstgrp_tes_id = tes.tes_id')
				 ->join('tes_user', '(tes_user.tesuser_tes_id = tes.tes_id) AND (tes_user.tesuser_user_id = cc_user.user_id)', 'left')
                 ->from($this->table);
        return $this->db->get();
	}
}