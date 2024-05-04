<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('ViewsModel');
        $this->nav = $this->ViewsModel->nav();


    }

	public function sip_calculator()
	{
        $faq = $this->db->where('type', 'sip')->get('faq')->result_array();
        $metaData = $this->ViewsModel->getSeoDetails('sip_calculator');
		$data = [
			'metaData' => $metaData,
			'faq' => $faq,
			'faqTitle' => "SIP Calculator FAQ's",
            'nav' => $this->nav,
		];
		$this->ViewsModel->updatePageViews('sip_calculator');
		$this->load->view('tools/sip_calculator',$data);
	}

	public function lumpsum_calculator()
	{
        $faq = $this->db->where('type', 'lumpsum')->get('faq')->result_array();
        $metaData = $this->ViewsModel->getSeoDetails('sip_calculator');
		$data = [
			'metaData' => $metaData,
			'faq' => $faq,
			'faqTitle' => "Lumpsum Calculator FAQ's",
            'nav' => $this->nav,
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
                $value = $sipAmount * ((pow(1 + $rate / (12 * 100), $month) - 1) / ($rate / (12 * 100)));
                return number_format($value, 2 ,'.', ''); 
            }, $periods);

            $result = [
                'futureValues' => $futureValues,
                // 'futureValues' => array_map('number_format', $futureValues, array_fill(0, count($futureValues), 2)),
                'totalEarnings' => number_format(end($futureValues) - ($sipAmount * count($periods)), 2),
                'totalDeposited' => number_format($sipAmount * count($periods), 2),
            ];
        }
		$this->ViewsModel->updatePageViews('calculate_sip');

        echo json_encode($result);
    }


	public function calculate_lumpsum() {
        $rate = $this->input->get('rate');
        $time = $this->input->get('time');
        $lumpsumAmount = $this->input->get('lumpsumAmount');
        if (!is_numeric($rate) || !is_numeric($time) || !is_numeric($lumpsumAmount)) {
            $result = ['error' => 'Invalid input parameters'];
        } else {
            $futureValue = $lumpsumAmount * pow((1 + $rate / 100), $time);
            $totalEarnings = $futureValue - $lumpsumAmount;
            $result = [
                'futureValue' => number_format($futureValue, 2),
                'totalEarnings' => number_format($totalEarnings, 2),
                'totalInvested' => number_format($lumpsumAmount, 2),
                'yearlyReports' => $this->calculateYearlyReports($time, $lumpsumAmount, $rate),
            ];
        }

        // Return results as JSON
        echo json_encode($result);
    }

    private function calculateYearlyReports($time, $lumpsumAmount, $rate) {
        $yearlyReports = [];

        for ($year = 1; $year <= $time; $year++) {
            $futureValueYearly = $lumpsumAmount * pow((1 + $rate / 100), $year);
            $totalEarningsYearly = $futureValueYearly - $lumpsumAmount;

            $yearlyReports[] = [
                'year' => $year,
                'futureValue' => number_format($futureValueYearly, 2),
                'totalEarnings' => number_format($totalEarningsYearly, 2),
            ];
        }

        return $yearlyReports;
    }

}
