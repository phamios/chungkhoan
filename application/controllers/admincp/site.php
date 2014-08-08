<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Site extends CI_Controller {

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
        	$this->load->model('site_model');
        	$data['site_info'] = $this->site_model->get_site_info();
            $this->load->view('admin/dashboard',$data); 
        }
    }
    
    public function update_info(){
    	if ($this->session->userdata('adminid') == null) {
    		redirect('admincp/login');
    	} else {
    		$this->load->model('site_model');
    		if (isset($_REQUEST['submit'])) {
    			$site_name = $this->input->post('sitename');
    			$site_des = $this->input->post('sitedes');
    			$site_footer    = $this->input->post('sitefooter');
    			$object = array(
    				'sitename' => $site_name,
    				'sitedes' =>$site_des,
    				'sitefooter' =>$site_footer
    			);
    			$this->site_model->update_site($object);
    			redirect('admincp/site/index');
    		}
    		redirect('admincp/site/index');
    	}
    }
}