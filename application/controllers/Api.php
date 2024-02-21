<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));

    }


    public function insertIpo() {
        $response = file_get_contents('http://ixorainfotech.in/api/ipo');
        $ipos = json_decode($response, true);
        $this->db->truncate('ipos');
        foreach ($ipos as $ipo) {
            $data = array(
                'companyName' => $ipo['companyName'],
                'date' => $ipo['date'],
                'size' => str_replace('â‚¹', '₹', $ipo['size']),
                'price' => str_replace('â‚¹', '₹', $ipo['price']),
                'status' => $ipo['status'],
                'link' => $ipo['link']
            );
            $this->db->insert('ipos', $data);
        }

        $query = $this->db->get('ipos');
        $result = $query->result_array();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }


    public function insertBuyback() {
        $response = file_get_contents('http://ixorainfotech.in/api/buyback');
        $buyback = json_decode($response, true);
        $this->db->truncate('buyback');
        foreach ($buyback as $buyback) {
            $data = array(
                'company_name' => $buyback['Column_1'],
                'record_date' => $buyback['Column_2'],
                'open' => $buyback['Column_3'],
                'link' => $buyback['link'] ?? null,
                'close' => $buyback['Column_4'],
                'price' => $buyback['Column_5']
            );
            // print_r($data);
            $this->db->insert('buyback', $data);
        }

        $query = $this->db->get('buyback');
        $result = $query->result_array();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    public function insertForms() {
        $response = file_get_contents('http://ixorainfotech.in/api/forms');
        $forms = json_decode($response, true);
        $this->db->truncate('forms');
        foreach ($forms as $form) {
            $data = array(
                'name' => $form[0],
                'link' => $form[1],
                'date' => $form[2],
                'date_link' => $form[3],
                'bse' => $form[4],
                'bse_link' => $form[5],
                'nse' => $form[6],
                'nse_link' => $form[7]
            );
            // print_r($data);
            $this->db->insert('forms', $data);
        }

        $query = $this->db->get('forms');
        $result = $query->result_array();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    public function insertGmp() {
        $response = file_get_contents('http://ixorainfotech.in/api/gmp');
        $gmp = json_decode($response, true);
        
        $responseMessage = array();
    
        if (!empty($gmp['tableData'])) {
            $this->db->truncate('gmp');
            foreach ($gmp['tableData'] as $rowData) {
                $insertData = array(
                    'ipo_name' => $rowData[0],
                    'link' => $rowData[1],
                    'date' => $rowData[2],
                    'type' => $rowData[3],
                    'ipo_gmp' => $rowData[4],
                    'price' => $rowData[5],
                    'gain' => $rowData[6],
                    'kostak' => $rowData[7],
                    'link' => $rowData[8]
                );
                $this->db->insert('gmp', $insertData);
            }
            
            $responseMessage[] = 'Data inserted into gmp table';
        } else {
            $responseMessage[] = 'No data to insert into gmp table';
        }
    
    
        if (!empty($gmp['additionalList'])) {
            $this->db->truncate('old_gmp');
            foreach ($gmp['additionalList'] as $additionalList) {
                $insertData = array(
                    'ipo_name' => $additionalList[0],
                    'price' => $additionalList[2],
                    'ipo_gmp' => $additionalList[3],
                    'listed' => $additionalList[4],
                    'link' => $additionalList[1]
                );
                $this->db->insert('old_gmp', $insertData);
            }
            
            $responseMessage[] = 'Data inserted into old_gmp table';
        } else {
            $responseMessage[] = 'No data to insert into old_gmp table';
        }
    
        // Output JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('message' => $responseMessage)));
    }


    public function insertSme() {
        $response = file_get_contents('http://ixorainfotech.in/api/sme');
        $sme = json_decode($response, true);
        $this->db->truncate('sme');
        foreach ($sme as $sme) {
            $data = array(
                'name' => $sme['Column_1'],
                'Dates' => $sme['Column_2'],
                'Price' => $sme['Column_3'],
                'Platform' => $sme['Column_4'],
                'link' => $sme['link']
            );
            // print_r($data);
            $this->db->insert('sme', $data);
        }

        $query = $this->db->get('sme');
        $result = $query->result_array();

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }
    

    public function insertSubscription() {
        $response = file_get_contents('http://ixorainfotech.in/api/subs');
        $subs = json_decode($response, true);
        
        $responseMessage = array();
    
        if (!empty($subs['nse'])) {
            $this->db->truncate('ipo_subscription_data');
            foreach ($subs['nse'] as $nse) {
                $insertData = array(
                    'company_name' => $nse['Company Name'],
                    'close_date' => $nse["Close Date"],
                    'size_rs_cr' => $nse["Size (Rs Cr)"],
                    'qib_x' => $nse["QIB (x)"],
                    'snii_x' => $nse["sNII (x)"],
                    'bnii_x' => $nse["bNII (x)"],
                    'nii_x' => $nse["NII (x)"],
                    'retail_x' => $nse["Retail (x)"],
                    'employee_x' => $nse["Employee (x)"],
                    'others_x' => $nse["Others (x)"],
                    'total_x' => $nse["Total (x)"],
                    'applications' => $nse["Applications"]
                );
                $this->db->insert('ipo_subscription_data', $insertData);
            }
            
            $responseMessage[] = 'Data inserted into ipo_subscription_data table';
        } else {
            $responseMessage[] = 'No data to insert into ipo_subscription_data table';
        }
    
    
        if (!empty($subs['sme'])) {
            $this->db->truncate('sme_subscription_data');
            foreach ($subs['sme'] as $sme) {
                $insertData = array(
                    'company_name' => $sme['Company Name'],
                    'open_date' => $sme['Open Date'],
                    'close_date' => $sme['Close Date'],
                    'size_rs_cr' => $sme['Size (Rs Cr)'],
                    'qib_x' => $sme['QIB (x)'],
                    'nii_x' => $sme['NII (x)'],
                    'retail_x' => $sme['Retail (x)'],
                    'total_x' => $sme['Total (x)'],
                    'applications' => $sme['Applications'],
                );
                $this->db->insert('sme_subscription_data', $insertData);
            }
            
            $responseMessage[] = 'Data inserted into sme_subscription_data table';
        } else {
            $responseMessage[] = 'No data to insert into sme_subscription_data table';
        }
    
        // Output JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('message' => $responseMessage)));
    }


    



    
}
