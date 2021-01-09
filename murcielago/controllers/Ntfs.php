<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ntfs extends CI_Controller {

  public function index(){
    $data['title'] = 'Kampung Tangguh Pakis Asri';
    $this->load->view('admin/header',$data);
    $this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

  public function daftar_berita(){
    $data['title'] = 'Kampung Tangguh Pakis Asri | Daftar Berita';
    $this->load->view('admin/header',$data);
    $this->load->view('admin/daftar_berita');
		$this->load->view('admin/footer');
  }

  public function tambah_berita(){
    $data['title'] = 'Kampung Tangguh Pakis Asri | Tambah Berita';
    $this->load->view('admin/header',$data);
    $this->load->view('admin/tambah_berita');
		$this->load->view('admin/footer');
  }

  public function upimages(){
    $this->load->library('upload');
    $nmfile1 = "gambar_berita-".slug($this->input->post('token')).'-'.date('Ymd')."";
    $config1['upload_path'] = './assets/img/uploads/';
    $config1[ 'allowed_types' ] = 'jpg|png|jpeg';
    $config1[ 'max_size' ] = 10024;
    $config1[ 'file_name' ] = $nmfile1;
    $this->upload->initialize( $config1);
         // $this->upload->do_upload('file');
         $data = $this->upload->data();
         if($this->upload->do_upload('file')){
           $gbr1 = $this->upload->data(); // deklarasi upload foto
           $config['image_library']='gd2';
            $config['source_image']='./assets/img/uploads/'.$gbr1['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '40%';
            // $config['width']= 942;
            $config['new_image']= './assets/img/uploads/'.$gbr1['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();// deklarasi upload foto
            $gambar=$gbr1['file_name'];
           $hasil = $gbr1['file_name'];
           $data = array(
             'gambar' => $gbr1['file_name'],
             'token_gambar' => slug($this->input->post('token')).'-'.date('Ymd'),
             'created' => date('Y-m-d H:i:s')
           );
           $this->db->insert('gambar_berita',$data);
         }else{
           $hasil = $this->upload->display_errors();
         }


    print_r($hasil);
        exit;
  }

  public function delete_gambar_berita(){
    $this->m_data->hapus_data(array('gambar' => $this->input->post('id')),'gambar_berita');
		$target_dir = "./assets/img/uploads/";
		$filename = $target_dir.$this->input->post('id');
 unlink($filename);
 echo $this->input->post('id').' deleted';
 exit;
	}

  function add_berita(){
    // $user_ion = $this->ion_auth->user()->row();
    $nmfile1 = "thumnails_berita-".slug($this->input->post('judul_berita'))."_".date('YMD')."";
    $config1[ 'upload_path' ] = './assets/img/berita/';
    $config1[ 'allowed_types' ] = 'jpg|png|jpeg';
    $config1[ 'max_size' ] = 1000000;
    $config1[ 'file_name' ] = $nmfile1;
    $this->upload->initialize( $config1);
       if($_FILES['file']['name']){ // jika input type file sudah ada inputan
           if ($this->upload->do_upload('file')){ // upload foto
               $gbr1 = $this->upload->data();
               $config['image_library']='gd2';
                $config['source_image']='./assets/img/berita/'.$gbr1['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                // $config['width']= 942;
                $config['new_image']= './assets/img/berita/'.$gbr1['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();// deklarasi upload foto
                $gambar=$gbr1['file_name'];
               $data = array(
                 'judul_berita' => $this->input->post('judul_berita'),
                 'id_kategori' => '1',
                 'isi_berita' => $this->input->post('isi_berita'),
                 'slug' => slug($this->input->post('judul_berita')),
                 'id_user' => '1',
                 'created' => date('Y-m-d H:i:s'),
                 'gambar' => $gambar,
                 'token_gambar' => slug($this->input->post('judul_berita')).'-'.date('Ymd')
               );
               $this->db->insert('berita',$data);
               $this->session->set_flashdata('alert','sukses');

               redirect('ntfs/tambah_berita');

           }else{
             $this->session->set_flashdata('alert',$this->upload->display_errors());
             redirect('ntfs/tambah_berita');
           // $status = "error";
           // $msg = $this->upload->display_errors();
           }
       }else{
         $this->session->set_flashdata('alert','kosong');
         redirect('ntfs/tambah_berita');


         // $status = "error";
         // $msg = "Bidang file upload tugas kosong !";
       }
    // $data = array(
    //   'judul_berita' => $this->input->post('judul_berita'),
    //   'id_kategori' => '1',
    //   'isi_berita' => $this->input->post('isi_berita'),
    //   'slug' => slug($this->input->post('judul_berita')),
    //   'id_user' => '1',
    //   'created' => date('Y-m-d H:i:s'),
    //   'token_gambar' => slug($this->input->post('judul_berita')).'-'.date('Ymd')
    // );
    // $this->db->insert('berita',$data);
    // $this->session->set_flashdata('alert','sukses');
    //
    // redirect('ntfs/tambah_berita');

  }

}
