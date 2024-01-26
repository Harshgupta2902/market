<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }

	public function insert_nav_data($data) {
        $this->db->insert('nav', $data);
        return $this->db->insert_id();
    }

	public function get_nav_data() {
        return $this->db->get('nav')->result_array();
    }

    public function get_seo_data() {
        return $this->db->get('seo_details')->result_array();
    }

    public function get_ipo_data() {
        $data['main'] = $this->db->get('recents')->result_array();
        $data['upcoming'] = $this->db->get('ipos')->result_array();
        $data['gmp'] = $this->db->get('gmp')->result_array();
        $data['old_gmp'] = $this->db->get('old_gmp')->result_array();
        $data['sme'] = $this->db->get('sme')->result_array();
        $data['ipo_subs'] = $this->db->get('ipo_subscription_data')->result_array();
        $data['sme_subs'] = $this->db->get('sme_subscription_data')->result_array();
        $data['forms'] = $this->db->get('forms')->result_array();
        $data['buyback'] = $this->db->get('buyback')->result_array();

        return $data;
    }


}

