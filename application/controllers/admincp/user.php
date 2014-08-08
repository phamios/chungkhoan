<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class User extends CI_Controller {

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
//             $this->load->model('cate_model');
//             $data['cates'] = $this->cate_model->list_cate_admin();
            //$this->load->view('admin/dashboard');
            redirect("admincp/user/listuser");
        }
    }
    
    public function listuser() {
    	if ($this->session->userdata('adminid') == null) {
    		redirect('admincp/login');
    	} else {
	    	$this->load->model('member_model'); 
	    	$config['base_url'] = site_url('admincp/user/listuser');
	    	$config['total_rows'] = $this->member_model->total_member();
	    	$config['per_page'] = 10;
	    	$config['prev_link'] = 'Last';
	    	$config['next_link'] = 'Next';
	    	$this->pagination->initialize($config);
	    	$data['list_users'] = $this->member_model->_listmember($config['per_page'], $this->uri->segment(4));
	    	$data['pages'] = $this->pagination->create_links();
    		$this->load->view('admin/dashboard',$data);
    	}
    }

    public function add_cate() {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('cate_model');
            if (isset($_REQUEST['submit'])) {
                $cate_name = $this->input->post('cate_name');
                $cate_root = $this->input->post('cate_root');
                $active = $this->input->post('active');

                $this->cate_model->add_cate_admin($cate_name, $cate_root, $active);
                redirect('admincp/cate');
            }
            $data['cates'] = $this->cate_model->list_cate_admin();
            $this->load->view('admin/dashboard', $data);
        }
    }

    //public function change_cate_status($id) {
    //    if ($this->session->userdata('adminid') == null) {
    //        redirect('admincp/login');
    //    } else {
    //        $this->load->model('cate_model');
    //        $this->cate_model->change_cate_status_admin($id);
    //        redirect('admincp/cate');
    //    }
    //}

    public function update_cate($id) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('cate_model');
            $cateid = $id;
            if (isset($_REQUEST['submit'])) {
                $cate_name = $this->input->post('cate_name', true);
                $cate_root = $this->input->post('cate_root', true);
                $active = $this->input->post('active', true);

                $object = null;
                $object['cate_name'] = $cate_name;
                $object['cate_root'] = $cate_root;
                $object['active'] = $active;
                $object['id'] = $cateid;
                $this->cate_model->update_cate_admin($object);
                redirect('admincp/cate');
            }
            $data['cates'] = $this->cate_model->get_cate_by_id_admin($id);
            $data['allcates'] = $this->cate_model->list_cate_admin();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function del_cate($id) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('cate_model');
            $this->cate_model->del_cate_admin($id);
            redirect('admincp/cate');
        }
    }

}
