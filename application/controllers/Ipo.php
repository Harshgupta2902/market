<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ipo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ViewsModel');

        $this->metaData = $this->ViewsModel->getSeoDetails('Ipo');
        $this->upcoming = $this->ViewsModel->getRecentsByType('Upcoming');
        $this->sme = $this->ViewsModel->getRecentsByType('SME');
        $this->nav = $this->ViewsModel->nav();

    }

    public function index()
    {
        $data = [
            'metaData' => $this->metaData,
            'upcoming' => $this->upcoming,
            'sme' => $this->sme,
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('home');

        $this->loadCommonView('home', $data);
    }

    public function greyMarketIpo()
    {
        $gmp = $this->ViewsModel->get('gmp');
        $oldGmp = $this->ViewsModel->get('old_gmp');
        $faq = $this->ViewsModel->getWhere('faq', 'type', 'GMP');
        $metaData = $this->ViewsModel->getSeoDetails('greyMarketIpo');
        $data = [
            'metaData' => $metaData,
            'gmp' => $gmp,
            'oldGmp' => $oldGmp,
            'faq' => $faq,
            'faqTitle' => "Grey Market Premium FAQ's",
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('greyMarketIpo');

        $this->loadCommonView('ipo/gme', $data);
    }

    public function smeMarketIpo()
    {
        $sme = $this->ViewsModel->get('sme');
        $faq = $this->ViewsModel->getWhere('faq', 'type', 'SME');
        $metaData = $this->ViewsModel->getSeoDetails('smeMarketIpo');
        $data = [
            'metaData' => $metaData,
            'sme' => $sme,
            'faq' => $faq,
            'faqTitle' => "SME FAQ's",
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('smeMarketIpo');

        $this->loadCommonView('ipo/sme', $data);

    }

    public function subscriptionStatus()
    {
        $ipo = $this->ViewsModel->get('ipo_subscription_data');
        $sme = $this->ViewsModel->get('sme_subscription_data');
        $faq = $this->ViewsModel->getWhere('faq', 'type', 'Status');
        $metaData = $this->ViewsModel->getSeoDetails('subscriptionStatus');

        $data = [
            'metaData' => $metaData,
            'ipo' => $ipo,
            'sme' => $sme,
            'faq' => $faq,
            'faqTitle' => "IPO Subscription FAQ's",
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('subscriptionStatus');
        $this->loadCommonView('ipo/subs', $data);

    }

    public function ipoForms()
    {
        $forms = $this->ViewsModel->get('forms');
        $metaData = $this->ViewsModel->getSeoDetails('ipoForms');
        $data = [
            'metaData' => $metaData,
            'forms' => $forms,
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('ipoForms');

        $this->loadCommonView('ipo/forms', $data);

    }

    public function sharesBuyBack()
    {
        $buyback = $this->ViewsModel->get('buyback');
        $faq = $this->ViewsModel->getWhere('faq', 'type', 'Buyback');
        $metaData = $this->ViewsModel->getSeoDetails('sharesBuyBack');
        $data = [
            'metaData' => $metaData,
            'buyback' => $buyback,
            'faq' => $faq,
            'faqTitle' => "IPO Buy Back FAQ's",
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('sharesBuyBack');
        $this->loadCommonView('ipo/buyBack', $data);

    }

    public function upcomingIpo()
    {
        $upcoming = $this->ViewsModel->get('ipos');
        $faq = $this->ViewsModel->getWhere('faq', 'type', 'upcoming');
        $metaData = $this->ViewsModel->getSeoDetails('upcomingIpo');
        $data = [
            'metaData' => $metaData,
            'upcoming' => $upcoming,
            'faq' => $faq,
            'faqTitle' => "FAQ's about IPO's",
            'nav' => $this->nav,
        ];
        $this->ViewsModel->updatePageViews('upcomingIpo');
        $this->loadCommonView('ipo/upcoming', $data);

    }

    public function error()
    {
        $this->load->view('errors/html/error_404');
    }

    private function loadCommonView($view, $data)
    {
        $this->load->view($view, $data);
    }

}
