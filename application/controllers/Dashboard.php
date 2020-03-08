<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		// $this->load->model('m_login');

		// if(!$this->session->userdata('username'))

		// {

		// 	redirect('login');

		// }

	}



	public function index()

	{

		$this->session->set_userdata(array('location' => 'Dashboard','level' => 'Admin','url' => 'dashboard'));

		$data['sess_location'] = $this->session->userdata('location');

		$data['sess_level'] = $this->session->userdata('level');

		$data['sess_url'] = $this->session->userdata('url');

		$data['tampilan'] = 'v_dashboard';



		$this->load->view('layout/master', $data);

	}



	public function simpan_koordinat()

	{

		$latitude = $this->input->post('latitude');

		$longitude = $this->input->post('longitude');
		
		$ket_waktu = date('Y-m-d H:i:s');


		$this->db->from('tbl_sensor');

		$q = $this->db->get();



		if($q->num_rows() > 0){

			$this->db->set('latitude',$latitude);

			$this->db->set('longitude',$longitude);

			$this->db->set('ket_waktu',$ket_waktu);

			$this->db->where('id_sensor',$id_sensor);

			if($this->db->update('tbl_sensor')){

				$result['success'] = "1";

				$result['message'] = "update";

				$result['status'] = "Connected to Login API";
				
			}else{
				$result['success'] = "0";

				$result['message'] = "gagal";

				$result['status'] = "not Connected to Login API";
				
			}


			echo json_encode($result);

		}else{

			$data = array('latitude' => $latitude, 'longitude' => $longitude, 'ket_waktu' => $ket_waktu);

			$this->db->insert('tbl_sensor',$data);

			$result['success'] = "1";

			$result['message'] = "add";

			$result['status'] = "Connected to Login API";



			echo json_encode($result);

		}

	}

	public function simpan_koordinat2($lat,$long,$id_sensor)

	{

		$this->db->from('tbl_sensor');

		$q = $this->db->get();

		$data = array('latitude' => $lat, 'longitude' => $long, 'id_sensor' => $id_sensor);

			if($this->db->insert('tbl_sensor',$data)){

				$result['success'] = "1";

				$result['message'] = "add";

				$result['status'] = "Connected to Login API";
			}else{
				$result['success'] = "0";

				$result['message'] = "error";

				$result['status'] = "Cant save data";
			}

			
		echo json_encode($result);

	}



	public function get_data_sensor($id_sensor)

	{

		$this->db->from('tbl_sensor');

		$q = $this->db->get_where('id_sensor',$id_sensor);

		if($q->num_rows() > 0){

			$row = $q->row();



			echo $row->latitude."/".$row->longitude;

		}

	}

}



?>