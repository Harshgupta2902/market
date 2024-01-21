<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pincode extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');

    }

	public function home()
	{
        // $banks = $this->getUniqueBankNames();
        // $state = $this->getUniqueStates();
        // $data = [
		// 	'banks' => $banks,
        //     'state' => $state
		// ];
		// $this->load->view('ifsc/ifsc', $data);
		$this->load->view('pincode/pincode');
	}


    // public function search() {
    //     $ifsc = $this->input->get('ifsc');
    //     $bank = $this->input->get('bank');
    //     $state = $this->input->get('state');
    
    //     // Validate input
    //     if (empty($ifsc) && ($bank === 'Select Bank' || $state === 'Select State')) {
    //         echo "IFSC code or dropdowns not provided!";
    //         return;
    //     }
    
    //     // Build the search query based on the provided parameters
    //     $this->db->select('*')->from('banks');
        
    //     if (!empty($ifsc)) {
    //         $this->db->where('Ifsc', $ifsc);
    //     }
    
    //     if ($bank !== 'Select Bank') {
    //         $this->db->where('Bank', $bank);
    //     }
    
    //     if ($state !== 'Select State') {
    //         $this->db->where('State', $state);
    //     }
    
    //     $result = $this->db->get()->result_array();
    
    //     // Pass the result to the view
    //     $banks = $this->getUniqueBankNames();
    //     $states = $this->getUniqueStates();
    //     $data = [
    //         'ifsc' => $result,
    //         'banks' => $banks,
    //         'state' => $states
    //     ];
    
    //     $this->load->view('ifsc/ifsc', $data);
    // }
    


    public function search() {
        $pincode = $this->input->get('pincode');

        if ($pincode === null) {
            echo "Pincode not provided!";
            return;
        }
		$pincode = $this->db->where('PinCode', $pincode)->get('pincode_details1')->result_array();
        // $banks = $this->getUniqueBankNames();
        // $state = $this->getUniqueStates();
        $data = [
			'pincode' => $pincode,
			// 'banks' => $banks,
            // 'state' => $state

		];
        // echo "<pre>";
        // print_r($data);
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
        
        // echo "<pre>";
        // print_r($data);
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
