<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		
	}

	public function index()
	{
		$this->session->set_userdata(array('location' => 'Laman Data Koordinat','level' => 'Admin','url' => 'data/index'));
		$data['sess_location'] = $this->session->userdata('location');
		$data['sess_level'] = $this->session->userdata('level');
		$data['sess_url'] = $this->session->userdata('url');
		$lokasi = $this->session->userdata('location');
		$data['sensor'] = $this->m_data->get_data_table();
		$data['tampilan'] = 'v_tabel';

		$this->load->view('layout/master', $data);
	}

}

?>