<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ifsc extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ViewsModel');

    }

	public function home()
	{
		$this->ViewsModel->updatePageViews('Ifsc');
		$this->load->view('ifsc/ifsc');
	}



    public function search() {
        $ifsc = $this->input->get('ifsc');

        if ($ifsc === null) {
            echo "IFSC code not provided!";
            return;
        }
		$ifsc = $this->db->where('Ifsc', $ifsc)->get('banks')->result_array();
        $data = [
			'ifsc' => $ifsc[0],

		];
		$this->ViewsModel->updatePageViews('search');
		$this->load->view('ifsc/ifsc',$data);
    }


    private function getUniqueBankNames() {
        $this->db->select('Bank');
        $this->db->distinct();
        $this->db->order_by('Bank', 'ASC');
        $query = $this->db->get('banks');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $bankNames = array_column($result, 'Bank');

            return $bankNames;
        } else {
            return array();
        }
    }

    private function getUniqueStates() {
        $this->db->select('State');
        $this->db->distinct();
        $this->db->order_by('State', 'ASC');
        $query = $this->db->get('banks');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $bankNames = array_column($result, 'State');

            return $bankNames;
        } else {
            return array();
        }
    }


	
}
