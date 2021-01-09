<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

   function api_jatim(){

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://indonesia-covid-19.mathdro.id/api/provinsi",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      $response =  "cURL Error #:" . $err;
    } else {
      $response;
    }
    return json_decode($response,TRUE);


  }

  private function api_indo(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://indonesia-covid-19.mathdro.id/api",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      $response =  "cURL Error #:" . $err;
    } else {
      $response;
    }
    return json_decode($response,TRUE);

  }

  public function index(){
    $data['title'] = 'Kampung Tangguh Semeru - Perumahan Pakis Asri';
    $data['indonesia'] = $this->api_indo();
    $data['data_prov'] = $this->api_jatim();
    $data['berita'] = $this->m_data->ordernya('id_berita','DESC','berita')->result();
    // $data['berita'] = $this->m_data->semua('berita')->result();

    $this->load->view('users/header',$data);
    $this->load->view('users/home');
		$this->load->view('users/footer');
	}

  public function post($slug){
    $data['berita'] = $this->m_data->where('berita',array('slug' => $slug))->row();
    $data['title'] = 'Kampung Tangguh Semeru - Perumahan Pakis Asri | '.$data['berita']->judul_berita.'';
    $data['slugx'] = $slug;
    $this->load->view('users/header',$data);
    $this->load->view('users/post');
		$this->load->view('users/footer');
  }

  public function blog(){
    $this->load->library('pagination');
    $data['title'] = 'Kampung Tangguh Semeru - Perumahan Pakis Asri | Berita';
    //konfigurasi pagination
    $config['base_url'] = base_url('p/blog'); //site url
    $config['total_rows'] = $this->db->count_all('berita'); //total row
    $config['per_page'] = 6;  //show record per halaman
    $config["uri_segment"] = 3;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);

    // Membuat Style pagination untuk BootStrap v4
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<ul class="pagination float-right">';
    $config['full_tag_close']   = '</ul>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model.
    $data['data'] = $this->m_data->list_berita_page($config["per_page"], $data['page']);
    $data['berita'] = $this->m_data->ordernya_limit('id_berita','DESC','berita','5')->result();

    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('users/header',$data);
    $this->load->view('users/blog');
		$this->load->view('users/footer');

  }

}
