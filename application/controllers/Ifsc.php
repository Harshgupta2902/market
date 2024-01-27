<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ifsc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->model('ViewsModel');
        $this->nav = $this->ViewsModel->nav();

    }




	public function home()
	{
		$this->ViewsModel->updatePageViews('Ifsc');
        $metaData['metaData'] = $this->ViewsModel->getSeoDetails('Ifsc'); 
        $metaData['nav'] = $this->nav; 
        $this->load->view('ifsc/ifsc', $metaData);
	}



    public function search() {
        $ifsc = $this->input->get('ifsc');
        $data['metaData'] = $this->ViewsModel->getSeoDetails('Ifsc'); 
        $data['nav'] = $this->nav; 


        if ($ifsc === null) {
            echo "IFSC code not provided!";
            return;
        }

        $data['ifsc'] = $this->db->where('Ifsc', $ifsc)->get('banks')->row_array(0);
        if (!empty($data['ifsc'])) {
            $this->ViewsModel->updatePageViews('search');
            $this->load->view('ifsc/ifsc', $data);
        } else {
            echo "IFSC code not found!";
        }
    }


    // private function getUniqueValues($field) {
    //     $this->db->select($field);
    //     $this->db->distinct();
    //     $this->db->order_by($field, 'ASC');
    //     $query = $this->db->get('banks');

    //     if ($query->num_rows() > 0) {
    //         $result = $query->result_array();
    //         $values = array_column($result, $field);
    //         return $values;
    //     } else {
    //         return [];
    //     }
    // }

    // private function getUniqueBankNames() {
    //     return $this->getUniqueValues('Bank');
    // }

    // private function getUniqueStates() {
    //     return $this->getUniqueValues('State');
    // }



	
}
