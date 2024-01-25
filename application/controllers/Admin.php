<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session'); // Load the session library

    }

	public function login()
	{
		$this->load->view('admin/login');
	}


    public function process_login() {
        $staticUsername = 'harsh';
        $staticPassword = '123456';
        $name = 'Harsh Gupta';

        // Retrieve user input
        $inputUsername = $this->input->post('email');
        $inputPassword = $this->input->post('password');

        if ($inputUsername == $staticUsername && $inputPassword == $staticPassword) {
            $this->session->set_userdata('name', $name);
            redirect('dashboard'); 
        } else {
            $data['error'] = "Invalid username or password";
            $this->load->view('login', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function dashboard() {
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
        $this->load->view('admin/dashboard');
    }

    public function addnavbarform() {
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
        $this->load->view('admin/addnav');
    }

    public function allnavs() {
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
        $this->load->view('admin/allnav');
    }

	
}
