<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function updatePageViews($page)
    {
        $today = date('Y-m-d');
        $thisMonth = date('Y-m');
        $thisYear = date('Y');

        $existingRecord = $this->db->where('page', $page)->get('page_views')->row();

        if ($existingRecord) {
            $timestamp = date('Y-m-d H:i:s');
            if ($existingRecord->timestamp >= $today) {
                $this->db->where('page', $page)->update('page_views', ['daily_count' => $existingRecord->daily_count + 1, 'timestamp' => $timestamp]);
            } else {
                $this->db->where('page', $page)->update('page_views', ['daily_count' => 1, 'timestamp' => $timestamp]);
            }

            if ($existingRecord->timestamp >= $thisMonth) {
                $this->db->where('page', $page)->update('page_views', ['monthly_count' => $existingRecord->monthly_count + 1]);
            } else {
                $this->db->where('page', $page)->update('page_views', ['monthly_count' => 1, 'timestamp' => $timestamp]);
            }

            if (substr($existingRecord->timestamp, 0, 4) == $thisYear) {
                $this->db->where('page', $page)->update('page_views', ['yearly_count' => $existingRecord->yearly_count + 1]);
            } else {
                $this->db->where('page', $page)->update('page_views', ['yearly_count' => 1, 'timestamp' => $timestamp]);
            }
        } else {
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

    public function getSeoDetails($page)
    {
        return $this->db->where('seo_page', $page)->get('seo_details')->row_array(0);
    }

    public function getRecentsByType($type)
    {
        return $this->db->where('Type', $type)->get('recents')->result_array();
    }

    public function get($table)
    {
        return $this->db->get($table)->result_array();
    }


    public function getWhere($table, $col, $type){
		return $this->db->where($col, $type)->get($table)->result_array();
	}

    public function getWhereNav($table, $col, $type)
    {
        return $this->db->where($col, $type)->where('status', 1)->get($table)->result_array();
    }

    public function nav()
    {
        $data = $this->db->query('SELECT DISTINCT nav FROM nav WHERE status = 1')->result_array();
        $nav = [];
        foreach ($data as $row) {
            $category = $row['nav'];
            $nav[$category] = $this->getWhereNav('nav', 'nav', $category);
        }
        return $nav;
    }
}
