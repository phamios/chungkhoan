<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Notification extends CI_Controller {

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
            $this->load->model('notification_model');
            $data['listcontent'] = $this->notification_model->show_all_notification();
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function add_notification() {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['submit'])) {
                $notification_content = $this->input->post('notification_content');
                $notification_title   = $this->input->post('notification_title', true);
                $notification_link    = $this->input->post('notification_link', true);
                $active               = $this->input->post('active', true);

                $this->load->model('notification_model');
                $this->notification_model->add_notification($notification_title,$notification_content,$notification_link,$active);
                redirect('admincp/notification');
            }
            $this->load->view('admin/dashboard');
        }
    }

    public function update_notification($id) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('notification_model');
            if (isset($_REQUEST['submit'])) {
                $notification_content = $this->input->post('notification_content');
                $notification_title   = $this->input->post('notification_title', true);
                $notification_link    = $this->input->post('notification_link', true);
                $active               = $this->input->post('active', true);

                $this->notification_model->update_notification($id,$notification_title,$notification_content,$notification_link,$active);
                redirect('admincp/notification');
            }
            $data['notifications'] = $this->notification_model->get_notification_by_id($id);
            $this->load->view('admin/dashboard', $data);
        }
    }

    public function del_notification($id=null) {
        if ($this->session->userdata('adminid') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('notification_model');
            $this->notification_model->del_notification($id);
            redirect('admincp/notification');
        }
    }

    function do_upload_image($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = '80000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                return NULL;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $imagename = $this->upload->file_name;
                $this->resize_image($mypath, 'thumb_' . $imagename, $imagename);
                return $imagename;
            }
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function resize_image($dir, $new_name, $image) {
        $img_cfg_thumb['image_library'] = 'gd2';
        $img_cfg_thumb['source_image'] = "./" . $dir . "/" . $image;
        $img_cfg_thumb['maintain_ratio'] = TRUE;
        $img_cfg_thumb['new_image'] = $new_name;
        $img_cfg_thumb['width'] = 300;
        $img_cfg_thumb['height'] = 200;
        $this->load->library('image_lib');
        $this->image_lib->initialize($img_cfg_thumb);
        $this->image_lib->resize();
    }

    function do_upload_image_slide($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = '80000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            //echo $filename; die();
            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                return NULL;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $imagename = $this->upload->file_name;
                $this->resize_image_slide($mypath, 'thumb_' . $imagename, $imagename);
                return $imagename;
            }
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function resize_image_slide($dir, $new_name, $image) {
        $img_cfg_thumb['image_library'] = 'gd2';
        $img_cfg_thumb['source_image'] = "./" . $dir . "/" . $image;
        $img_cfg_thumb['maintain_ratio'] = TRUE;
        $img_cfg_thumb['new_image'] = $new_name;
        $img_cfg_thumb['width'] = 540;
        $img_cfg_thumb['height'] = 210;
        $this->load->library('image_lib');
        $this->image_lib->initialize($img_cfg_thumb);
        $this->image_lib->resize();
    }

    function do_upload_file($mypath, $filename) {
        $config['upload_path'] = $mypath;
        $config['allowed_types'] = 'jar|jad|apk|ipa';
        $config['max_size'] = '500000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (isset($filename)) {
            //echo $filename; die();

            if (!$this->upload->do_upload($filename)) {
                $error = array('error' => $this->upload->display_errors());
                //print_r($error);
                return null;
            } else {
                $data = array('upload_data' => $this->upload->data());
                $imagename = $this->upload->file_name;
                return $imagename;
            }
        } else {
            echo $this->upload->display_errors();
        }
    }
}
