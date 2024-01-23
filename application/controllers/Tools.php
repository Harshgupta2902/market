<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->helper('url');

    }

	public function sip_calculator()
	{
		$this->load->view('tools/sip_calculator');
	}

	public function lumpsum_calculator()
	{
		$this->load->view('tools/lumpsum_calculator');
	}


	public function calculate() {
        // Get parameters from the URL
        $rate = $this->input->get('rate');
        $time = $this->input->get('time');
        $lumpsumAmount = $this->input->get('lumpsumAmount');

        // Validate input parameters (add more validation as needed)
        if (!is_numeric($rate) || !is_numeric($time) || !is_numeric($lumpsumAmount)) {
            // Handle invalid input
            $result = ['error' => 'Invalid input parameters'];
        } else {
            // Perform lumpsum calculations
            $futureValue = $lumpsumAmount * pow((1 + $rate / 100), $time);
            $totalEarnings = $futureValue - $lumpsumAmount;

            // Prepare result data
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
