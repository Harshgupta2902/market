<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crypto extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ViewsModel');

    }

	public function index()
	{
		$this->ViewsModel->updatePageViews('crypto');
		$this->load->view('crypto/home');
	}

	
}
