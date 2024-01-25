<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipo extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ViewsModel');
    }

	public function index()
	{
		$upcoming = $this->db->where('Type', 'Upcoming')->get('recents')->result_array();
		$sme = $this->db->where('Type', 'SME')->get('recents')->result_array();
		$metaData = array(
			'title' => 'Mainboard and SME Upcoming IPOs',
			'metaDescription' => 'Explore the upcoming IPOs on the Mainboard and SME markets',
			'metaKeywords' => 'upcoming ipo, ipo, pre ipo investing, pre ipo investing, upcoming ipos, new ipo stocks, new ipo, ipos this week, upcoming ipos 2024, best ipo stocks',
			'canonicals' => base_url(),	
		);
		$data = [
			'metaData' => $metaData,
			'upcoming' => $upcoming,
			'sme' => $sme,
		];        
		$this->ViewsModel->updatePageViews('home');
		$this->load->view('home', $data);
	}

	public function greyMarketIpo()
	{
		$gmp = $this->db->get('gmp')->result_array();
		$oldGmp = $this->db->get('old_gmp')->result_array();
		$faq = $this->db->where('type', 'GMP')->get('faq')->result_array();
		$metaData = array(
			'title' => 'Live Grey Market Premium of IPOs',
			'metaDescription' => 'Explore the upcoming IPOs on the Mainboard and SME markets',
			'metaKeywords' => 'gmp, ipo, grey market premium, cgmp, ipo investment, new ipo stocks, new ipo, ipos this week, upcoming ipos 2024, best ipo stocks',
			'canonicals' => base_url(),	
		);
		$data = [
			'metaData' => $metaData,
			'gmp' => $gmp,
			'oldGmp' => $oldGmp,
			'faq' => $faq,
			'faqTitle' => "Grey Market Premium FAQ's",
		];
		$this->ViewsModel->updatePageViews('greyMarketIpo');
		$this->load->view('ipo/gme', $data);
	}

	public function smeMarketIpo()
	{
		$sme = $this->db->get('sme')->result_array();
		$faq = $this->db->where('type', 'SME')->get('faq')->result_array();

		$data = [
			'sme' => $sme,
			'faq' => $faq,
			'faqTitle' => "SME FAQ's",
		];
		$this->ViewsModel->updatePageViews('smeMarketIpo');
		$this->load->view('ipo/sme', $data);
	}

	public function subscriptionStatus()
	{
		$ipo = $this->db->get('ipo_subscription_data')->result_array();
		$sme = $this->db->get('sme_subscription_data')->result_array();
		$faq = $this->db->where('type', 'Status')->get('faq')->result_array();

		$data = [
			'ipo' => $ipo,
			'sme' => $sme,
			'faq' => $faq,
			'faqTitle' => "IPO Subscription FAQ's",
		];
		$this->ViewsModel->updatePageViews('subscriptionStatus');
		$this->load->view('ipo/subs', $data);
	}

	public function ipoForms()
	{
		$forms = $this->db->get('forms')->result_array();
		$data = [
			'forms' => $forms,
		];
		$this->ViewsModel->updatePageViews('ipoForms');
		$this->load->view('ipo/forms', $data);
	}
	
	public function sharesBuyBack()
	{
		$buyback = $this->db->get('buyback')->result_array();
		$faq = $this->db->where('type', 'Buyback')->get('faq')->result_array();
		$data = [
			'buyback' => $buyback,
			'faq' => $faq,
			'faqTitle' => "IPO Buy Back FAQ's",
		];
		$this->ViewsModel->updatePageViews('sharesBuyBack');
		$this->load->view('ipo/buyBack', $data);
	}
	
	public function upcomingIpo()
	{
		$upcoming = $this->db->get('ipos')->result_array();
		$faq = $this->db->where('type', 'upcoming')->get('faq')->result_array();
		$data = [
			'upcoming' => $upcoming,
			'faq' => $faq,
			'faqTitle' => "FAQ's about IPO's",
		];
		$this->ViewsModel->updatePageViews('upcomingIpo');
		$this->load->view('ipo/upcoming', $data);
	}

	
	public function error()
	{
		// $this->ViewsModel->updatePageViews('404');
		$this->load->view('errors/html/error_404');
	}


	
	

}