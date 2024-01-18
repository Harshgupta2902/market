<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crypto extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');

    }

	public function index()
	{
		$this->load->view('crypto/home');
	}

	
}
