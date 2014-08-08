<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Rule extends CI_Controller {

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

    public function index($id = null) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('rule_model');
            if (isset($_REQUEST['submit'])) {
                $rate       = $this->input->post('rate', true);
                $start_time = $this->input->post('start_time', true);
                $end_time   = $this->input->post('end_time', true);
                $draw_mode  = $this->input->post('draw_mode', true);

                $this->rule_model->update_rule($id,$rate,$start_time,$end_time,$draw_mode);
                redirect('admincp/rule');
            }

            $data['rules'] = $this->rule_model->get_all_rule();
            $this->load->view('admin/dashboard', $data);
        }
    }

}
