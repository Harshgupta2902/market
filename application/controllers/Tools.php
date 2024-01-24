<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

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
		$this->load->view('tools/lumpsum_calculator',$data);
	}

    public function calculate_sip() {
        // Get parameters from the URL
        $rate = $this->input->get('rate');
        $time = $this->input->get('time');
        $sipAmount = $this->input->get('sipAmount');

        // Validate input parameters (add more validation as needed)
        if (!is_numeric($rate) || !is_numeric($time) || !is_numeric($sipAmount)) {
            // Handle invalid input
            $result = ['error' => 'Invalid input parameters'];
        } else {
            // Perform SIP calculations
            $periods = range(1, $time * 12);
            $futureValues = array_map(function ($month) use ($sipAmount, $rate) {
                return $sipAmount * ((pow(1 + $rate / (12 * 100), $month) - 1) / ($rate / (12 * 100)));
            }, $periods);

            // Prepare result data
            $result = [
                'futureValues' => array_map('number_format', $futureValues, array_fill(0, count($futureValues), 2)),
                'totalEarnings' => number_format(end($futureValues) - ($sipAmount * count($periods)), 2),
                'totalDeposited' => number_format($sipAmount * count($periods), 2),
            ];
        }

        // Return results as JSON
        echo json_encode($result);
    }

}
