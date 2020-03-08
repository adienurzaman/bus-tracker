<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_model {
	function __construct()
	{
		parent::__construct();
		
	}

	public function get_data_table()
	{
		$this->db->from('tbl_sensor');
		$this->db->order_by('id_sensor','desc');
		$query = $this->db->get();

		return $query;
	}

}

?>