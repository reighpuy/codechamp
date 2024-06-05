<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peserta_import extends Member_Controller {
	private $kode_menu = 'peserta-import';
	private $kelompok = 'peserta';
	private $url = 'manager/peserta_import';
	
    function __construct(){
		parent:: __construct();
		$this->load->model('user_grup_model');
		$this->load->model('user_model');

        parent::cek_akses($this->kode_menu);
	}
	
    public function index(){
        $this->import();
    }

    public function import(){
        $data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;

        $this->load->library('form_validation');

        $data['error'] = '';
        $data['error_upload'] = '';

        if(!empty($_FILES['userfile']['name'])){
			$config['upload_path'] = './public/uploads/';
	        $config['allowed_types'] = 'xlsx';
	        $config['max_size']	= '0';
	        $config['overwrite'] = true;
	        $config['file_name'] = $_FILES['userfile']['name'];
	            
	        $this->load->library('upload', $config);
            if (!$this->upload->do_upload()){
            	$data['error_upload'] = $this->upload->display_errors().'Tipe file yang di upload adalah '.$_FILES['userfile']['type'];
            }else{
            	$upload_data = $this->upload->data();
                $data['filename'] = 'File '.$upload_data['file_name'].' BERHASIL di IMPORT';
                        
                // disini proses import data
                $data['hasil'] = $this->import_file($upload_data['file_name']);
            }   
                    
        }else{
        	$data['error_upload'] = 'Pilih File yang akan di IMPORT';
        }
        
        $this->template->display_admin($this->kelompok.'/peserta_import_view', 'Import Peserta', $data);
    }

    function import_file($inputfile){
        $this->load->library('excel');
        $inputFileName = './public/uploads/'.$inputfile;

        $excel = PHPExcel_IOFactory::load($inputFileName);
        $worksheet = $excel->getSheet(0);
        $highestRow = $worksheet->getHighestRow();
        $pesan='<div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Informasi!</h4>';
        
        if($highestRow>2){
            $jmldatasukses=0;
            $jmldataerror=0;
            $row=2;
            $kosong=0;
            while($kosong<4){
                $kosong=0;
                $kolom1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();//email
                $kolom2 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();//password
                $kolom3 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();//nama
                $kolom4 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();//group
                
                if(empty($kolom1)){ $kosong++; }
                if(empty($kolom2)){ $kosong++; }
                if(empty($kolom3)){ $kosong++; }
                if(empty($kolom4)){ $kosong++; }
                
                if($kosong==0){
					$kolom3 = ucwords(addslashes($kolom3));
                    if($this->user_grup_model->count_by_kolom('grup_nama', $kolom4)->row()->hasil>0){
                    	if($this->user_model->count_by_kolom('email_user', $kolom1)->row()->hasil>0){
                    		$pesan=$pesan.$kolom1.' - '.$kolom3.' sudah digunakan <br>';
                        	$jmldataerror++;
                    	}else{
                    		$data['email_user'] = $kolom1;
				            $data['password_user'] = $kolom2;
				            $data['nama_user'] = $kolom3;
				            $data['user_grup_id'] = $this->user_grup_model->get_by_kolom_limit('grup_nama', $kolom4, 1)->row()->grup_id;

                    		$this->user_model->save($data);
                    		$jmldatasukses++;
                    	}
                    }else{
                        $pesan=$pesan.'Group "'.$kolom4.'" belum dibuat <br>';
                        $jmldataerror++;
                    }
                }else{
                	if($kosong<4){
                		$pesan=$pesan.'Baris ke  '.$row.' GAGAL di simpan : '.$kolom1.' - '.$kolom3.'<br>';
                    	$jmldataerror++;
                	}
                }
                
                $row++;
            }
            $pesan = $pesan.'<br>Jumlah data yang berhasil diimport adalah '.$jmldatasukses.'<br>
                            Jumlah data yang gagal di dimport adalah '.$jmldataerror.'<br>
                            Jumlah total baris yang diproses adalah '.($row-3).'<br>';
        }else{
            $pesan = $pesan.'Tidak Ada Yang Berhasil Di IMPORT. Cek kembali file excel yang dikirim';
        }
        $pesan = $pesan.'</div>';
        
        return $pesan;
    }
}