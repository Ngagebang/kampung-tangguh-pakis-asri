<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class W extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// echo base64_encode(md5(date('YMDHIS'))); // jumuk tko judul trus di slug
		$this->load->view('w_m');
	}
	public function upimages(){
		$this->load->library('upload');
		$nmfile1 = "gambar_berita-".date('Ymd')."";
		$config1['upload_path'] = './assets/img/uploads/';
		$config1[ 'allowed_types' ] = 'jpg|png|jpeg';
		$config1[ 'max_size' ] = 1024;
    $config1[ 'file_name' ] = $nmfile1;
		$this->upload->initialize( $config1);
         // $this->upload->do_upload('file');
         $data = $this->upload->data();
				 if($this->upload->do_upload('file')){
					 $gbr1 = $this->upload->data(); // deklarasi upload foto

					 $hasil = $gbr1['file_name'];
					 $data = array(
						 'gambar' => $gbr1['file_name'],
						 'uniq' => $this->input->post('fpos'),
					 );
					 $this->db->insert('gambar_berita',$data);
				 }else{
					 $hasil = $this->upload->display_errors();
				 }


		print_r($hasil);
        exit;
	}

	public function delete(){
		$target_dir = "./assets/img/uploads/";
		$filename = $target_dir.$this->input->post('id');
 unlink($filename);
 echo $this->input->post('id').' deleted';
 exit;
	}
}
