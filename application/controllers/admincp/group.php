<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Group extends CI_Controller {

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
            $this->load->model('group_model'); 
	    	$config['base_url'] = site_url('admincp/group/');
	    	$config['total_rows'] = $this->group_model->total_group();
	    	$config['per_page'] = 10;
	    	$config['prev_link'] = 'Last';
	    	$config['next_link'] = 'Next';
	    	$this->pagination->initialize($config);
	    	$data['groups'] = $this->group_model->_listgroup($config['per_page'], $this->uri->segment(4));
	    	$data['pages'] = $this->pagination->create_links();
    		$this->load->view('admin/dashboard',$data);
        }
    }
    
    public function add_group() {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['submit'])) {
                $group_name        = $this->input->post('group_name', true);
                $group_type        = $this->input->post('group_type', true);
                $group_desc        = $this->input->post('group_desc', true);
                $group_min_balance = $this->input->post('group_min_balance', true);
                $group_active      = $this->input->post('group_active', true);
                $group_expired     = $this->input->post('group_expired', true);

                $this->load->model('group_model');
                $this->group_model->add_group($group_name,$group_type,$group_desc,$group_min_balance,$group_active,$group_expired);
                redirect('admincp/group');
            }
            $this->load->view('admin/dashboard');
        }
    }

    public function update_group($id) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('group_model');
            if (isset($_REQUEST['submit'])) {
                $group_content = $this->input->post('group_content');
                $group_name        = $this->input->post('group_name', true);
                $group_type        = $this->input->post('group_type', true);
                $group_desc        = $this->input->post('group_desc', true);
                $group_min_balance = $this->input->post('group_min_balance', true);
                $group_active      = $this->input->post('group_active', true);
                $group_expired     = $this->input->post('group_expired', true);

                $this->group_model->update_group($id,$group_name,$group_type,$group_desc,$group_min_balance,$group_active,$group_expired);
                redirect('admincp/group');
            }
            $data['groups'] = $this->group_model->get_group_by_id($id);
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function del_group($id=null) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('group_model');
            $this->group_model->del_group($id);
            redirect('admincp/group');
        }
    }

}
