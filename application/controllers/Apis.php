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

        // Enable CORS
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
            $data['message'] = "failed";
            $data['result'] = "No slug exists";

            return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
        }
        $query = $this->db->query("SELECT * FROM details WHERE slug = ?", array($slug));
        $response = $query->row(); 
        if (!$response) {
            $data['message'] = "failed";
            $data['result'] = "No Result Found";

            return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
        }

        $tableName = $response->source_table;
        $link = $response->link;
        $joinedData = $this->db->query("SELECT * FROM details JOIN $tableName ON details.link = $tableName.link WHERE details.link = ?", array($link));


        $data['message'] = "success";
        $data['result'] = $joinedData->row();
        $this->output
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

    public function getIpoDetails() {
        $slug = $this->input->get('slug');
        $slug = $this->db->escape_str($slug);
        $query = $this->db->query("SELECT * FROM details WHERE slug = ?", array($slug));
        $response = $query->row(); 
        if (!$response) {
            redirect('error');
        }

        $tableName = $response->source_table;

        $link = $response->link;
        $joinedData = $this->db->query("SELECT * FROM details JOIN $tableName ON details.link = $tableName.link WHERE details.link = ?", array($link));
    
        $data = [
            'response' => $joinedData->row(),

        ];

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
        
    
        // $this->loadCommonView('ipo/details', $data);
    }
    

    

}
