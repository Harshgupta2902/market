<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipo extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');

    }

	public function index()
	{
	$upcoming = $this->db->where('Type', 'Upcoming')->get('recents')->result_array();
	$sme = $this->db->where('Type', 'SME')->get('recents')->result_array();

	$data = [
		'upcoming' => $upcoming,
		'sme' => $sme
	];
	$this->load->view('home', $data);
	}

	public function error()
	{
		$this->load->view('errors/html/error_404');
	}
}
