<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pincode extends CI_Controller {

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
		$this->ViewsModel->updatePageViews('Pincode');
		$this->load->view('pincode/pincode');
	}


    public function search() {
        $pincode = $this->input->get('pincode');

        if ($pincode === null) {
            echo "Pincode not provided!";
            return;
        }
		$pincode = $this->db->where('PinCode', $pincode)->get('pincode_details1')->result_array();
        $data = [
			'pincode' => $pincode,

		];
		$this->ViewsModel->updatePageViews('find');
		$this->load->view('pincode/pincode',$data);
    }

    public function details()
    {
        $pinCode = $this->input->get('pinCode');
        $postOffice = urldecode($this->input->get('postOffice'));

        $details = $this->db->like('PinCode', $pinCode)
                           ->like('PostOffice', urldecode($postOffice))
                           ->get('pincode_details1')
                           ->result_array();
    
        $data = ['details' => $details[0]];
		$this->ViewsModel->updatePageViews('details');
        $this->load->view('pincode/pincode', $data);
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
