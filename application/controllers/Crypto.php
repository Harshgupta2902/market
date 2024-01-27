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
        $this->nav = $this->ViewsModel->nav();

    }

	public function index(){
        $data['metaData'] = $this->ViewsModel->getSeoDetails('Crypto');
        $data['nav'] = $this->nav;
		$this->load->view('crypto/home', $data);
	}

    public function symbols(){
        $data['metaData'] = $this->ViewsModel->getSeoDetails('symbols');
        $data['symbol'] = $this->input->get('tvwidgetsymbol');
        $data['nav'] = $this->nav;
		$this->load->view('crypto/details', $data);
    }

    public function screener(){
        $data['metaData'] = $this->ViewsModel->getSeoDetails('screener');
        $data['nav'] = $this->nav;
		$this->load->view('crypto/screener', $data);
    }
	
}
