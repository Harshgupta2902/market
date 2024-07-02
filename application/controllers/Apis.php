<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ViewsModel');

        // $allowedOrigins = [
        //     'http://localhost',
        //     'http://node.onlineinfotech.net',
        //     'https://node.onlineinfotech.net'
        // ];

        // if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
        //     header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        //     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        //     header("Access-Control-Allow-Headers: Content-Type, Authorization");
        //     header("Access-Control-Allow-Credentials: true");
        // }

        // // Handle preflight requests
        // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        //     header("HTTP/1.1 200 OK");
        //     exit;
        // }
        // // Enable CORS
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type");

    }
    public function getMetaData() {
        $route = $this->input->get('route');
        if (empty($route)) {
            $metaData['error'] = "No route found";
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($metaData));
        }

            $query = $this->db->get_where('seo_details', array('seo_page' => $route));
        if ($query->num_rows() > 0) {
            $metaData['metaData'] = $query->row();
        } else {
            $metaData['error'] = "No data found for the specified route";
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($metaData));
    }
    
    public function getNav()
    {
        $nav['message'] = "success";
        $nav['result'] = $this->ViewsModel->nav();
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($nav));
    }

    public function homePage()
    {
        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('Ipo');
        $data['upcomingData'] = $this->ViewsModel->getRecentsByType('Upcoming');
        $data['smeData'] = $this->ViewsModel->getRecentsByType('SME');
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function gmpData()
    {

        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('greyMarketIpo');
        $data['gmp'] = $this->ViewsModel->get('gmp');
        $data['oldGmp'] = $this->ViewsModel->get('old_gmp');
        $data['faq'] = $this->ViewsModel->getWhere('faq', 'type', 'GMP');
        $data['faqTitle'] = "Grey Market Premium FAQ's";
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }


    public function smeData()
    {
        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('smeMarketIpo');
        $data['sme'] = $this->ViewsModel->get('sme');
        $data['faq'] = $this->ViewsModel->getWhere('faq', 'type', 'SME');
        $data['faqTitle'] = "SME FAQ's";
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function subscriptionData()
    {
        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('subscriptionStatus');
        $data['ipo_subscription_data'] = $this->ViewsModel->get('ipo_subscription_data');
        $data['sme_subscription_data'] = $this->ViewsModel->get('sme_subscription_data');
        $data['faq'] = $this->ViewsModel->getWhere('faq', 'type', 'Status');
        $data['faqTitle'] = "IPO Subscription FAQ's";
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function formsData()
    {
        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('ipoForms');
        $data['forms'] = $this->ViewsModel->get('forms');
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function buyBackData()
    {
        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('sharesBuyBack');
        $data['buyback'] = $this->ViewsModel->get('buyback');
        $data['faq'] = $this->ViewsModel->getWhere('faq', 'type', 'Buyback');
        $data['faqTitle'] = "IPO Buy Back FAQ's";
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function upcomingIpo()
    {
        $data['message'] = "success";
        $data['metaData'] = $this->ViewsModel->getSeoDetails('upcomingIpo');
        $data['upcomingIpos'] = $this->ViewsModel->get('ipos');
        $data['faq'] = $this->ViewsModel->getWhere('faq', 'type', 'upcoming');
        $data['faqTitle'] = "FAQ's about IPO's";
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function ipoDetails()
    {
        $slug = $this->input->get('slug');
        $slug = $this->db->escape_str($slug);
        if (!$slug) {
            $data = [
                'message' => "failed",
                'result' => "No slug exists"
            ];

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }

        $query = $this->db->query("SELECT * FROM details WHERE slug = ?", array($slug));
        $response = $query->row(); 

        if (!$response) {
            $data = [
                'message' => "failed",
                'result' => "No Result Found"
            ];

            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }

        $tableName = $response->source_table;
        $link = $response->link;
        $resultRow = null;

        switch ($tableName) {
            case "buyback":
                $joinedData = $this->db->query(
                    "SELECT details.slug, details.tables, details.lists, buyback.company_name, buyback.open, buyback.close 
                    FROM details 
                    JOIN buyback ON details.link = buyback.link 
                    WHERE details.link = ?", 
                    array($link)
                );
                $resultRow = $joinedData->row();
                if ($resultRow) {
                    $resultRow->date = $resultRow->open . ' - ' . $resultRow->close;
                    unset($resultRow->open, $resultRow->close);
                }
                break;

            case "forms":
            case "gmp":
            case "ipos":
            case "old_gmp":
            case "sme":
                $joinedData = $this->db->query(
                    "SELECT details.slug, details.tables, details.lists, $tableName.company_name, $tableName.date 
                    FROM details 
                    JOIN $tableName ON details.link = $tableName.link 
                    WHERE details.link = ?", 
                    array($link)
                );
                $resultRow = $joinedData->row();
                break;

            case "recents":
                $joinedData = $this->db->query(
                    "SELECT details.slug, details.tables, details.lists, recents.company_name, recents.open, recents.close 
                    FROM details 
                    JOIN recents ON details.link = recents.link 
                    WHERE details.link = ?", 
                    array($link)
                );
                $resultRow = $joinedData->row();
                if ($resultRow) {
                    $resultRow->date = $resultRow->open . ' - ' . $resultRow->close;
                    unset($resultRow->open, $resultRow->close);
                }
                break;

            default:
                $data = [
                    'message' => "failed",
                    'result' => "Invalid table name"
                ];

                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
        }

        if ($resultRow) {
            $data = [
                'message' => "success",
                'result' => $resultRow
            ];
        } else {
            $data = [
                'message' => "failed",
                'result' => "No Result Found"
            ];
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }


    public function getBlogs() {
        $query = $this->db
            ->select('id, title, created_at, category, image, slug, alt_keyword, description, author')
            ->where('published', 1)
            ->order_by('views', 'DESC')
            ->get('blogs')
            ->result_array();
    
        if (!empty($query)) {
            $data['latestblogs'] = $query[0];
            $data['otherblogs'] = [];
            for ($i = 1; $i < count($query); $i++) {
                if ($query[$i]['id'] !== $data['latestblogs']['id']) {
                    $data['otherblogs'][] = $query[$i];
                }
            }
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        }
    }


    public function getBlogDetails($category,$slug){

            $data['data'] = $this->db->where('slug', $slug)->get('blogs')->row(); 
            if ($data['data']) {
                $this->db->set('views', 'views+1', FALSE)->where('slug', $slug)->update('blogs');
            }
              return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function getIndices() {
        $url = "https://analyze.api.tickertape.in/homepage/indices";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === FALSE) {
            $error = curl_error($ch);
            curl_close($ch);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('error' => $error)));
            return;
        }
        curl_close($ch);
        $data = json_decode($response, true);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function getTrendData() {
        $type = $this->input->get('type');
        $dataCount = $this->input->get('dataCount', TRUE) ?: 5;
        $offset = $this->input->get('offset', TRUE) ?: 0;

        $base_url = "https://analyze.api.tickertape.in/homepage/stocks?universe=Market&type=";

        if (in_array($type, ['gainers', 'losers', 'active', 'approachingHigh', 'approachingLow'])) {
            $url = $base_url . $type . "&dataCount=" . $dataCount . "&offset=" . $offset;
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('error' => 'Invalid type parameter')));
            return;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === FALSE) {
            $error = curl_error($ch);
            curl_close($ch);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('error' => $error)));
            return;
        }
        curl_close($ch);
        $data = json_decode($response, true);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function getAdditionalIpos(){
        $data['upcomingData'] = $this->db->select('company_name, slug, Open AS open, Close AS close')->where('Type', "Upcoming")->limit(6)->get('recents')->result_array();
        $data['smeData'] = $this->db->select('company_name, slug, Open AS open, Close AS close')->where('Type', "SME")->limit(6)->get('recents')->result_array();
        $data['gmpData'] = $this->db->select('company_name, date, slug')->limit(6)->get('gmp')->result_array();
        $data['buyBackData'] = $this->db->select('company_name, open,close, slug')->limit(6)->get('buyback')->result_array();

        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function checkPan(){
        $pan = $this->input->get('pan');
        $url = "https://blog.mysiponline.com/pan.php?pan=". $pan;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === FALSE) {
            $error = curl_error($ch);
            curl_close($ch);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('error' => $error)));
            return;
        }
        curl_close($ch);
        $data = json_decode($response, true);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        $pan=array(
            'pan' => $pan
        );
        $this->db->insert('pan',$pan);
        
    }

    public function getMfScreenerData(){
        $reponse = $this->db->get('mf_screener')->result_array();
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($reponse));
    }


    public function getMfHomePage() {
        $mf = $this->input->get('mf');
        if (empty($mf)) {
            $data = null;
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        } else {
            $info = $this->getMfInfo($mf);
            $summary = $this->getMfSummary($mf);
            $fundManager = $this->getMfFundManagers($mf);
    
            // Check for errors
            if (isset($info['error']) || isset($summary['error']) || isset($fundManager['error'])) {
                $data = array(
                    'info' => isset($info['error']) ? $info['error'] : $info,
                    'summary' => isset($summary['error']) ? $summary['error'] : $summary,
                    'fundmanager' => isset($fundManager['error']) ? $fundManager['error'] : $fundManager,
                );
            } else {
                $data = array(
                    'info' => $info['data'],
                    'summary' => $summary['data'],
                    'fundmanager' => $fundManager['data']
                );
            }
    
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        }
    }
    
    private function getMfInfo($mf) {
        return $this->fetchData("https://api.tickertape.in/mutualfunds/$mf/info");
    }
    
    private function getMfSummary($mf) {
        return $this->fetchData("https://api.tickertape.in/mutualfunds/$mf/summary");
    }
    
    private function getMfFundManagers($mf) {
        return $this->fetchData("https://api.tickertape.in/mutualfunds/$mf/fundmanagers");
    }
    
    private function fetchData($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === FALSE) {
            $error = curl_error($ch);
            curl_close($ch);
            return array('error' => $error);
        }
        curl_close($ch);
        $data = json_decode($response, true);
        return $data;
    }



    

    
    
    
}