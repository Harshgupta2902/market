<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation'); 
        $this->load->model('AdminModel');

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
        if (!$this->session->userdata('name')) {
            redirect('admin/login');
        }
        $this->load->view('admin/dashboard');
    }

    public function addnavbarform() {
        if (!$this->session->userdata('name')) {
            redirect('admin/login');
        }


        if ($this->input->post()) {
            // Form validation rules can be added here
            $this->form_validation->set_rules('subnav', 'Page Name', 'required');
            $this->form_validation->set_rules('url', 'Page Route', 'required');
            $this->form_validation->set_rules('nav', 'Main Nav', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'subnav' => $this->input->post('subnav'),
                    'url' => $this->input->post('url'),
                    'nav' => $this->input->post('nav'),
                    'status' => 1
                );

                $insert_id = $this->AdminModel->insert_nav_data($data);

                if ($insert_id) {
                    redirect('allnavs');
                } else {
                    echo 'Error inserting data into the database.';
                }
            }
        }

        $this->load->view('admin/addnav');
    }

    public function allnavs() {
        if (!$this->session->userdata('name')) {
            redirect('login');
        }
        $data = $this->AdminModel->get_nav_data();
        $data['data'] = $data;
        $this->load->view('admin/allnav', $data);
    }

   
    public function addseodetails() {
        if (!$this->session->userdata('name')) {
            redirect('admin/login');
        }

        if ($this->input->post()) {

            $this->form_validation->set_rules('seo_title', 'SEO Title', 'required');
            $this->form_validation->set_rules('seo_desc', 'SEO Description', 'required');
            $this->form_validation->set_rules('seo_keys', 'SEO Keywords', 'required');
            $this->form_validation->set_rules('seo_canonicals', 'SEO Canonicals', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $canonicals = $this->input->post('seo_canonicals');
                $seoData = array(
                    'seo_title' => $this->input->post('seo_title'),
                    'seo_desc' => $this->input->post('seo_desc'),
                    'seo_keys' => $this->input->post('seo_keys'),
                    'seo_canonicals' => base_url($canonicals)
                );

                $insert_id = $this->db->insert('seo_details', $seoData);

                if ($insert_id) {
                    redirect('seolist');
                } else {
                    echo 'Error inserting data into the database.';
                }
            }
        }
        $data['page_url'] =  $this->db->get('nav')->result_array();
        $this->load->view('admin/addseo',$data);
    }
	
    public function seolist() {
        if (!$this->session->userdata('name')) {
            redirect('login');
        }
        $data = $this->AdminModel->get_seo_data();
        $data['seo_details'] = $data;
        $this->load->view('admin/seolist', $data);
    }
    
    public function pageview() {
        if (!$this->session->userdata('name')) {
            redirect('login');
        }
        $data = $this->AdminModel->get_page_view_data();
        $data['page'] = $data;
        $this->load->view('admin/pageview', $data);
    }

    public function ipolist() {
        if (!$this->session->userdata('name')) {
            redirect('login');
        }
        $data = $this->AdminModel->get_ipo_data();
        $this->load->view('admin/ipodata', $data);
    }

}
