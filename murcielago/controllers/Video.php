<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function index(){
    $data['title'] = 'Kampung Tangguh Semeru - Perumahan Pakis Asri | Video Tangguh';
    $this->load->view('users/header',$data);
    $this->load->view('users/video');
    $this->load->view('users/footer');
	}

}
