<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewsModel extends CI_Model {
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

    }

    public function updatePageViews($page){
		$today = date('Y-m-d');
		$thisMonth = date('Y-m');
		$thisYear = date('Y');
	
		// Check if the page exists in the database
		$existingRecord = $this->db->where('page', $page)->get('page_views')->row();
	
		if ($existingRecord) {
			// Update existing record
			$timestamp = date('Y-m-d H:i:s');
			if ($existingRecord->timestamp >= $today) {
				// Same day
				$this->db->where('page', $page)->update('page_views', ['daily_count' => $existingRecord->daily_count + 1, 'timestamp' => $timestamp]);
			} else {
				// New day
				$this->db->where('page', $page)->update('page_views', ['daily_count' => 1, 'timestamp' => $timestamp]);
			}
	
			if ($existingRecord->timestamp >= $thisMonth) {
				// Same month
				$this->db->where('page', $page)->update('page_views', ['monthly_count' => $existingRecord->monthly_count + 1]);
			} else {
				// New month
				$this->db->where('page', $page)->update('page_views', ['monthly_count' => 1, 'timestamp' => $timestamp]);
			}
	
			if (substr($existingRecord->timestamp, 0, 4) == $thisYear) {
				// Same year
				$this->db->where('page', $page)->update('page_views', ['yearly_count' => $existingRecord->yearly_count + 1]);
			} else {
				// New year
				$this->db->where('page', $page)->update('page_views', ['yearly_count' => 1, 'timestamp' => $timestamp]);
			}
		} else {
			// Insert a new record
			$timestamp = date('Y-m-d H:i:s');
			$this->db->insert('page_views', [
				'page' => $page,
				'daily_count' => 1,
				'monthly_count' => 1,
				'yearly_count' => 1,
				'timestamp' => $timestamp,
			]);
		}
	}

	public function getSeoDetails($page){
		return $this->db->where('seo_page', $page)->get('seo_details')->row_array(0);
	}

	public function getRecentsByType($type){
		return $this->db->where('Type', $type)->get('recents')->result_array();
	}

	public function get($table){
		return $this->db->get($table)->result_array();
	}

	public function getWhere($table, $col, $type){
		return $this->db->where($col, $type)->get($table)->result_array();
	}

	public function nav(){
		$nav['Ipo'] = $this->getWhere('nav', 'nav', 'Ipo');
		$nav['Crypto'] = $this->getWhere('nav', 'nav', 'Crypto');
		$nav['Calculators'] = $this->getWhere('nav', 'nav', 'Calculators');
		$nav['Tools'] = $this->getWhere('nav', 'nav', 'Tools');
		return $nav;
	}



}