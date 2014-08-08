<?php

include('./class/adodb.inc.php');
include('./class/adodb-exceptions.inc.php');
include('./class/cURL.php');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class AutoCode extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {

            $this->load->view('admin/dashboard');
        }
    }

    public function get_codeck($params) {

        if (strtolower($params) == 'hose') {
            $url = 'http://online.mhbs.vn/quote/data.ashx?seq=1418&se=1';
            $curl = new cURL();
            $curl->setCookie('mhbs.txt');
            $curl->setUrl($url);
            $curl->setReferer(site_url('admincp/autocode'));
            $curl->setOpt();
            $page = $curl->getPage();
            $page = explode(';', $page);
            foreach ($page as $i => $row) {
                echo "Process row: $i<br />";
                $row = explode('|', $row);
                if (count($row) < 42)
                    continue;
                try {
                    $this->load->model('code_model');
                    $this->code_model->add_code_hose($row);
                } catch (exception $e) {
                    print_r($e);
                }
            }
        } elseif (strtolower($params) == 'hnx') {
            $url = 'http://online.mhbs.vn/quote/data.ashx?seq=1418&se=0';
            $curl = new cURL();
            $curl->setCookie('mhbs.txt');
            $curl->setUrl($url);
            $curl->setReferer(site_url('admincp/autocode'));
            $curl->setOpt();
            $page = $curl->getPage();
            $page = explode(';', $page);
            foreach ($page as $i => $row) {
                echo "Process row: $i<br />";
                $row = explode('|', $row);
                if (count($row) < 42)
                    continue;
                try {
                    $this->load->model('code_model');
                    $this->code_model->add_code_hnx($row);
                } catch (exception $e) {
                    print_r($e);
                }
            }
        } else {
            
        }



        echo "done ";
    }

}
