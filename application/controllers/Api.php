<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));

    }

    public function generate_slug_from_url($url) {
        $path = parse_url($url, PHP_URL_PATH);
        $path = trim($path, '/');
        $parts = explode('/', $path);
        $last_part = end($parts);
        return $last_part;
    }

    public function insertIpo() {
        $response = file_get_contents('http://ixorainfotech.in/api/ipo');
        $ipos = json_decode($response, true);
        $this->db->truncate('ipos');
        foreach ($ipos as $ipo) {
            $data = array(
                'company_name' => $ipo['companyName'],
                'date' => $ipo['date'],
                'size' => str_replace('â‚¹', '₹', $ipo['size']),
                'price' => str_replace('â‚¹', '₹', $ipo['price']),
                'status' => $ipo['status'],
                'link' => $ipo['link'],
                'slug' => $this->generate_slug_from_url($ipo['link'])
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
                'date' => $buyback['Column_2'],
                'open' => $buyback['Column_3'],
                'link' => $buyback['link'] ?? null,
                'close' => $buyback['Column_4'],
                'price' => $buyback['Column_5'],
                'slug' => $this->generate_slug_from_url($buyback['link'])
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
                'company_name' => $form[0],
                'link' => $form[1],
                'date' => $form[2],
                'date_link' => $form[3],
                'bse' => $form[4],
                'bse_link' => $form[5],
                'nse' => $form[6],
                'nse_link' => $form[7],
                'slug' => $this->generate_slug_from_url($form[1])

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
                    'company_name' => $rowData[0],
                    'link' => $rowData[1],
                    'date' => $rowData[2],
                    'type' => $rowData[3],
                    'ipo_gmp' => $rowData[4],
                    'price' => $rowData[5],
                    'gain' => $rowData[6],
                    'kostak' => $rowData[7],
                    'subject' => $rowData[8],
                    'slug' => $this->generate_slug_from_url($rowData[1])

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
                    'company_name' => $additionalList[0],
                    'price' => $additionalList[2],
                    'ipo_gmp' => $additionalList[3],
                    'listed' => $additionalList[4],
                    'link' => $additionalList[1],
                    'slug' => $this->generate_slug_from_url($additionalList[1])

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
                'company_name' => $sme['Column_1'],
                'date' => $sme['Column_2'],
                'price' => $sme['Column_3'],
                'Platform' => $sme['Column_4'],
                'link' => $sme['link'],
                'slug' => $this->generate_slug_from_url($sme['link'])

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
                    'close' => $nse["Close Date"],
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
                    'open' => $sme['Open Date'],
                    'close' => $sme['Close Date'],
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

    public function insertRecents() {
        $response = file_get_contents('http://ixorainfotech.in/api/main');
        $main = json_decode($response, true);
        $this->db->truncate('recents'); 
        
        $responseMessage = array();
    
        if (!empty($main['table1Data'])) {
            foreach ($main['table1Data'] as $table1Data) {
                $insertData = array(
                    'Type' => $table1Data['Type'],
                    'company_name' => $table1Data["Company"],
                    'link' => $table1Data["link"],
                    'open' => $table1Data["Open"],
                    'close' => $table1Data["Close"],
                    'slug' => $this->generate_slug_from_url($table1Data["link"])

                );
                $this->db->insert('recents', $insertData);
            }
            
            $responseMessage[] = 'table1Data inserted into recents table';
        } else {
            $responseMessage[] = 'No table1Data to insert into recents table';
        }
    
    
        if (!empty($main['table2Data'])) {
            foreach ($main['table2Data'] as $table2Data) {
                $insertData = array(
                    'Type' => $table2Data['Type'],
                    'company_name' => $table2Data["Company"],
                    'link' => $table2Data["link"],
                    'open' => $table2Data["Open"],
                    'close' => $table2Data["Close"],
                    'slug' => $this->generate_slug_from_url($table2Data["link"])

                );
                $this->db->insert('recents', $insertData);
            }
            
            $responseMessage[] = 'table2Data inserted into recents table';
        } else {
            $responseMessage[] = 'No table2Data to insert into recents table';
        }
    
        // Output JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('message' => $responseMessage)));
    }

    
    public function insertDetails() {
        $this->db->truncate('details');
        $query = "
            SELECT link, 'buyback' AS source_table FROM buyback
            UNION ALL
            SELECT link, 'forms' AS source_table FROM forms
            UNION ALL
            SELECT link, 'ipos' AS source_table FROM ipos
            UNION ALL
            SELECT link, 'recents' AS source_table FROM recents
            UNION ALL
            SELECT link, 'sme' AS source_table FROM sme
            UNION ALL
            SELECT link, 'gmp' AS source_table FROM sme
            UNION ALL
            SELECT link, 'old_gmp' AS source_table FROM old_gmp  
           
        ";

        $data = $this->db->query($query)->result_array();
        foreach ($data as $row) {
            $link = $row['link'];
            $table = $row['source_table'];
            
            $response = file_get_contents("http://ixorainfotech.in/api/getDetails?link=$link&source_table=$table");
            $main = json_decode($response, true);
            $finalDataToInsert =  array(
                'source_table' => $table,
                'slug' => $main['slug'],
                'link' => $link,
                'tables' => json_encode($main['tables']), // Convert array to JSON string
                'lists' => json_encode($main['ulAfterHeadingsResult']), // Convert array to JSON string
            );

            $this->db->insert('details',$finalDataToInsert);

            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('message' => 'Data filled for the url', 'data' => $main)));

        }
        
    }
}
