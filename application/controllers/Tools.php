<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('ViewsModel');

    }

	public function sip_calculator()
	{
        $faq = $this->db->where('type', 'lumpsum')->get('faq')->result_array();
        $metaData = array(
			'title' => 'SIP Calculator: Easy Tool for Estimating Your Total',
			'metaDescription' => 'Easily determine your lump sum value using our convenient and precise lump sum calculator',
			'metaKeywords' => 'lumpsum calculator, lump sum sip calculator, sip lumpsum calculator, lump sum investment calculator, lumpsum investment, lumpsum investment calculator, Lumpsum calc, calculator',
			'canonicals' => base_url(),	
		);
		$data = [
			'metaData' => $metaData,
			'faq' => $faq,
			'faqTitle' => "SIP Calculator FAQ's",
		];
		$this->ViewsModel->updatePageViews('sip_calculator');
		$this->load->view('tools/sip_calculator',$data);
	}

	public function lumpsum_calculator()
	{
        $faq = $this->db->where('type', 'lumpsum')->get('faq')->result_array();
        $metaData = array(
			'title' => 'Lumpsum Calculator: Easy Tool for Estimating Your Total',
			'metaDescription' => 'Easily determine your lump sum value using our convenient and precise lump sum calculator',
			'metaKeywords' => 'lumpsum calculator, lump sum sip calculator, sip lumpsum calculator, lump sum investment calculator, lumpsum investment, lumpsum investment calculator, Lumpsum calc, calculator',
			'canonicals' => base_url(),	
		);
		$data = [
			'metaData' => $metaData,
			'faq' => $faq,
			'faqTitle' => "Lumpsum Calculator FAQ's",
		];
		$this->ViewsModel->updatePageViews('lumpsum_calculator');
		$this->load->view('tools/lumpsum_calculator',$data);
	}

    public function calculate_sip() {
        $rate = $this->input->get('rate');
        $time = $this->input->get('time');
        $sipAmount = $this->input->get('sipAmount');

        if (!is_numeric($rate) || !is_numeric($time) || !is_numeric($sipAmount)) {
            $result = ['error' => 'Invalid input parameters'];
        } else {
            $periods = range(1, $time * 12);
            $futureValues = array_map(function ($month) use ($sipAmount, $rate) {
                return $sipAmount * ((pow(1 + $rate / (12 * 100), $month) - 1) / ($rate / (12 * 100)));
            }, $periods);

            $result = [
                'futureValues' => array_map('number_format', $futureValues, array_fill(0, count($futureValues), 2)),
                'totalEarnings' => number_format(end($futureValues) - ($sipAmount * count($periods)), 2),
                'totalDeposited' => number_format($sipAmount * count($periods), 2),
            ];
        }
		$this->ViewsModel->updatePageViews('calculate_sip');

        echo json_encode($result);
    }

}
